<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Followup;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.followup.report
 * ---
 * Name : account.followup.report
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
        return 'account.followup.report';
    }
}
