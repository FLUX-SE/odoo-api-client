<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Google;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : google.service
 * ---
 * Name : google.service
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Service extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'google.service';
    }
}
