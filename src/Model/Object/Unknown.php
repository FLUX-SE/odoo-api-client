<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object;

/**
 * Odoo model : _unknown
 * ---
 * Name : _unknown
 * ---
 * Info :
 * Abstract model used as a substitute for relational fields with an unknown
 *         comodel.
 */
final class Unknown extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return '_unknown';
    }
}
