<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.duration
 * Name : ir.qweb.field.duration
 * Info :
 * ``duration`` converter, to display integral or fractional values as
 *         human-readable time spans (e.g. 1.5 as "1 hour 30 minutes").
 *
 *         Can be used on any numerical field.
 *
 *         Has an option ``unit`` which can be one of ``second``, ``minute``,
 *         ``hour``, ``day``, ``week`` or ``year``, used to interpret the numerical
 *         field value before converting it. By default use ``second``.
 *
 *         Has an option ``round``. By default use ``second``.
 *
 *         Has an option ``digital`` to display 01:00 instead of 1 hour
 *
 *         Sub-second values will be ignored.
 */
final class Duration extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.duration';
    }
}
