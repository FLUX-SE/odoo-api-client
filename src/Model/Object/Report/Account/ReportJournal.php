<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Account;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account.report_journal
 * ---
 * Name : report.account.report_journal
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportJournal extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.account.report_journal';
    }
}
