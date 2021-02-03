<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Documents;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : documents.mixin
 * ---
 * Name : documents.mixin
 * ---
 * Info :
 * Inherit this mixin to automatically create a `documents.document` when
 *         an `ir.attachment` is linked to a record.
 *         Override this mixin's methods to specify an owner, a folder or tags
 *         for the document.
 */
final class Mixin extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'documents.mixin';
    }
}
