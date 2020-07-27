<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Bank\Reconciliation;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.bank.reconciliation.report
 * ---
 * Name : account.bank.reconciliation.report
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Report extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.bank.reconciliation.report';
    }
}
