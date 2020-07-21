<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\WebEditor;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : web_editor.assets
 * Name : web_editor.assets
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Assets extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'web_editor.assets';
    }
}
