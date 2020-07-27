<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Partner;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.partner.ledger
 * ---
 * Name : account.partner.ledger
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Ledger extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.partner.ledger';
    }
}
