<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Board;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : board.board
 * ---
 * Name : board.board
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Board extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'board.board';
    }
}
