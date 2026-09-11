from odoo import api, fields, models


class Json2Fixture(models.Model):
    _name = "json2.fixture"
    _description = "Disposable JSON-2 client fixture"

    name = fields.Char(required=True)
    day = fields.Date()
    moment = fields.Datetime()
    partner_id = fields.Many2one("res.partner")
    partner_ids = fields.Many2many("res.partner")

    @api.model
    def calculate_total(self, lines):
        return sum(lines)

    @api.model
    def inspect_context(self):
        return {
            "lang": self.env.context.get("lang"),
            "allowed_company_ids": self.env.context.get("allowed_company_ids"),
        }
