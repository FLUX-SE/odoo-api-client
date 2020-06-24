<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position.tax.template
 * Name : account.fiscal.position.tax.template
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
final class Template extends Base
{
    /**
     * Fiscal Position
     *
     * @var null|TemplateAlias
     */
    private $position_id;

    /**
     * Tax Source
     *
     * @var null|TemplateAliasAlias
     */
    private $tax_src_id;

    /**
     * Replacement Tax
     *
     * @var TemplateAliasAlias
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
     * @param null|TemplateAlias $position_id
     */
    public function setPositionId(TemplateAlias $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @param null|TemplateAliasAlias $tax_src_id
     */
    public function setTaxSrcId(TemplateAliasAlias $tax_src_id): void
    {
        $this->tax_src_id = $tax_src_id;
    }

    /**
     * @param TemplateAliasAlias $tax_dest_id
     */
    public function setTaxDestId(TemplateAliasAlias $tax_dest_id): void
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
