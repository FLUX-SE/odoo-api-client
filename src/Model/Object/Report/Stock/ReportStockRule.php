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
 * The base model, which is implicitly inherited by all models.
 */
abstract class ReportStockRule extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.stock.report_stock_rule';
    }
}
