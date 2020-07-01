<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.autovacuum
 * Name : ir.autovacuum
 * Info :
 * Expose the vacuum method to the cron jobs mechanism.
 */
final class Autovacuum extends Base
{
    public const ODOO_MODEL_NAME = 'ir.autovacuum';
}
