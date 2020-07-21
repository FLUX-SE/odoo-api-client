<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.fiscal.position.tax.template
 * Name : account.fiscal.position.tax.template
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Template extends Base
{
    /**
     * Fiscal Position
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $position_id;

    /**
     * Tax Source
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $tax_src_id;

    /**
     * Replacement Tax
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tax_dest_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $position_id Fiscal Position
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $tax_src_id Tax Source
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $position_id, OdooRelation $tax_src_id)
    {
        $this->position_id = $position_id;
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPositionId(): OdooRelation
    {
        return $this->position_id;
    }

    /**
     * @param OdooRelation $position_id
     */
    public function setPositionId(OdooRelation $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @return OdooRelation
     */
    public function getTaxSrcId(): OdooRelation
    {
        return $this->tax_src_id;
    }

    /**
     * @param OdooRelation $tax_src_id
     */
    public function setTaxSrcId(OdooRelation $tax_src_id): void
    {
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTaxDestId(): ?OdooRelation
    {
        return $this->tax_dest_id;
    }

    /**
     * @param OdooRelation|null $tax_dest_id
     */
    public function setTaxDestId(?OdooRelation $tax_dest_id): void
    {
        $this->tax_dest_id = $tax_dest_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.fiscal.position.tax.template';
    }
}
