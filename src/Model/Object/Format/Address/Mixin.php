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
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Mixin extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'format.address.mixin';
    }
}
