<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\PublisherWarranty;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : publisher_warranty.contract
 * ---
 * Name : publisher_warranty.contract
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
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
