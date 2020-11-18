<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Google;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : google.calendar
 * ---
 * Name : google.calendar
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Calendar extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'google.calendar';
    }
}
