<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\WebEditor;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : web_editor.assets
 * ---
 * Name : web_editor.assets
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
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
