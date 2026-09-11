"""Guard the shared database preparation without Docker, Odoo or live secrets."""
import os
from pathlib import Path
import types
import unittest
from unittest.mock import MagicMock, patch


class PreparationTest(unittest.TestCase):
    def prepare(self, *, exists=False, version=19, mounted=True):
        odoo = types.ModuleType("odoo")
        release = types.ModuleType("odoo.release")
        release.version_info = (version, 0)
        odoo.release = release
        postgres = types.ModuleType("psycopg2")
        postgres.connect = MagicMock()
        postgres.connect.return_value.__enter__.return_value.cursor.return_value.__enter__.return_value.fetchone.return_value = (1,) if exists else None
        source = Path(__file__).with_name("prepare_existing.py").read_text()
        command = b"odoo\0--db_host=postgres\0--db_user=odoo\0--db_password=fake-test-value%\0"
        namespace = {}
        with patch.dict("sys.modules", {"odoo": odoo, "odoo.release": release, "psycopg2": postgres}):
            with patch.object(Path, "read_bytes", return_value=command), patch.object(Path, "is_file", return_value=mounted):
                with patch("os.open", return_value=42) as create, patch("os.fdopen"):
                    if exists or version != 19 or not mounted:
                        with self.assertRaises(RuntimeError):
                            exec(compile(source, "prepare_existing.py", "exec"), namespace)
                        create.assert_not_called()
                    else:
                        exec(compile(source, "prepare_existing.py", "exec"), namespace)
                        create.assert_called_once_with("/tmp/json2-ci.conf", os.O_WRONLY | os.O_CREAT | os.O_EXCL, 0o600)
                        self.assertEqual("fake-test-value%", namespace["config"]["options"]["db_password"])
                        self.assertEqual("postgres", postgres.connect.call_args.kwargs["dbname"])
        if version != 19 or not mounted:
            postgres.connect.assert_not_called()

    def test_existing_database_is_not_overwritten(self):
        self.prepare(exists=True)

    def test_wrong_odoo_version_is_rejected_before_connecting(self):
        self.prepare(version=18)

    def test_missing_fixture_mount_is_rejected_before_connecting(self):
        self.prepare(mounted=False)

    def test_db_credentials_stay_in_a_protected_config_file(self):
        self.prepare()
