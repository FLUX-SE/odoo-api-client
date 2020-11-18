<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb
 * ---
 * Name : ir.qweb
 * ---
 * Info :
 * allows to render reports with full branding on every node, including the context available
 *         to evaluate every node. The context is composed of all the variables available at this point
 *         in the report, and their type.
 */
abstract class Qweb extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb';
    }
}
