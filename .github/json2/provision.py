"""Executed through Odoo shell stdin. Never write credentials to stdout/logs."""
import json
import os
import secrets
import traceback
from datetime import datetime, timedelta

from odoo import Command, fields


def provision(env):
    assert env.cr.dbname == "json2_test_ci"
    run_id = "docker-" + secrets.token_hex(6)
    company = env.ref("base.main_company")
    company.write({"country_id": env.ref("base.us").id})
    env["account.chart.template"].try_loading("us", company, install_demo=False)
    for admin in (env.ref("base.user_admin"), env.ref("base.user_root")):
        admin.password = secrets.token_urlsafe(48)
    user = env["res.users"].with_context(no_reset_password=True).create({
        "name": "JSON2 integration", "login": "json2-" + run_id,
        "password": secrets.token_urlsafe(48),
        "company_id": company.id, "company_ids": [Command.set(company.ids)],
        "group_ids": [Command.set([
            env.ref("base.group_user").id, env.ref("account.group_account_manager").id,
            env.ref("base.group_partner_manager").id,
        ])],
    })
    assert env.ref("base.group_system") not in user.all_group_ids
    restricted = env["res.users"].with_context(no_reset_password=True).create({
        "name": "JSON2 restricted", "login": "restricted-" + run_id,
        "password": secrets.token_urlsafe(48),
        "company_id": company.id, "company_ids": [Command.set(company.ids)],
        "group_ids": [Command.set([env.ref("base.group_user").id])],
    })
    accounts = env["account.account"].with_company(company)
    outstanding = accounts.create({
        "name": "JSON2 outstanding receipts", "code": "109999",
        "account_type": "asset_current", "reconcile": True,
        "company_ids": [Command.set(company.ids)],
    })
    sales = env["account.journal"].search([("type", "=", "sale"), ("company_id", "=", company.id)], limit=1)
    bank = env["account.journal"].search([("type", "=", "bank"), ("company_id", "=", company.id)], limit=1)
    assert sales and bank
    bank.inbound_payment_method_line_ids.write({"payment_account_id": outstanding.id})
    income = accounts.search([("account_type", "=", "income"), ("company_ids", "in", company.ids)], limit=1)
    partner = env["res.partner"].create({"name": "JSON2 customer " + run_id})

    def invoice(reference):
        return env["account.move"].with_user(user).create({
            "move_type": "out_invoice", "partner_id": partner.id,
            "journal_id": sales.id, "invoice_date": fields.Date.today(), "ref": reference,
            "invoice_line_ids": [Command.create({
                "name": "JSON2 fixture", "account_id": income.id,
                "quantity": 1, "price_unit": 25.5, "tax_ids": [Command.clear()],
            })],
        })

    draft = invoice("json2-action-post:" + run_id)
    payment_move = invoice("json2-payment:" + run_id)
    payment_move.action_post()
    wizard = env["account.payment.register"].with_user(user).with_context(
        active_model="account.move", active_ids=payment_move.ids,
    ).create({"journal_id": bank.id})
    key_name = "json2-ci-" + run_id
    expires = datetime.now() + timedelta(hours=1)
    key = env["res.users.apikeys"].with_user(user)._generate("rpc", key_name, expires)
    restricted_key = env["res.users.apikeys"].with_user(restricted)._generate("rpc", key_name, expires)
    variables = {
        "ODOO_JSON2_INTEGRATION": "1", "ODOO_JSON2_ALLOW_WRITES": "1",
        "ODOO_JSON2_DATABASE": env.cr.dbname, "ODOO_JSON2_DISPOSABLE_DATABASE": env.cr.dbname,
        "ODOO_JSON2_EXPECTED_MAJOR": "19", "ODOO_JSON2_RUN_ID": run_id,
        "ODOO_JSON2_API_KEY": key, "ODOO_JSON2_RESTRICTED_API_KEY": restricted_key,
        "ODOO_JSON2_LOGIN": user.login, "ODOO_JSON2_UID": str(user.id),
        "ODOO_JSON2_ACCOUNT_MOVE_ID": str(draft.id),
        "ODOO_JSON2_ACCOUNT_MOVE_COMPANY_ID": str(company.id),
        "ODOO_JSON2_ACCOUNT_MOVE_JOURNAL_ID": str(sales.id),
        "ODOO_JSON2_PAYMENT_MOVE_ID": str(payment_move.id),
        "ODOO_JSON2_PAYMENT_COMPANY_ID": str(company.id),
        "ODOO_JSON2_PAYMENT_MOVE_JOURNAL_ID": str(sales.id),
        "ODOO_JSON2_PAYMENT_REGISTER_ID": str(wizard.id),
        "ODOO_JSON2_PAYMENT_JOURNAL_ID": str(bank.id),
    }
    env.cr.commit()
    with os.fdopen(os.open("/tmp/json2-credentials.json", os.O_WRONLY | os.O_CREAT | os.O_EXCL, 0o600), "w") as handle:
        json.dump(variables, handle)
    print("JSON2 fixtures and two expiring API keys provisioned")


try:
    provision(env)
except Exception as error:
    # Print locations and exception type only, never messages/SQL/locals.
    print("Provisioning failed: " + type(error).__name__)
    for frame in traceback.extract_tb(error.__traceback__):
        print(f"{frame.filename}:{frame.lineno} {frame.name}")
    raise SystemExit(1)
