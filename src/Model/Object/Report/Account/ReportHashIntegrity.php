<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\Account;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account.report_hash_integrity
 * ---
 * Name : report.account.report_hash_integrity
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class ReportHashIntegrity extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.account.report_hash_integrity';
    }
}
