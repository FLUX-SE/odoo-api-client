<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object;

/**
 * Odoo model : ir_actions_account_report_download
 * ---
 * Name : ir_actions_account_report_download
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class IrActionsAccountReportDownload extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir_actions_account_report_download';
    }
}
