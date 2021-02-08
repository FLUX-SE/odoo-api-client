<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.image
 * ---
 * Name : ir.qweb.field.image
 * ---
 * Info :
 * Widget options:
 *
 *         ``class``
 *                 set as attribute on the generated <img> tag
 */
final class Image extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.image';
    }
}
