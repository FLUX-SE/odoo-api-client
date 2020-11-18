<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Fields;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.fields.converter
 * ---
 * Name : ir.fields.converter
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Converter extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.fields.converter';
    }
}
