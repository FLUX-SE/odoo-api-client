<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.http
 * ---
 * Name : ir.http
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Http extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.http';
    }
}
