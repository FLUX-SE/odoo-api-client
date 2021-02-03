<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Base;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.base.report_irmodulereference
 * ---
 * Name : report.base.report_irmodulereference
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportIrmodulereference extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.base.report_irmodulereference';
    }
}
