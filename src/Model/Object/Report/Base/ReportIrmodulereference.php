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
 * The base model, which is implicitly inherited by all models.
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
