<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\AccountFollowup;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account_followup.report_followup_print_all
 * ---
 * Name : report.account_followup.report_followup_print_all
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportFollowupPrintAll extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.account_followup.report_followup_print_all';
    }
}
