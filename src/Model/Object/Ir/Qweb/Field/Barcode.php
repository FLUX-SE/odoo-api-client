<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.barcode
 * Name : ir.qweb.field.barcode
 * Info :
 * ``barcode`` widget rendering, inserts a data:uri-using image tag in the
 *         document. May be overridden by e.g. the website module to generate links
 *         instead.
 */
final class Barcode extends Base
{
    public const ODOO_MODEL_NAME = 'ir.qweb.field.barcode';
}
