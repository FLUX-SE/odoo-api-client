<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Account;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account.report_invoice_with_payments
 * ---
 * Name : report.account.report_invoice_with_payments
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class ReportInvoiceWithPayments extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.account.report_invoice_with_payments';
    }
}