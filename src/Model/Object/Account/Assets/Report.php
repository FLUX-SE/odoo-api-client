<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Assets;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : account.assets.report
 * Name : account.assets.report
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
        return 'account.assets.report';
    }
}
