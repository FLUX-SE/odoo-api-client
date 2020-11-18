<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.coupon
 * ---
 * Name : sale.coupon
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
final class Coupon extends Base
{
    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Expiration Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $expiration_date;

    /**
     * State
     * ---
     * Selection :
     *     -> reserved (Reserved)
     *     -> new (Valid)
     *     -> used (Consumed)
     *     -> expired (Expired)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * For Customer
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Program
     * ---
     * Relation : many2one (sale.coupon.program)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Program
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $program_id;

    /**
     * Order Reference
     * ---
     * The sales order from which coupon is generated
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $order_id;

    /**
     * Applied on order
     * ---
     * The sales order on which the coupon is applied
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sales_order_id;

    /**
     * Reward Line Product
     * ---
     * Product used in the sales order to apply the discount.
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $discount_line_product_id;

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
     * @param string $code Code
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state State
     *        ---
     *        Selection :
     *            -> reserved (Reserved)
     *            -> new (Valid)
     *            -> used (Consumed)
     *            -> expired (Expired)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $program_id Program
     *        ---
     *        Relation : many2one (sale.coupon.program)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Program
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $code, string $state, OdooRelation $program_id)
    {
        $this->code = $code;
        $this->state = $state;
        $this->program_id = $program_id;
    }

    /**
     * @param OdooRelation|null $sales_order_id
     */
    public function setSalesOrderId(?OdooRelation $sales_order_id): void
    {
        $this->sales_order_id = $sales_order_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param OdooRelation|null $discount_line_product_id
     */
    public function setDiscountLineProductId(?OdooRelation $discount_line_product_id): void
    {
        $this->discount_line_product_id = $discount_line_product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("discount_line_product_id")
     */
    public function getDiscountLineProductId(): ?OdooRelation
    {
        return $this->discount_line_product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sales_order_id")
     */
    public function getSalesOrderId(): ?OdooRelation
    {
        return $this->sales_order_id;
    }

    /**
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param OdooRelation|null $order_id
     */
    public function setOrderId(?OdooRelation $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("order_id")
     */
    public function getOrderId(): ?OdooRelation
    {
        return $this->order_id;
    }

    /**
     * @param OdooRelation $program_id
     */
    public function setProgramId(OdooRelation $program_id): void
    {
        $this->program_id = $program_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("program_id")
     */
    public function getProgramId(): OdooRelation
    {
        return $this->program_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param DateTimeInterface|null $expiration_date
     */
    public function setExpirationDate(?DateTimeInterface $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("expiration_date")
     */
    public function getExpirationDate(): ?DateTimeInterface
    {
        return $this->expiration_date;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.coupon';
    }
}
