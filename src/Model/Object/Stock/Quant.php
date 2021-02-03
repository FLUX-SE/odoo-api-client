<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.quant
 * ---
 * Name : stock.quant
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Quant extends Base
{
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
     * @var OdooRelation|null
     */
    private $product_uom_id;

    /**
     * Company
     * ---
     * Let this field empty if this location is shared between companies
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_id;

    /**
     * Lot/Serial Number
     * ---
     * Relation : many2one (stock.production.lot)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Production\Lot
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $lot_id;

    /**
     * Package
     * ---
     * The package containing this quant
     * ---
     * Relation : many2one (stock.quant.package)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant\Package
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $package_id;

    /**
     * Owner
     * ---
     * This is the owner of the quant
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $owner_id;

    /**
     * Quantity
     * ---
     * Quantity of products in this quant, in the default unit of measure of the product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $quantity;

    /**
     * Inventoried Quantity
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $inventory_quantity;

    /**
     * Reserved Quantity
     * ---
     * Quantity of reserved products in this quant, in the default unit of measure of the product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $reserved_quantity;

    /**
     * Available Quantity
     * ---
     * On hand quantity which hasn't been reserved on a transfer, in the default unit of measure of the product
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $available_quantity;

    /**
     * Incoming Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $in_date;

    /**
     * Tracking
     * ---
     * Ensure the traceability of a storable product in your warehouse.
     * ---
     * Selection :
     *     -> serial (By Unique Serial Number)
     *     -> lot (By Lots)
     *     -> none (No Tracking)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $tracking;

    /**
     * On Hand
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $on_hand;

    /**
     * Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $value;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $reserved_quantity Reserved Quantity
     *        ---
     *        Quantity of reserved products in this quant, in the default unit of measure of the product
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $location_id,
        float $reserved_quantity
    ) {
        $this->product_id = $product_id;
        $this->location_id = $location_id;
        $this->reserved_quantity = $reserved_quantity;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("in_date")
     */
    public function getInDate(): ?DateTimeInterface
    {
        return $this->in_date;
    }

    /**
     * @param DateTimeInterface|null $in_date
     */
    public function setInDate(?DateTimeInterface $in_date): void
    {
        $this->in_date = $in_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tracking")
     */
    public function getTracking(): ?string
    {
        return $this->tracking;
    }

    /**
     * @param string|null $tracking
     */
    public function setTracking(?string $tracking): void
    {
        $this->tracking = $tracking;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("on_hand")
     */
    public function isOnHand(): ?bool
    {
        return $this->on_hand;
    }

    /**
     * @param bool|null $on_hand
     */
    public function setOnHand(?bool $on_hand): void
    {
        $this->on_hand = $on_hand;
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
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("available_quantity")
     */
    public function getAvailableQuantity(): ?float
    {
        return $this->available_quantity;
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
     * @param float|null $available_quantity
     */
    public function setAvailableQuantity(?float $available_quantity): void
    {
        $this->available_quantity = $available_quantity;
    }

    /**
     * @param float $reserved_quantity
     */
    public function setReservedQuantity(float $reserved_quantity): void
    {
        $this->reserved_quantity = $reserved_quantity;
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
     * @param OdooRelation $location_id
     */
    public function setLocationId(OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("product_uom_id")
     */
    public function getProductUomId(): ?OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param OdooRelation|null $product_uom_id
     */
    public function setProductUomId(?OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("lot_id")
     */
    public function getLotId(): ?OdooRelation
    {
        return $this->lot_id;
    }

    /**
     * @return float
     *
     * @SerializedName("reserved_quantity")
     */
    public function getReservedQuantity(): float
    {
        return $this->reserved_quantity;
    }

    /**
     * @param OdooRelation|null $lot_id
     */
    public function setLotId(?OdooRelation $lot_id): void
    {
        $this->lot_id = $lot_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("package_id")
     */
    public function getPackageId(): ?OdooRelation
    {
        return $this->package_id;
    }

    /**
     * @param OdooRelation|null $package_id
     */
    public function setPackageId(?OdooRelation $package_id): void
    {
        $this->package_id = $package_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("owner_id")
     */
    public function getOwnerId(): ?OdooRelation
    {
        return $this->owner_id;
    }

    /**
     * @param OdooRelation|null $owner_id
     */
    public function setOwnerId(?OdooRelation $owner_id): void
    {
        $this->owner_id = $owner_id;
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
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float|null
     *
     * @SerializedName("inventory_quantity")
     */
    public function getInventoryQuantity(): ?float
    {
        return $this->inventory_quantity;
    }

    /**
     * @param float|null $inventory_quantity
     */
    public function setInventoryQuantity(?float $inventory_quantity): void
    {
        $this->inventory_quantity = $inventory_quantity;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.quant';
    }
}
