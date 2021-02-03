<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Coupon;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.coupon.report_coupon
 * ---
 * Name : report.coupon.report_coupon
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportCoupon extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.coupon.report_coupon';
    }
}
