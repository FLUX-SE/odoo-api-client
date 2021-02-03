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
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
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
