<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position.account
 * Name : account.fiscal.position.account
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
final class Account extends Base
{
    /**
     * Fiscal Position
     *
     * @var Position
     */
    private $position_id;

    /**
     * Account on Product
     *
     * @var AccountAlias
     */
    private $account_src_id;

    /**
     * Account to Use Instead
     *
     * @var AccountAlias
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
     * @param Position $position_id Fiscal Position
     * @param AccountAlias $account_src_id Account on Product
     * @param AccountAlias $account_dest_id Account to Use Instead
     */
    public function __construct(
        Position $position_id,
        AccountAlias $account_src_id,
        AccountAlias $account_dest_id
    ) {
        $this->position_id = $position_id;
        $this->account_src_id = $account_src_id;
        $this->account_dest_id = $account_dest_id;
    }

    /**
     * @param Position $position_id
     */
    public function setPositionId(Position $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @param AccountAlias $account_src_id
     */
    public function setAccountSrcId(AccountAlias $account_src_id): void
    {
        $this->account_src_id = $account_src_id;
    }

    /**
     * @param AccountAlias $account_dest_id
     */
    public function setAccountDestId(AccountAlias $account_dest_id): void
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
