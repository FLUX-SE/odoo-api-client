<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Calendar;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : calendar.alarm_manager
 * ---
 * Name : calendar.alarm_manager
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class AlarmManager extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'calendar.alarm_manager';
    }
}
