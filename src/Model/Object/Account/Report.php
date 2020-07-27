<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.report
 * ---
 * Name : account.report
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
        return 'account.report';
    }
}
