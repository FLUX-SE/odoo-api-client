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
    /** @var BaseInterface|null */
    private $embed_model;

    /**
     * @param int|null|false $id
     * @param string|null $display_name
     * @param BaseInterface|null $embed_model
     */
    public function __construct(
        $id = null,
        ?string $display_name = null,
        ?BaseInterface $embed_model = null
    ) {
        $this->id = $id;
        $this->display_name = $display_name;
        $this->embed_model = $embed_model;
    }

    public function getEmbedModel(): ?BaseInterface
    {
        return $this->embed_model;
    }

    public function setEmbedModel(?BaseInterface $embed_model): void
    {
        $this->embed_model = $embed_model;
    }
}
