<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Report\L10nFrHrPayroll;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.l10n_fr_hr_payroll.report_l10n_fr_fiche_paye
 * ---
 * Name : report.l10n_fr_hr_payroll.report_l10n_fr_fiche_paye
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class ReportL10nFrFichePaye extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.l10n_fr_hr_payroll.report_l10n_fr_fiche_paye';
    }
}
