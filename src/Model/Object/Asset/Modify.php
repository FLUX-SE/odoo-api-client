<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Asset;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : asset.modify
 * ---
 * Name : asset.modify
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Modify extends Base
{
    /**
     * Reason
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Asset
     * ---
     * The asset to be modified by this wizard
     * ---
     * Relation : many2one (account.asset)
     * @see \Flux\OdooApiClient\Model\Object\Account\Asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $asset_id;

    /**
     * Number of Depreciations
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $method_number;

    /**
     * Number of Months in a Period
     * ---
     * The amount of time between two depreciations
     * ---
     * Selection : (default value, usually null)
     *     -> 1 (Months)
     *     -> 12 (Years)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $method_period;

    /**
     * Depreciable Amount
     * ---
     * New residual amount for the asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $value_residual;

    /**
     * Not Depreciable Amount
     * ---
     * New salvage amount for the asset
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $salvage_value;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Need Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $need_date;

    /**
     * Gain Value
     * ---
     * Technical field to know if we should display the fields for the creation of gross increase asset
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $gain_value;

    /**
     * Asset Gross Increase Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_asset_id;

    /**
     * Account Asset Counterpart
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_asset_counterpart_id;

    /**
     * Account Depreciation
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_depreciation_id;

    /**
     * Account Depreciation Expense
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_depreciation_expense_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $asset_id Asset
     *        ---
     *        The asset to be modified by this wizard
     *        ---
     *        Relation : many2one (account.asset)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Asset
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $method_number Number of Depreciations
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $asset_id, int $method_number)
    {
        $this->asset_id = $asset_id;
        $this->method_number = $method_number;
    }

    /**
     * @param OdooRelation|null $account_depreciation_expense_id
     */
    public function setAccountDepreciationExpenseId(?OdooRelation $account_depreciation_expense_id): void
    {
        $this->account_depreciation_expense_id = $account_depreciation_expense_id;
    }

    /**
     * @param OdooRelation|null $account_asset_id
     */
    public function setAccountAssetId(?OdooRelation $account_asset_id): void
    {
        $this->account_asset_id = $account_asset_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_asset_counterpart_id")
     */
    public function getAccountAssetCounterpartId(): ?OdooRelation
    {
        return $this->account_asset_counterpart_id;
    }

    /**
     * @param OdooRelation|null $account_asset_counterpart_id
     */
    public function setAccountAssetCounterpartId(?OdooRelation $account_asset_counterpart_id): void
    {
        $this->account_asset_counterpart_id = $account_asset_counterpart_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_depreciation_id")
     */
    public function getAccountDepreciationId(): ?OdooRelation
    {
        return $this->account_depreciation_id;
    }

    /**
     * @param OdooRelation|null $account_depreciation_id
     */
    public function setAccountDepreciationId(?OdooRelation $account_depreciation_id): void
    {
        $this->account_depreciation_id = $account_depreciation_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_depreciation_expense_id")
     */
    public function getAccountDepreciationExpenseId(): ?OdooRelation
    {
        return $this->account_depreciation_expense_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $gain_value
     */
    public function setGainValue(?bool $gain_value): void
    {
        $this->gain_value = $gain_value;
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
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
     * @return OdooRelation|null
     *
     * @SerializedName("account_asset_id")
     */
    public function getAccountAssetId(): ?OdooRelation
    {
        return $this->account_asset_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("gain_value")
     */
    public function isGainValue(): ?bool
    {
        return $this->gain_value;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return float|null
     *
     * @SerializedName("value_residual")
     */
    public function getValueResidual(): ?float
    {
        return $this->value_residual;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("asset_id")
     */
    public function getAssetId(): OdooRelation
    {
        return $this->asset_id;
    }

    /**
     * @param OdooRelation $asset_id
     */
    public function setAssetId(OdooRelation $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return int
     *
     * @SerializedName("method_number")
     */
    public function getMethodNumber(): int
    {
        return $this->method_number;
    }

    /**
     * @param int $method_number
     */
    public function setMethodNumber(int $method_number): void
    {
        $this->method_number = $method_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("method_period")
     */
    public function getMethodPeriod(): ?string
    {
        return $this->method_period;
    }

    /**
     * @param string|null $method_period
     */
    public function setMethodPeriod(?string $method_period): void
    {
        $this->method_period = $method_period;
    }

    /**
     * @param float|null $value_residual
     */
    public function setValueResidual(?float $value_residual): void
    {
        $this->value_residual = $value_residual;
    }

    /**
     * @param bool|null $need_date
     */
    public function setNeedDate(?bool $need_date): void
    {
        $this->need_date = $need_date;
    }

    /**
     * @return float|null
     *
     * @SerializedName("salvage_value")
     */
    public function getSalvageValue(): ?float
    {
        return $this->salvage_value;
    }

    /**
     * @param float|null $salvage_value
     */
    public function setSalvageValue(?float $salvage_value): void
    {
        $this->salvage_value = $salvage_value;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("need_date")
     */
    public function isNeedDate(): ?bool
    {
        return $this->need_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'asset.modify';
    }
}
