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
final class Line extends Base
{
    /**
     * Transfer Model
     *
     * @var Model
     */
    private $transfer_model_id;

    /**
     * Destination Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Percent
     * Percentage of the sum of lines from the origin accounts will be transferred to the destination account
     *
     * @var float
     */
    private $percent;

    /**
     * Analytic Filter
     * The sum of all lines from the origin accounts having this analytic account will be automatically transferred
     * to the destination account
     *
     * @var null|AccountAlias[]
     */
    private $analytic_account_ids;

    /**
     * Percent Is Readonly
     *
     * @var null|bool
     */
    private $percent_is_readonly;

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
     * @param Model $transfer_model_id Transfer Model
     * @param Account $account_id Destination Account
     * @param float $percent Percent
     *        Percentage of the sum of lines from the origin accounts will be transferred to the destination account
     */
    public function __construct(Model $transfer_model_id, Account $account_id, float $percent)
    {
        $this->transfer_model_id = $transfer_model_id;
        $this->account_id = $account_id;
        $this->percent = $percent;
    }

    /**
     * @param Model $transfer_model_id
     */
    public function setTransferModelId(Model $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param float $percent
     */
    public function setPercent(float $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @param null|AccountAlias[] $analytic_account_ids
     */
    public function setAnalyticAccountIds(?array $analytic_account_ids): void
    {
        $this->analytic_account_ids = $analytic_account_ids;
    }

    /**
     * @param AccountAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAnalyticAccountIds(AccountAlias $item, bool $strict = true): bool
    {
        if (null === $this->analytic_account_ids) {
            return false;
        }

        return in_array($item, $this->analytic_account_ids, $strict);
    }

    /**
     * @param AccountAlias $item
     */
    public function addAnalyticAccountIds(AccountAlias $item): void
    {
        if ($this->hasAnalyticAccountIds($item)) {
            return;
        }

        if (null === $this->analytic_account_ids) {
            $this->analytic_account_ids = [];
        }

        $this->analytic_account_ids[] = $item;
    }

    /**
     * @param AccountAlias $item
     */
    public function removeAnalyticAccountIds(AccountAlias $item): void
    {
        if (null === $this->analytic_account_ids) {
            $this->analytic_account_ids = [];
        }

        if ($this->hasAnalyticAccountIds($item)) {
            $index = array_search($item, $this->analytic_account_ids);
            unset($this->analytic_account_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isPercentIsReadonly(): ?bool
    {
        return $this->percent_is_readonly;
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
