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
 *
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
     * @var string
     */
    private $name;

    /**
     * Asset
     *
     * @var null|Asset
     */
    private $asset_id;

    /**
     * Number of Depreciations
     *
     * @var null|int
     */
    private $method_number;

    /**
     * Number of Months in a Period
     *
     * @var array
     */
    private $method_period;

    /**
     * Depreciable Amount
     *
     * @var float
     */
    private $value_residual;

    /**
     * Not Depreciable Amount
     *
     * @var float
     */
    private $salvage_value;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Need Date
     *
     * @var bool
     */
    private $need_date;

    /**
     * Gain Value
     *
     * @var bool
     */
    private $gain_value;

    /**
     * Asset Gross Increase Account
     *
     * @var Account
     */
    private $account_asset_id;

    /**
     * Account Asset Counterpart
     *
     * @var Account
     */
    private $account_asset_counterpart_id;

    /**
     * Account Depreciation
     *
     * @var Account
     */
    private $account_depreciation_id;

    /**
     * Account Depreciation Expense
     *
     * @var Account
     */
    private $account_depreciation_expense_id;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isNeedDate(): bool
    {
        return $this->need_date;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param Account $account_depreciation_expense_id
     */
    public function setAccountDepreciationExpenseId(Account $account_depreciation_expense_id): void
    {
        $this->account_depreciation_expense_id = $account_depreciation_expense_id;
    }

    /**
     * @param Account $account_depreciation_id
     */
    public function setAccountDepreciationId(Account $account_depreciation_id): void
    {
        $this->account_depreciation_id = $account_depreciation_id;
    }

    /**
     * @param Account $account_asset_counterpart_id
     */
    public function setAccountAssetCounterpartId(Account $account_asset_counterpart_id): void
    {
        $this->account_asset_counterpart_id = $account_asset_counterpart_id;
    }

    /**
     * @param Account $account_asset_id
     */
    public function setAccountAssetId(Account $account_asset_id): void
    {
        $this->account_asset_id = $account_asset_id;
    }

    /**
     * @return bool
     */
    public function isGainValue(): bool
    {
        return $this->gain_value;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param float $salvage_value
     */
    public function setSalvageValue(float $salvage_value): void
    {
        $this->salvage_value = $salvage_value;
    }

    /**
     * @param float $value_residual
     */
    public function setValueResidual(float $value_residual): void
    {
        $this->value_residual = $value_residual;
    }

    /**
     * @param array $method_period
     */
    public function removeMethodPeriod(array $method_period): void
    {
        if ($this->hasMethodPeriod($method_period)) {
            $index = array_search($method_period, $this->method_period);
            unset($this->method_period[$index]);
        }
    }

    /**
     * @param array $method_period
     */
    public function addMethodPeriod(array $method_period): void
    {
        if ($this->hasMethodPeriod($method_period)) {
            return;
        }

        $this->method_period[] = $method_period;
    }

    /**
     * @param array $method_period
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMethodPeriod(array $method_period, bool $strict = true): bool
    {
        return in_array($method_period, $this->method_period, $strict);
    }

    /**
     * @param array $method_period
     */
    public function setMethodPeriod(array $method_period): void
    {
        $this->method_period = $method_period;
    }

    /**
     * @param null|int $method_number
     */
    public function setMethodNumber(?int $method_number): void
    {
        $this->method_number = $method_number;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
