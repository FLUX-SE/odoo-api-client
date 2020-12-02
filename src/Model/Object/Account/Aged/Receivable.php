<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Aged;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.aged.receivable
 * ---
 * Name : account.aged.receivable
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Receivable extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.aged.receivable';
    }
}