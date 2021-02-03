<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Valuation;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.valuation.layer
 * ---
 * Name : stock.valuation.layer
 * ---
 * Info :
 * Stock Valuation Layer
 */
final class Layer extends Base
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
     * Product
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
     * Product Category
     * ---
     * Select category for the current product
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $categ_id;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_tmpl_id;

    /**
     * Quantity
     * ---
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $quantity;

    /**
     * Unit of Measure
     * ---
     * Default unit of measure used for all stock operations.
     * ---
     * Relation : many2one (uom.uom)
     * @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $uom_id;

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
     * Unit Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $unit_cost;

    /**
     * Total Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $value;

    /**
     * Remaining Qty
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $remaining_qty;

    /**
     * Remaining Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $remaining_value;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Linked To
     * ---
     * Relation : many2one (stock.valuation.layer)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Valuation\Layer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $stock_valuation_layer_id;

    /**
     * Stock Valuation Layer
     * ---
     * Relation : one2many (stock.valuation.layer -> stock_valuation_layer_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Valuation\Layer
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $stock_valuation_layer_ids;

    /**
     * Stock Move
     * ---
     * Relation : many2one (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $stock_move_id;

    /**
     * Journal Entry
     * ---
     * Relation : many2one (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_move_id;

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
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        ---
     *        Default unit of measure used for all stock operations.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $company_id,
        OdooRelation $product_id,
        OdooRelation $uom_id,
        OdooRelation $currency_id
    ) {
        $this->company_id = $company_id;
        $this->product_id = $product_id;
        $this->uom_id = $uom_id;
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation|null $stock_move_id
     */
    public function setStockMoveId(?OdooRelation $stock_move_id): void
    {
        $this->stock_move_id = $stock_move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("stock_valuation_layer_id")
     */
    public function getStockValuationLayerId(): ?OdooRelation
    {
        return $this->stock_valuation_layer_id;
    }

    /**
     * @param OdooRelation|null $stock_valuation_layer_id
     */
    public function setStockValuationLayerId(?OdooRelation $stock_valuation_layer_id): void
    {
        $this->stock_valuation_layer_id = $stock_valuation_layer_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("stock_valuation_layer_ids")
     */
    public function getStockValuationLayerIds(): ?array
    {
        return $this->stock_valuation_layer_ids;
    }

    /**
     * @param OdooRelation[]|null $stock_valuation_layer_ids
     */
    public function setStockValuationLayerIds(?array $stock_valuation_layer_ids): void
    {
        $this->stock_valuation_layer_ids = $stock_valuation_layer_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStockValuationLayerIds(OdooRelation $item): bool
    {
        if (null === $this->stock_valuation_layer_ids) {
            return false;
        }

        return in_array($item, $this->stock_valuation_layer_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStockValuationLayerIds(OdooRelation $item): void
    {
        if ($this->hasStockValuationLayerIds($item)) {
            return;
        }

        if (null === $this->stock_valuation_layer_ids) {
            $this->stock_valuation_layer_ids = [];
        }

        $this->stock_valuation_layer_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStockValuationLayerIds(OdooRelation $item): void
    {
        if (null === $this->stock_valuation_layer_ids) {
            $this->stock_valuation_layer_ids = [];
        }

        if ($this->hasStockValuationLayerIds($item)) {
            $index = array_search($item, $this->stock_valuation_layer_ids);
            unset($this->stock_valuation_layer_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("stock_move_id")
     */
    public function getStockMoveId(): ?OdooRelation
    {
        return $this->stock_move_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_move_id")
     */
    public function getAccountMoveId(): ?OdooRelation
    {
        return $this->account_move_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param OdooRelation|null $account_move_id
     */
    public function setAccountMoveId(?OdooRelation $account_move_id): void
    {
        $this->account_move_id = $account_move_id;
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
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param float|null $remaining_value
     */
    public function setRemainingValue(?float $remaining_value): void
    {
        $this->remaining_value = $remaining_value;
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
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return OdooRelation|null
     *
     * @SerializedName("categ_id")
     */
    public function getCategId(): ?OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation|null $categ_id
     */
    public function setCategId(?OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("quantity")
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("uom_id")
     */
    public function getUomId(): OdooRelation
    {
        return $this->uom_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("remaining_value")
     */
    public function getRemainingValue(): ?float
    {
        return $this->remaining_value;
    }

    /**
     * @param OdooRelation $uom_id
     */
    public function setUomId(OdooRelation $uom_id): void
    {
        $this->uom_id = $uom_id;
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
     * @return float|null
     *
     * @SerializedName("unit_cost")
     */
    public function getUnitCost(): ?float
    {
        return $this->unit_cost;
    }

    /**
     * @param float|null $unit_cost
     */
    public function setUnitCost(?float $unit_cost): void
    {
        $this->unit_cost = $unit_cost;
    }

    /**
     * @return float|null
     *
     * @SerializedName("value")
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     */
    public function setValue(?float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return float|null
     *
     * @SerializedName("remaining_qty")
     */
    public function getRemainingQty(): ?float
    {
        return $this->remaining_qty;
    }

    /**
     * @param float|null $remaining_qty
     */
    public function setRemainingQty(?float $remaining_qty): void
    {
        $this->remaining_qty = $remaining_qty;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.valuation.layer';
    }
}
