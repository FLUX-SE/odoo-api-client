<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.autovacuum
 * ---
 * Name : ir.autovacuum
 * ---
 * Info :
 * Helper model to the ``@api.autovacuum`` method decorator.
 */
final class Autovacuum extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.autovacuum';
    }
}
