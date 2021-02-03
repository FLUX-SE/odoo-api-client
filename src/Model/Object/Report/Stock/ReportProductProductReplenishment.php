<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Stock;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.stock.report_product_product_replenishment
 * ---
 * Name : report.stock.report_product_product_replenishment
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportProductProductReplenishment extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.stock.report_product_product_replenishment';
    }
}
