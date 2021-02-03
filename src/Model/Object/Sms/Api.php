<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : sms.api
 * ---
 * Name : sms.api
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Api extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.api';
    }
}
