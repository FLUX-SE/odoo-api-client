<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Sale;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.sale.report_saleproforma
 * Name : report.sale.report_saleproforma
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class ReportSaleproforma extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.sale.report_saleproforma';
    }
}
