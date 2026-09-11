"""Run JSON-2 on the shared CI server, or create a local sandbox (stdlib only)."""
import argparse
import json
import os
from pathlib import Path
import re
import signal
import subprocess
import tempfile
import time
import urllib.error
import urllib.request
import uuid
import xml.etree.ElementTree as ET

HERE = Path(__file__).resolve().parent
ROOT = HERE.parent.parent


def run(command, *, env, input=None, timeout=600):
    # Child output can contain credentials on failure: never stream it to logs.
    return subprocess.run(command, cwd=ROOT, env=env, input=input, text=True,
                          capture_output=True, timeout=timeout, check=False)


def require_success(result, step):
    print(f"{step}: exit {result.returncode}", flush=True)
    if result.returncode:
        raise RuntimeError(step + " failed (raw output withheld to protect credentials)")


def report_junit(path):
    root = ET.parse(path).getroot()
    suite = root.find("testsuite")
    if suite is not None:
        print("PHPUnit: " + ", ".join(f"{key}={suite.get(key, '0')}" for key in
              ("tests", "assertions", "failures", "errors", "skipped")), flush=True)
    for case in root.iter("testcase"):
        for tag in ("failure", "error", "skipped"):
            for node in case.findall(tag):
                print(f"{tag}: {case.get('classname')}::{case.get('name')}", flush=True)
                # Source locations only; no assertion values, exception messages or locals.
                for line in (node.text or "").splitlines():
                    if re.fullmatch(r"/[A-Za-z0-9_./ -]+\.php:[0-9]+", line):
                        print(line, flush=True)


def exercise(shell, copy_credentials, child_env, host):
    variables = None
    with tempfile.TemporaryDirectory(prefix="odoo-json2-") as temporary:
        os.chmod(temporary, 0o700)
        scratch = Path(temporary)
        try:
            result = run(shell, env=child_env, input=(HERE / "provision.py").read_text())
            # The provisioner emits only these safe diagnostics even when it fails.
            for line in result.stdout.splitlines():
                if line.startswith(("JSON2 fixtures", "Provisioning failed:", "/usr/lib/", "<string>:")):
                    print(line, flush=True)
            require_success(result, "Provision fixtures")
            credentials = scratch / "credentials.json"
            require_success(run(copy_credentials + [str(credentials)], env=child_env), "Read protected credentials")
            os.chmod(credentials, 0o600)
            variables = json.loads(credentials.read_text())
            variables["ODOO_JSON2_HOST"] = host
            generated = scratch / "generated"
            variables["ODOO_JSON2_GENERATED_PATH"] = str(generated)
            test_env = dict(child_env, **variables)
            require_success(run(["php", "bin/odoo-model-classes-generator", "--api=json2",
                                 "--only-model=json2.fixture", str(generated), "Json2Generated"], env=test_env), "Generate PHP models through JSON-2")
            junit = scratch / "junit.xml"
            tests = run(["vendor/bin/phpunit", "-c", "phpunit.json2-integration.xml", "--fail-on-skipped",
                         "--log-junit", str(junit)], env=test_env)
            if not junit.exists():
                raise RuntimeError("PHPUnit did not produce its required test report")
            report_junit(junit)
            require_success(tests, "Odoo 19 JSON-2 integration")
        finally:
            # Also revoke after a partial provision/copy failure; the database is ours.
            require_success(run(shell, env=child_env, input=(HERE / "revoke.py").read_text()), "Revoke API keys")
            if variables is not None:
                for key_name in ("ODOO_JSON2_API_KEY", "ODOO_JSON2_RESTRICTED_API_KEY"):
                    request = urllib.request.Request(host + "/json/2/res.users/context_get", data=b"{}",
                        headers={"Authorization": "Bearer " + variables[key_name], "X-Odoo-Database": "json2_test_ci", "Content-Type": "application/json"})
                    try:
                        with urllib.request.urlopen(request, timeout=10):
                            raise RuntimeError("A revoked API key was accepted")
                    except urllib.error.HTTPError as error:
                        if error.code != 401:
                            raise RuntimeError("Unexpected revocation response status") from None
                print("Both revoked keys rejected with HTTP 401", flush=True)


def existing_container(container, child_env):
    # Only non-sensitive metadata is requested. Never inspect/dump container env.
    template = ('{"ci":{{json (index .Config.Labels "org.odoo-api-client.ci")}},'
                '"running":{{json .State.Running}},"ports":{{json (index .NetworkSettings.Ports "8069/tcp")}}}')
    result = run(["docker", "inspect", "--format", template, container], env=child_env)
    require_success(result, "Check shared CI container")
    metadata = json.loads(result.stdout)
    if metadata.get("ci") != "true" or metadata.get("running") is not True:
        raise RuntimeError("Refusing a container without the explicit CI label or a running server")
    ports = metadata.get("ports") or []
    if not ports or any(p.get("HostIp") != "127.0.0.1" or not str(p.get("HostPort", "")).isdigit() for p in ports):
        raise RuntimeError("Expected a loopback-only published port")
    host = "http://127.0.0.1:" + str(ports[0]["HostPort"])
    execute = ["docker", "exec", "-i", "--user", "root", container]
    require_success(run(execute + ["python3"], env=child_env, input=(HERE / "prepare_existing.py").read_text()), "Check fresh JSON-2 database and prepare protected config")
    config = ["--config=/tmp/json2-ci.conf", "-d", "json2_test_ci", "--no-http"]
    require_success(run(execute + ["odoo"] + config + ["--init=json2_fixture", "--without-demo=all", "--stop-after-init"], env=child_env), "Initialize JSON-2 database on shared PostgreSQL")
    exercise(execute + ["odoo", "shell"] + config,
             ["docker", "cp", container + ":/tmp/json2-credentials.json"], child_env, host)


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--allow-writes", action="store_true", required=True)
    target = parser.add_mutually_exclusive_group()
    target.add_argument("--project", help="Create an isolated local Compose project")
    target.add_argument("--container", help="Reuse the existing, explicitly labelled CI container")
    args = parser.parse_args()
    child_env = {k: v for k, v in os.environ.items() if not k.startswith(("ODOO_", "COMPOSE_"))}
    if args.container is not None:
        if not re.fullmatch(r"[A-Za-z0-9][A-Za-z0-9_.-]*", args.container):
            parser.error("container must be a safe Docker name")
        existing_container(args.container, child_env)
        return
    project = args.project or "odoo-json2-" + uuid.uuid4().hex[:12]
    if not re.fullmatch(r"odoo-json2-[a-z0-9-]+", project):
        parser.error("project must start with odoo-json2-, using safe characters")
    compose = ["docker", "compose", "--env-file", os.devnull, "-f", str(HERE / "compose.yaml"), "-p", project]
    existing = run(["docker", "ps", "-aq", "--filter", "label=com.docker.compose.project=" + project], env=child_env)
    require_success(existing, "Check isolated project")
    if existing.stdout.strip():
        raise RuntimeError("Refusing to reuse an existing Docker project")
    shell = compose + ["exec", "-T", "--user", "root", "odoo", "odoo", "shell",
                       "--db_host=db", "--db_user=odoo", "-d", "json2_test_ci", "--no-http",
                       "--addons-path=/usr/lib/python3/dist-packages/odoo/addons,/mnt/extra-addons",
                       "--log-level=critical", "--logfile=/tmp/json2-shell.log"]
    try:
        require_success(run(compose + ["up", "-d"], env=child_env), "Start isolated Odoo/PostgreSQL")
        port = run(compose + ["port", "odoo", "8069"], env=child_env)
        require_success(port, "Resolve loopback port")
        if not re.fullmatch(r"127\.0\.0\.1:[0-9]+", port.stdout.strip()):
            raise RuntimeError("Expected a loopback-only published port")
        host = "http://" + port.stdout.strip()
        for attempt in range(150):
            try:
                with urllib.request.urlopen(host + "/web/health", timeout=2) as response:
                    if response.status == 200:
                        installed = run(compose + ["exec", "-T", "db", "psql", "-U", "odoo", "-d", "json2_test_ci", "-Atc",
                            "SELECT count(*) FROM ir_module_module WHERE name='json2_fixture' AND state='installed'"], env=child_env, timeout=10)
                        if installed.returncode == 0 and installed.stdout.strip() == "1":
                            break
            except (OSError, urllib.error.URLError):
                pass
            time.sleep(2)
        else:
            raise RuntimeError("Odoo readiness timed out")
        exercise(shell, compose + ["cp", "odoo:/tmp/json2-credentials.json"], child_env, host)
    finally:
        require_success(run(compose + ["down", "--volumes", "--remove-orphans"], env=child_env), "Remove isolated containers/network/volumes")


def terminate(*_):
    raise SystemExit(143)


if __name__ == "__main__":
    signal.signal(signal.SIGTERM, terminate)
    try:
        main()
    except (RuntimeError, subprocess.TimeoutExpired) as error:
        print(str(error) if isinstance(error, RuntimeError) else "Integration step timed out", flush=True)
        raise SystemExit(1)
