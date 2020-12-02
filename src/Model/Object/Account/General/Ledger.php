<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\General;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.general.ledger
 * ---
 * Name : account.general.ledger
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Ledger extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.general.ledger';
    }
}