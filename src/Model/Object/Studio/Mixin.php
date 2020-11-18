<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Studio;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : studio.mixin
 * ---
 * Name : studio.mixin
 * ---
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
abstract class Mixin extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'studio.mixin';
    }
}
