<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\PointOfSale;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.point_of_sale.report_invoice
 * ---
 * Name : report.point_of_sale.report_invoice
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class ReportInvoice extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.point_of_sale.report_invoice';
    }
}
