<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir\Fields;

use FluxSE\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.fields.converter
 * ---
 * Name : ir.fields.converter
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Converter extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.fields.converter';
    }
}
