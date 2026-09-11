"""Revoke only this disposable database's integration keys; no credential output."""
assert env.cr.dbname == "json2_test_ci"
keys = env["res.users.apikeys"].search([("name", "=like", "json2-ci-%")])
keys._remove()
env.cr.commit()
env.registry.signal_changes()
assert not env["res.users.apikeys"].search_count([("name", "=like", "json2-ci-%")])
print("JSON2 ephemeral keys revoked")
