<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.monetary
 * Name : ir.qweb.field.monetary
 * Info :
 * ``monetary`` converter, has a mandatory option
 *         ``display_currency`` only if field is not of type Monetary.
 *         Otherwise, if we are in presence of a monetary field, the field definition must
 *         have a currency_field attribute set.
 *
 *         The currency is used for formatting *and rounding* of the float value. It
 *         is assumed that the linked res_currency has a non-empty rounding value and
 *         res.currency's ``round`` method is used to perform rounding.
 *
 *         .. note:: the monetary converter internally adds the qweb context to its
 *                             options mapping, so that the context is available to callees.
 *                             It's set under the ``_values`` key.
 */
final class Monetary extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.monetary';
    }
}
