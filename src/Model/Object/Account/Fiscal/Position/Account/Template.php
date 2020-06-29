<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position.account.template
 * Name : account.fiscal.position.account.template
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
final class Template extends Base
{
    /**
     * Fiscal Mapping
     *
     * @var TemplateAlias
     */
    private $position_id;

    /**
     * Account Source
     *
     * @var TemplateAliasAlias
     */
    private $account_src_id;

    /**
     * Account Destination
     *
     * @var TemplateAliasAlias
     */
    private $account_dest_id;

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
     * @param TemplateAlias $position_id Fiscal Mapping
     * @param TemplateAliasAlias $account_src_id Account Source
     * @param TemplateAliasAlias $account_dest_id Account Destination
     */
    public function __construct(
        TemplateAlias $position_id,
        TemplateAliasAlias $account_src_id,
        TemplateAliasAlias $account_dest_id
    ) {
        $this->position_id = $position_id;
        $this->account_src_id = $account_src_id;
        $this->account_dest_id = $account_dest_id;
    }

    /**
     * @param TemplateAlias $position_id
     */
    public function setPositionId(TemplateAlias $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @param TemplateAliasAlias $account_src_id
     */
    public function setAccountSrcId(TemplateAliasAlias $account_src_id): void
    {
        $this->account_src_id = $account_src_id;
    }

    /**
     * @param TemplateAliasAlias $account_dest_id
     */
    public function setAccountDestId(TemplateAliasAlias $account_dest_id): void
    {
        $this->account_dest_id = $account_dest_id;
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
