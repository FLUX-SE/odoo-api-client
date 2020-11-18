<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Format\Address;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : format.address.mixin
 * ---
 * Name : format.address.mixin
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Mixin extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'format.address.mixin';
    }
}
