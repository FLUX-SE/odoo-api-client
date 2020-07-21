<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Qweb\Field;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.qweb.field.date
 * Name : ir.qweb.field.date
 * Info :
 * Used to convert a t-field specification into an output HTML field.
 *
 *         :meth:`~.to_html` is the entry point of this conversion from QWeb, it:
 *
 *         * converts the record value to html using :meth:`~.record_to_html`
 *         * generates the metadata attributes (``data-oe-``) to set on the root
 *             result node
 *         * generates the root result node itself through :meth:`~.render_element`
 */
final class Date extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.qweb.field.date';
    }
}
