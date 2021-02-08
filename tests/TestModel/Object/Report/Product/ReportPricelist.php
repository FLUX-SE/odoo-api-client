<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Report\Product;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.product.report_pricelist
 * ---
 * Name : report.product.report_pricelist
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportPricelist extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.product.report_pricelist';
    }
}
