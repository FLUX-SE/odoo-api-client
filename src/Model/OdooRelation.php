<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo Response wrapper to handle all
 * Odoo Many2one, One2many or Many2many relations
 * given by an Odoo API response
 */
final class OdooRelation extends Base
{
    public function __construct(int $id, ?string $display_name = null)
    {
        $this->id = $id;
        $this->display_name = $display_name;
    }
}
