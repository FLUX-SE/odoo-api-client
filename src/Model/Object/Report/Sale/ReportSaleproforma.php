<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Sale;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.sale.report_saleproforma
 * ---
 * Name : report.sale.report_saleproforma
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
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
