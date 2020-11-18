<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\SaleCoupon;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.sale_coupon.report_coupon
 * ---
 * Name : report.sale_coupon.report_coupon
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class ReportCoupon extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.sale_coupon.report_coupon';
    }
}
