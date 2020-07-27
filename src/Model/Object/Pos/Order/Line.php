<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.order.line
 * ---
 * Name : pos.order.line
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
final class Line extends Base
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
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Line No
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Discount Notice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $notice;

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
     * Unit Price
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_unit;

    /**
     * Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty;

    /**
     * Subtotal w/o Tax
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Subtotal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $price_subtotal_incl;

    /**
     * Discount (%)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $discount;

    /**
     * Order Ref
     * ---
     * Relation : many2one (pos.order)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $order_id;

    /**
     * Taxes
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Taxes to Apply
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids_after_fiscal_position;

    /**
     * Lot/serial Number
     * ---
     * Relation : one2many (pos.pack.operation.lot -> pos_order_line_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Pack\Operation\Lot
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $pack_lot_ids;

    /**
     * Product UoM
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
     * @param string $name Line No
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
     * @param float $price_subtotal Subtotal w/o Tax
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $price_subtotal_incl Subtotal
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $order_id Order Ref
     *        ---
     *        Relation : many2one (pos.order)
     *        @see \Flux\OdooApiClient\Model\Object\Pos\Order
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $product_id,
        float $price_subtotal,
        float $price_subtotal_incl,
        OdooRelation $order_id
    ) {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price_subtotal = $price_subtotal;
        $this->price_subtotal_incl = $price_subtotal_incl;
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductUomId(): ?OdooRelation
    {
        return $this->product_uom_id;
    }

    /**
     * @param OdooRelation[]|null $tax_ids_after_fiscal_position
     */
    public function setTaxIdsAfterFiscalPosition(?array $tax_ids_after_fiscal_position): void
    {
        $this->tax_ids_after_fiscal_position = $tax_ids_after_fiscal_position;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIdsAfterFiscalPosition(OdooRelation $item): bool
    {
        if (null === $this->tax_ids_after_fiscal_position) {
            return false;
        }

        return in_array($item, $this->tax_ids_after_fiscal_position);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIdsAfterFiscalPosition(OdooRelation $item): void
    {
        if ($this->hasTaxIdsAfterFiscalPosition($item)) {
            return;
        }

        if (null === $this->tax_ids_after_fiscal_position) {
            $this->tax_ids_after_fiscal_position = [];
        }

        $this->tax_ids_after_fiscal_position[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxIdsAfterFiscalPosition(OdooRelation $item): void
    {
        if (null === $this->tax_ids_after_fiscal_position) {
            $this->tax_ids_after_fiscal_position = [];
        }

        if ($this->hasTaxIdsAfterFiscalPosition($item)) {
            $index = array_search($item, $this->tax_ids_after_fiscal_position);
            unset($this->tax_ids_after_fiscal_position[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPackLotIds(): ?array
    {
        return $this->pack_lot_ids;
    }

    /**
     * @param OdooRelation[]|null $pack_lot_ids
     */
    public function setPackLotIds(?array $pack_lot_ids): void
    {
        $this->pack_lot_ids = $pack_lot_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPackLotIds(OdooRelation $item): bool
    {
        if (null === $this->pack_lot_ids) {
            return false;
        }

        return in_array($item, $this->pack_lot_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPackLotIds(OdooRelation $item): void
    {
        if ($this->hasPackLotIds($item)) {
            return;
        }

        if (null === $this->pack_lot_ids) {
            $this->pack_lot_ids = [];
        }

        $this->pack_lot_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePackLotIds(OdooRelation $item): void
    {
        if (null === $this->pack_lot_ids) {
            $this->pack_lot_ids = [];
        }

        if ($this->hasPackLotIds($item)) {
            $index = array_search($item, $this->pack_lot_ids);
            unset($this->pack_lot_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $product_uom_id
     */
    public function setProductUomId(?OdooRelation $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxIds(OdooRelation $item): void
    {
        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        if ($this->hasTaxIds($item)) {
            $index = array_search($item, $this->tax_ids);
            unset($this->tax_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
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
     * @return OdooRelation|null
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
     * @return OdooRelation[]|null
     */
    public function getTaxIdsAfterFiscalPosition(): ?array
    {
        return $this->tax_ids_after_fiscal_position;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIds(OdooRelation $item): void
    {
        if ($this->hasTaxIds($item)) {
            return;
        }

        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        $this->tax_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return float|null
     */
    public function getQty(): ?float
    {
        return $this->qty;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getNotice(): ?string
    {
        return $this->notice;
    }

    /**
     * @param string|null $notice
     */
    public function setNotice(?string $notice): void
    {
        $this->notice = $notice;
    }

    /**
     * @return OdooRelation
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
     * @return float|null
     */
    public function getPriceUnit(): ?float
    {
        return $this->price_unit;
    }

    /**
     * @param float|null $price_unit
     */
    public function setPriceUnit(?float $price_unit): void
    {
        $this->price_unit = $price_unit;
    }

    /**
     * @param float|null $qty
     */
    public function setQty(?float $qty): void
    {
        $this->qty = $qty;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIds(OdooRelation $item): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids);
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @param float $price_subtotal
     */
    public function setPriceSubtotal(float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
    }

    /**
     * @return float
     */
    public function getPriceSubtotalIncl(): float
    {
        return $this->price_subtotal_incl;
    }

    /**
     * @param float $price_subtotal_incl
     */
    public function setPriceSubtotalIncl(float $price_subtotal_incl): void
    {
        $this->price_subtotal_incl = $price_subtotal_incl;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return OdooRelation
     */
    public function getOrderId(): OdooRelation
    {
        return $this->order_id;
    }

    /**
     * @param OdooRelation $order_id
     */
    public function setOrderId(OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.order.line';
    }
}
