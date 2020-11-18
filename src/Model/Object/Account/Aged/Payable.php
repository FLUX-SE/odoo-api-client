<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Aged;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.aged.payable
 * ---
 * Name : account.aged.payable
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Payable extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.aged.payable';
    }
}
