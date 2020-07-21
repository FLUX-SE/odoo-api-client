<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\PublisherWarranty;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : publisher_warranty.contract
 * Name : publisher_warranty.contract
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Contract extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'publisher_warranty.contract';
    }
}
