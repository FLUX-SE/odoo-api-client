<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Ir;

use FluxSE\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb
 * ---
 * Name : ir.qweb
 * ---
 * Info :
 * QWeb object for rendering editor stuff
 */
final class Qweb extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb';
    }
}
