<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.float
 * ---
 * Name : ir.qweb.field.float
 * ---
 * Info :
 * Override qweb.field.float to add a `decimal_precision` domain option
 *         and use that instead of the column's own value if it is specified
 */
abstract class Float_ extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.float';
    }
}
