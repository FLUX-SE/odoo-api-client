<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Report\Account;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account.report_invoice_with_payments
 * ---
 * Name : report.account.report_invoice_with_payments
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
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
