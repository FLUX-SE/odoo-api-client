<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.order.cancel
 * ---
 * Name : sale.order.cancel
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Cancel extends Base
{
    /**
     * Sale Order
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $order_id;

    /**
     * Invoice Alert
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_invoice_alert;

    /**
     * Delivery Alert
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_delivery_alert;

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
     * @param OdooRelation $order_id Sale Order
     *        ---
     *        Relation : many2one (sale.order)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Order
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("order_id")
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
     * @return bool|null
     *
     * @SerializedName("display_invoice_alert")
     */
    public function isDisplayInvoiceAlert(): ?bool
    {
        return $this->display_invoice_alert;
    }

    /**
     * @param bool|null $display_invoice_alert
     */
    public function setDisplayInvoiceAlert(?bool $display_invoice_alert): void
    {
        $this->display_invoice_alert = $display_invoice_alert;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_delivery_alert")
     */
    public function isDisplayDeliveryAlert(): ?bool
    {
        return $this->display_delivery_alert;
    }

    /**
     * @param bool|null $display_delivery_alert
     */
    public function setDisplayDeliveryAlert(?bool $display_delivery_alert): void
    {
        $this->display_delivery_alert = $display_delivery_alert;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order.cancel';
    }
}
