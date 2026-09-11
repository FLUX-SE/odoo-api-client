"""Executed inside the labelled CI container; never exports DB credentials."""
import argparse
import configparser
import os
from pathlib import Path

import odoo.release
import psycopg2

if odoo.release.version_info[0] != 19:
    raise RuntimeError("The shared CI server must be Odoo 19")
if not Path("/mnt/extra-addons/json2_fixture/__manifest__.py").is_file():
    raise RuntimeError("Mount the JSON-2 fixture addon before starting the CI server")

# Reuse the official entrypoint's database connection, in memory only.
# Do not execute the entrypoint again: it would put its password into argv.
parser = argparse.ArgumentParser(add_help=False)
for name in ("host", "port", "user", "password", "sslmode"):
    parser.add_argument("--db_" + name)
args, _ = parser.parse_known_args(Path("/proc/1/cmdline").read_bytes().decode().split("\0")[1:])
settings = {name: value for name, value in vars(args).items() if value is not None}
if not settings.get("db_host") or not settings.get("db_user"):
    raise RuntimeError("Expected the CI server's explicit PostgreSQL connection")
connection = {name.removeprefix("db_"): value for name, value in settings.items()}
with psycopg2.connect(dbname="postgres", **connection) as database:
    with database.cursor() as cursor:
        cursor.execute("SELECT 1 FROM pg_database WHERE datname = %s", ("json2_test_ci",))
        if cursor.fetchone():
            raise RuntimeError("Refusing to reuse an existing JSON-2 database")

config = configparser.ConfigParser(interpolation=None)
config["options"] = dict(settings, addons_path="/usr/lib/python3/dist-packages/odoo/addons,/mnt/extra-addons",
                         log_level="critical", logfile="/tmp/json2-shell.log", max_cron_threads="0")
with os.fdopen(os.open("/tmp/json2-ci.conf", os.O_WRONLY | os.O_CREAT | os.O_EXCL, 0o600), "w") as handle:
    config.write(handle)
