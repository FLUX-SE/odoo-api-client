<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\L10nUsReports\Check;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : l10n_us_reports.check.register
 * ---
 * Name : l10n_us_reports.check.register
 * ---
 * Info :
 * Check Register is an accounting report usually part of the general ledger, used to record
 *         financial transactions in cash.
 */
final class Register extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'l10n_us_reports.check.register';
    }
}
