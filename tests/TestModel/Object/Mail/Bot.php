<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail;

use FluxSE\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : mail.bot
 * ---
 * Name : mail.bot
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Bot extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.bot';
    }
}
