<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : mail.bot
 * ---
 * Name : mail.bot
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Bot extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.bot';
    }
}
