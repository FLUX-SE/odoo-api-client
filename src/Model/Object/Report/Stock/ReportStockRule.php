<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Stock;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.stock.report_stock_rule
 * ---
 * Name : report.stock.report_stock_rule
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportStockRule extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.stock.report_stock_rule';
    }
}
