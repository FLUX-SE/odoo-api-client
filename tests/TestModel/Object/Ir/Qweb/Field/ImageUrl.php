<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Qweb\Field;

use FluxSE\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.image_url
 * ---
 * Name : ir.qweb.field.image_url
 * ---
 * Info :
 * ``image_url`` widget rendering, inserts an image tag in the
 *         document.
 */
final class ImageUrl extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.image_url';
    }
}
