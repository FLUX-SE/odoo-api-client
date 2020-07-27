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
 * The base model, which is implicitly inherited by all models.
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
