<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Valuation\Layer;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.valuation.layer.revaluation
 * ---
 * Name : stock.valuation.layer.revaluation
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Revaluation extends Base
{
    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Related product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_id;

    /**
     * Inventory Valuation
     * ---
     * Manual: The accounting entries to value the inventory are not posted automatically.
     *                 Automated: An accounting entry is automatically created to value the inventory when a product
     * enters or leaves the company.
     *                 
     * ---
     * Selection :
     *     -> manual_periodic (Manual)
     *     -> real_time (Automated)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $property_valuation;

    /**
     * Unit of Measure
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $product_uom_name;

    /**
     * Current Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $current_value_svl;

    /**
     * Current Quantity
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $current_quantity_svl;

    /**
     * Added value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $added_value;

    /**
     * New value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $new_value;

    /**
     * New value by quantity
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $new_value_by_qty;

    /**
     * Reason
     * ---
     * Reason of the revaluation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reason;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_journal_id;

    /**
     * Counterpart Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Accounting Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $product_id Related product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $added_value Added value
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $account_journal_id Journal
     *        ---
     *        Relation : many2one (account.journal)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Journal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $company_id,
        OdooRelation $currency_id,
        OdooRelation $product_id,
        float $added_value,
        OdooRelation $account_journal_id
    ) {
        $this->company_id = $company_id;
        $this->currency_id = $currency_id;
        $this->product_id = $product_id;
        $this->added_value = $added_value;
        $this->account_journal_id = $account_journal_id;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string|null $reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("account_journal_id")
     */
    public function getAccountJournalId(): OdooRelation
    {
        return $this->account_journal_id;
    }

    /**
     * @param OdooRelation $account_journal_id
     */
    public function setAccountJournalId(OdooRelation $account_journal_id): void
    {
        $this->account_journal_id = $account_journal_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_id")
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param float|null $new_value_by_qty
     */
    public function setNewValueByQty(?float $new_value_by_qty): void
    {
        $this->new_value_by_qty = $new_value_by_qty;
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
     * @return string|null
     *
     * @SerializedName("reason")
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @return float|null
     *
     * @SerializedName("new_value_by_qty")
     */
    public function getNewValueByQty(): ?float
    {
        return $this->new_value_by_qty;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("product_uom_name")
     */
    public function getProductUomName(): ?string
    {
        return $this->product_uom_name;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("property_valuation")
     */
    public function getPropertyValuation(): ?string
    {
        return $this->property_valuation;
    }

    /**
     * @param string|null $property_valuation
     */
    public function setPropertyValuation(?string $property_valuation): void
    {
        $this->property_valuation = $property_valuation;
    }

    /**
     * @param string|null $product_uom_name
     */
    public function setProductUomName(?string $product_uom_name): void
    {
        $this->product_uom_name = $product_uom_name;
    }

    /**
     * @param float|null $new_value
     */
    public function setNewValue(?float $new_value): void
    {
        $this->new_value = $new_value;
    }

    /**
     * @return float|null
     *
     * @SerializedName("current_value_svl")
     */
    public function getCurrentValueSvl(): ?float
    {
        return $this->current_value_svl;
    }

    /**
     * @param float|null $current_value_svl
     */
    public function setCurrentValueSvl(?float $current_value_svl): void
    {
        $this->current_value_svl = $current_value_svl;
    }

    /**
     * @return float|null
     *
     * @SerializedName("current_quantity_svl")
     */
    public function getCurrentQuantitySvl(): ?float
    {
        return $this->current_quantity_svl;
    }

    /**
     * @param float|null $current_quantity_svl
     */
    public function setCurrentQuantitySvl(?float $current_quantity_svl): void
    {
        $this->current_quantity_svl = $current_quantity_svl;
    }

    /**
     * @return float
     *
     * @SerializedName("added_value")
     */
    public function getAddedValue(): float
    {
        return $this->added_value;
    }

    /**
     * @param float $added_value
     */
    public function setAddedValue(float $added_value): void
    {
        $this->added_value = $added_value;
    }

    /**
     * @return float|null
     *
     * @SerializedName("new_value")
     */
    public function getNewValue(): ?float
    {
        return $this->new_value;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.valuation.layer.revaluation';
    }
}
