<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Report\HrPayroll;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.hr_payroll.contribution_register
 * ---
 * Name : report.hr_payroll.contribution_register
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ContributionRegister extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.hr_payroll.contribution_register';
    }
}
