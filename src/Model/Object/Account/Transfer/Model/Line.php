<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Transfer\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Transfer\Model;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.transfer.model.line
 * Name : account.transfer.model.line
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
final class Line extends Base
{
    /**
     * Transfer Model
     *
     * @var null|Model
     */
    private $transfer_model_id;

    /**
     * Destination Account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Percent
     *
     * @var null|float
     */
    private $percent;

    /**
     * Analytic Filter
     *
     * @var AccountAlias
     */
    private $analytic_account_ids;

    /**
     * Percent Is Readonly
     *
     * @var bool
     */
    private $percent_is_readonly;

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
     * @param null|Model $transfer_model_id
     */
    public function setTransferModelId(Model $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param null|float $percent
     */
    public function setPercent(?float $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @param AccountAlias $analytic_account_ids
     */
    public function setAnalyticAccountIds(AccountAlias $analytic_account_ids): void
    {
        $this->analytic_account_ids = $analytic_account_ids;
    }

    /**
     * @return bool
     */
    public function isPercentIsReadonly(): bool
    {
        return $this->percent_is_readonly;
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
