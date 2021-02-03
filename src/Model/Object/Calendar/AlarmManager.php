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
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class AlarmManager extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'calendar.alarm_manager';
    }
}
