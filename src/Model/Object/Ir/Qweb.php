<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb
 * Name : ir.qweb
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
