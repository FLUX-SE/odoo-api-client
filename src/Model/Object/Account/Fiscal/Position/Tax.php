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
 *
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
     * @var null|Position
     */
    private $position_id;

    /**
     * Tax on Product
     *
     * @var null|TaxAlias
     */
    private $tax_src_id;

    /**
     * Tax to Apply
     *
     * @var TaxAlias
     */
    private $tax_dest_id;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|Position $position_id
     */
    public function setPositionId(Position $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @param null|TaxAlias $tax_src_id
     */
    public function setTaxSrcId(TaxAlias $tax_src_id): void
    {
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @param TaxAlias $tax_dest_id
     */
    public function setTaxDestId(TaxAlias $tax_dest_id): void
    {
        $this->tax_dest_id = $tax_dest_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
