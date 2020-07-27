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
 * The base model, which is implicitly inherited by all models.
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
