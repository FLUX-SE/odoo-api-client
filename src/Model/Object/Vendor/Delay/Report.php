<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Vendor\Delay;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : vendor.delay.report
 * ---
 * Name : vendor.delay.report
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
final class Report extends Base
{
    /**
     * Vendor
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
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Product Category
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $category_id;

    /**
     * Effective Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Total Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_total;

    /**
     * On-Time Quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $qty_on_time;

    /**
     * On-Time Delivery Rate
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $on_time_rate;

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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @param OdooRelation|null $category_id
     */
    public function setCategoryId(?OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
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
     * @return float|null
     *
     * @SerializedName("qty_total")
     */
    public function getQtyTotal(): ?float
    {
        return $this->qty_total;
    }

    /**
     * @param float|null $qty_total
     */
    public function setQtyTotal(?float $qty_total): void
    {
        $this->qty_total = $qty_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("qty_on_time")
     */
    public function getQtyOnTime(): ?float
    {
        return $this->qty_on_time;
    }

    /**
     * @param float|null $qty_on_time
     */
    public function setQtyOnTime(?float $qty_on_time): void
    {
        $this->qty_on_time = $qty_on_time;
    }

    /**
     * @return float|null
     *
     * @SerializedName("on_time_rate")
     */
    public function getOnTimeRate(): ?float
    {
        return $this->on_time_rate;
    }

    /**
     * @param float|null $on_time_rate
     */
    public function setOnTimeRate(?float $on_time_rate): void
    {
        $this->on_time_rate = $on_time_rate;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'vendor.delay.report';
    }
}
