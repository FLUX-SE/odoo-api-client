<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Coa;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.coa.report
 * ---
 * Name : account.coa.report
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Report extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.coa.report';
    }
}
