"""Offline tests for the sandbox lifecycle and safe diagnostic output."""
import contextlib
import io
import json
from pathlib import Path
import subprocess
import tempfile
import unittest
from unittest.mock import patch

import run as runner


class RunnerTest(unittest.TestCase):
    def test_partial_provisioning_failure_still_revokes_keys(self):
        results = [subprocess.CompletedProcess([], status, "", "") for status in (1, 0)]
        with patch.object(runner, "run", side_effect=results) as docker:
            with contextlib.redirect_stdout(io.StringIO()), self.assertRaises(RuntimeError):
                runner.exercise(["odoo", "shell"], ["copy"], {}, "http://127.0.0.1:8069")
        self.assertEqual(2, docker.call_count)
        self.assertEqual((runner.HERE / "revoke.py").read_text(), docker.call_args.kwargs["input"])

    def test_existing_container_reuses_the_server_without_starting_or_removing_containers(self):
        self.check_existing_container()

    def test_test_failure_does_not_remove_the_shared_server(self):
        self.check_existing_container(fail=True)

    def check_existing_container(self, fail=False):
        metadata = {"ci": "true", "running": True, "ports": [{"HostIp": "127.0.0.1", "HostPort": "8069"}]}
        result = subprocess.CompletedProcess([], 0, json.dumps(metadata), "")
        with patch("sys.argv", ["runner", "--allow-writes", "--container", "odoo"]):
            with patch.object(runner, "run", return_value=result) as docker:
                with patch.object(runner, "exercise", create=True, side_effect=RuntimeError("failed") if fail else None) as exercise:
                    with contextlib.redirect_stdout(io.StringIO()):
                        if fail:
                            with self.assertRaises(RuntimeError):
                                runner.main()
                        else:
                            runner.main()
        exercise.assert_called_once()
        commands = [call.args[0] for call in docker.call_args_list]
        self.assertTrue(any("--stop-after-init" in command for command in commands))
        for command in commands:
            self.assertEqual("docker", command[0])
            self.assertIn(command[1], ("inspect", "exec", "cp"))

    def test_existing_container_requires_an_explicit_ci_label(self):
        result = subprocess.CompletedProcess([], 0, '{"ci":null,"running":true,"ports":[]}', "")
        with patch("sys.argv", ["runner", "--allow-writes", "--container", "odoo"]):
            with patch.object(runner, "run", return_value=result) as docker:
                with contextlib.redirect_stdout(io.StringIO()), self.assertRaises(RuntimeError):
                    runner.main()
        self.assertEqual(1, docker.call_count)

    def test_existing_container_rejects_non_loopback_ports(self):
        metadata = {"ci": "true", "running": True, "ports": [{"HostIp": "0.0.0.0", "HostPort": "8069"}]}
        result = subprocess.CompletedProcess([], 0, json.dumps(metadata), "")
        with patch("sys.argv", ["runner", "--allow-writes", "--container", "odoo"]):
            with patch.object(runner, "run", return_value=result) as docker:
                with contextlib.redirect_stdout(io.StringIO()), self.assertRaises(RuntimeError):
                    runner.main()
        self.assertEqual(1, docker.call_count)

    def test_failure_never_prints_raw_child_output(self):
        result = subprocess.CompletedProcess([], 1, "fake-sensitive-body", "fake-sensitive-error")
        output = io.StringIO()
        with contextlib.redirect_stdout(output), self.assertRaises(RuntimeError):
            runner.require_success(result, "Test step")
        self.assertNotIn("fake-sensitive", output.getvalue())
        self.assertIn("exit 1", output.getvalue())

    def test_junit_reports_locations_not_values(self):
        with tempfile.TemporaryDirectory(prefix="json2-runner-test-") as directory:
            path = Path(directory) / "junit.xml"
            path.write_text('<testsuites><testsuite tests="1" assertions="1" failures="1">'
                            '<testcase classname="FixtureTest" name="testExample"><failure>'
                            'fake-sensitive-value\n/project/tests/FixtureTest.php:42\n'
                            '</failure></testcase></testsuite></testsuites>')
            output = io.StringIO()
            with contextlib.redirect_stdout(output):
                runner.report_junit(path)
        self.assertNotIn("fake-sensitive", output.getvalue())
        self.assertIn("FixtureTest::testExample", output.getvalue())
        self.assertIn("/project/tests/FixtureTest.php:42", output.getvalue())

    def test_existing_project_is_never_reused_or_removed(self):
        result = subprocess.CompletedProcess([], 0, "existing-container", "")
        with patch("sys.argv", ["runner", "--allow-writes"]), patch.object(runner, "run", return_value=result) as docker:
            with contextlib.redirect_stdout(io.StringIO()), self.assertRaisesRegex(RuntimeError, "existing"):
                runner.main()
        self.assertEqual(1, docker.call_count)

    def test_failed_start_still_cleans_only_its_project_and_strips_external_credentials(self):
        results = [subprocess.CompletedProcess([], code, "", "") for code in (0, 1, 0)]
        with patch("sys.argv", ["runner", "--allow-writes", "--project", "odoo-json2-unit"]):
            with patch.dict("os.environ", {"ODOO_JSON2_API_KEY": "fake-external-key"}):
                with patch.object(runner, "run", side_effect=results) as docker:
                    with contextlib.redirect_stdout(io.StringIO()), self.assertRaises(RuntimeError):
                        runner.main()
        cleanup = docker.call_args_list[-1]
        self.assertIn("odoo-json2-unit", cleanup.args[0])
        self.assertIn("down", cleanup.args[0])
        for call in docker.call_args_list:
            self.assertNotIn("ODOO_JSON2_API_KEY", call.kwargs["env"])

    def test_missing_write_opt_in_never_calls_docker(self):
        with patch("sys.argv", ["runner"]), patch.object(runner, "run") as docker:
            with contextlib.redirect_stderr(io.StringIO()), self.assertRaises(SystemExit) as error:
                runner.main()
        self.assertEqual(2, error.exception.code)
        docker.assert_not_called()

    def test_unsafe_project_never_calls_docker(self):
        with patch("sys.argv", ["runner", "--allow-writes", "--project", "production"]):
            with patch.object(runner, "run") as docker:
                with contextlib.redirect_stderr(io.StringIO()), self.assertRaises(SystemExit):
                    runner.main()
        docker.assert_not_called()


if __name__ == "__main__":
    unittest.main()
