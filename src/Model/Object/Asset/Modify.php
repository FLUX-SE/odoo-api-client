<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Asset;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Asset;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : asset.modify
 * Name : asset.modify
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Modify extends Base
{
    /**
     * Reason
     *
     * @var null|string
     */
    private $name;

    /**
     * Asset
     * The asset to be modified by this wizard
     *
     * @var Asset
     */
    private $asset_id;

    /**
     * Number of Depreciations
     *
     * @var int
     */
    private $method_number;

    /**
     * Number of Months in a Period
     * The amount of time between two depreciations
     *
     * @var null|array
     */
    private $method_period;

    /**
     * Depreciable Amount
     * New residual amount for the asset
     *
     * @var null|float
     */
    private $value_residual;

    /**
     * Not Depreciable Amount
     * New salvage amount for the asset
     *
     * @var null|float
     */
    private $salvage_value;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Need Date
     *
     * @var null|bool
     */
    private $need_date;

    /**
     * Gain Value
     * Technical field to know if we should display the fields for the creation of gross increase asset
     *
     * @var null|bool
     */
    private $gain_value;

    /**
     * Asset Gross Increase Account
     *
     * @var null|Account
     */
    private $account_asset_id;

    /**
     * Account Asset Counterpart
     *
     * @var null|Account
     */
    private $account_asset_counterpart_id;

    /**
     * Account Depreciation
     *
     * @var null|Account
     */
    private $account_depreciation_id;

    /**
     * Account Depreciation Expense
     *
     * @var null|Account
     */
    private $account_depreciation_expense_id;

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
     * @param Asset $asset_id Asset
     *        The asset to be modified by this wizard
     * @param int $method_number Number of Depreciations
     */
    public function __construct(Asset $asset_id, int $method_number)
    {
        $this->asset_id = $asset_id;
        $this->method_number = $method_number;
    }

    /**
     * @return null|bool
     */
    public function isNeedDate(): ?bool
    {
        return $this->need_date;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|Account $account_depreciation_expense_id
     */
    public function setAccountDepreciationExpenseId(?Account $account_depreciation_expense_id): void
    {
        $this->account_depreciation_expense_id = $account_depreciation_expense_id;
    }

    /**
     * @param null|Account $account_depreciation_id
     */
    public function setAccountDepreciationId(?Account $account_depreciation_id): void
    {
        $this->account_depreciation_id = $account_depreciation_id;
    }

    /**
     * @param null|Account $account_asset_counterpart_id
     */
    public function setAccountAssetCounterpartId(?Account $account_asset_counterpart_id): void
    {
        $this->account_asset_counterpart_id = $account_asset_counterpart_id;
    }

    /**
     * @param null|Account $account_asset_id
     */
    public function setAccountAssetId(?Account $account_asset_id): void
    {
        $this->account_asset_id = $account_asset_id;
    }

    /**
     * @return null|bool
     */
    public function isGainValue(): ?bool
    {
        return $this->gain_value;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @param null|float $salvage_value
     */
    public function setSalvageValue(?float $salvage_value): void
    {
        $this->salvage_value = $salvage_value;
    }

    /**
     * @param null|float $value_residual
     */
    public function setValueResidual(?float $value_residual): void
    {
        $this->value_residual = $value_residual;
    }

    /**
     * @param mixed $item
     */
    public function removeMethodPeriod($item): void
    {
        if (null === $this->method_period) {
            $this->method_period = [];
        }

        if ($this->hasMethodPeriod($item)) {
            $index = array_search($item, $this->method_period);
            unset($this->method_period[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addMethodPeriod($item): void
    {
        if ($this->hasMethodPeriod($item)) {
            return;
        }

        if (null === $this->method_period) {
            $this->method_period = [];
        }

        $this->method_period[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMethodPeriod($item, bool $strict = true): bool
    {
        if (null === $this->method_period) {
            return false;
        }

        return in_array($item, $this->method_period, $strict);
    }

    /**
     * @param null|array $method_period
     */
    public function setMethodPeriod(?array $method_period): void
    {
        $this->method_period = $method_period;
    }

    /**
     * @param int $method_number
     */
    public function setMethodNumber(int $method_number): void
    {
        $this->method_number = $method_number;
    }

    /**
     * @param Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
