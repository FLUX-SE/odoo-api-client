<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Qweb\Field;

use FluxSE\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.float_time
 * ---
 * Name : ir.qweb.field.float_time
 * ---
 * Info :
 * ``float_time`` converter, to display integral or fractional values as
 *         human-readable time spans (e.g. 1.5 as "01:30").
 *
 *         Can be used on any numerical field.
 */
final class FloatTime extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.float_time';
    }
}
