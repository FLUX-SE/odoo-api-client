<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Generic\Tax;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.generic.tax.report
 * ---
 * Name : account.generic.tax.report
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Report extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.generic.tax.report';
    }
}
