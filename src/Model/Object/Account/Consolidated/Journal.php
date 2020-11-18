<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Consolidated;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.consolidated.journal
 * ---
 * Name : account.consolidated.journal
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Journal extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.consolidated.journal';
    }
}
