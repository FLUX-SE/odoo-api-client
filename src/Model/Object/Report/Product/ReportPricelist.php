<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Product;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.product.report_pricelist
 * ---
 * Name : report.product.report_pricelist
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class ReportPricelist extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.product.report_pricelist';
    }
}
