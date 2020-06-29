<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Account\Tax as TaxAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position.tax
 * Name : account.fiscal.position.tax
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Tax extends Base
{
    /**
     * Fiscal Position
     *
     * @var Position
     */
    private $position_id;

    /**
     * Tax on Product
     *
     * @var TaxAlias
     */
    private $tax_src_id;

    /**
     * Tax to Apply
     *
     * @var null|TaxAlias
     */
    private $tax_dest_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param Position $position_id Fiscal Position
     * @param TaxAlias $tax_src_id Tax on Product
     */
    public function __construct(Position $position_id, TaxAlias $tax_src_id)
    {
        $this->position_id = $position_id;
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @param Position $position_id
     */
    public function setPositionId(Position $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @param TaxAlias $tax_src_id
     */
    public function setTaxSrcId(TaxAlias $tax_src_id): void
    {
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @param null|TaxAlias $tax_dest_id
     */
    public function setTaxDestId(?TaxAlias $tax_dest_id): void
    {
        $this->tax_dest_id = $tax_dest_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
