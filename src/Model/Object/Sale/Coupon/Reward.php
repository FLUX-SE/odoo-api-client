<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Coupon;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.coupon.reward
 * ---
 * Name : sale.coupon.reward
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
class Reward extends Base
{
    /**
     * Reward Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $reward_description;

    /**
     * Reward Type
     * ---
     * Discount - Reward will be provided as discount.
     * Free Product - Free product will be provide as reward
     * Free Shipping - Free shipping will be provided as reward (Need delivery module)
     * ---
     * Selection :
     *     -> discount (Discount)
     *     -> product (Free Product)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $reward_type;

    /**
     * Free Product
     * ---
     * Reward Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $reward_product_id;

    /**
     * Quantity
     * ---
     * Reward product quantity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $reward_product_quantity;

    /**
     * Discount Type
     * ---
     * Percentage - Entered percentage discount will be provided
     * Amount - Entered fixed amount discount will be provided
     * ---
     * Selection :
     *     -> percentage (Percentage)
     *     -> fixed_amount (Fixed Amount)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $discount_type;

    /**
     * Discount
     * ---
     * The discount in percentage, between 1 to 100
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $discount_percentage;

    /**
     * Discount Apply On
     * ---
     * On Order - Discount on whole order
     * Cheapest product - Discount on cheapest product of the order
     * Specific products - Discount on selected specific products
     * ---
     * Selection :
     *     -> on_order (On Order)
     *     -> cheapest_product (On Cheapest Product)
     *     -> specific_products (On Specific Products)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $discount_apply_on;

    /**
     * Products
     * ---
     * Products that will be discounted if the discount is applied on specific products
     * ---
     * Relation : many2many (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $discount_specific_product_ids;

    /**
     * Discount Max Amount
     * ---
     * Maximum amount of discount that can be provided
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $discount_max_amount;

    /**
     * Fixed Amount
     * ---
     * The discount in fixed amount
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $discount_fixed_amount;

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
    protected $reward_product_uom_id;

    /**
     * Reward Line Product
     * ---
     * Product used in the sales order to apply the discount. Each coupon program has its own reward product for
     * reporting purpose
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $discount_line_product_id;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @return string|null
     *
     * @SerializedName("reward_description")
     */
    public function getRewardDescription(): ?string
    {
        return $this->reward_description;
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
     * @return float|null
     *
     * @SerializedName("discount_fixed_amount")
     */
    public function getDiscountFixedAmount(): ?float
    {
        return $this->discount_fixed_amount;
    }

    /**
     * @param float|null $discount_fixed_amount
     */
    public function setDiscountFixedAmount(?float $discount_fixed_amount): void
    {
        $this->discount_fixed_amount = $discount_fixed_amount;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("reward_product_uom_id")
     */
    public function getRewardProductUomId(): ?OdooRelation
    {
        return $this->reward_product_uom_id;
    }

    /**
     * @param OdooRelation|null $reward_product_uom_id
     */
    public function setRewardProductUomId(?OdooRelation $reward_product_uom_id): void
    {
        $this->reward_product_uom_id = $reward_product_uom_id;
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
     * @param OdooRelation|null $discount_line_product_id
     */
    public function setDiscountLineProductId(?OdooRelation $discount_line_product_id): void
    {
        $this->discount_line_product_id = $discount_line_product_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return float|null
     *
     * @SerializedName("discount_max_amount")
     */
    public function getDiscountMaxAmount(): ?float
    {
        return $this->discount_max_amount;
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
     * @param float|null $discount_max_amount
     */
    public function setDiscountMaxAmount(?float $discount_max_amount): void
    {
        $this->discount_max_amount = $discount_max_amount;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDiscountSpecificProductIds(OdooRelation $item): void
    {
        if (null === $this->discount_specific_product_ids) {
            $this->discount_specific_product_ids = [];
        }

        if ($this->hasDiscountSpecificProductIds($item)) {
            $index = array_search($item, $this->discount_specific_product_ids);
            unset($this->discount_specific_product_ids[$index]);
        }
    }

    /**
     * @param string|null $reward_description
     */
    public function setRewardDescription(?string $reward_description): void
    {
        $this->reward_description = $reward_description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("discount_type")
     */
    public function getDiscountType(): ?string
    {
        return $this->discount_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reward_type")
     */
    public function getRewardType(): ?string
    {
        return $this->reward_type;
    }

    /**
     * @param string|null $reward_type
     */
    public function setRewardType(?string $reward_type): void
    {
        $this->reward_type = $reward_type;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("reward_product_id")
     */
    public function getRewardProductId(): ?OdooRelation
    {
        return $this->reward_product_id;
    }

    /**
     * @param OdooRelation|null $reward_product_id
     */
    public function setRewardProductId(?OdooRelation $reward_product_id): void
    {
        $this->reward_product_id = $reward_product_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("reward_product_quantity")
     */
    public function getRewardProductQuantity(): ?int
    {
        return $this->reward_product_quantity;
    }

    /**
     * @param int|null $reward_product_quantity
     */
    public function setRewardProductQuantity(?int $reward_product_quantity): void
    {
        $this->reward_product_quantity = $reward_product_quantity;
    }

    /**
     * @param string|null $discount_type
     */
    public function setDiscountType(?string $discount_type): void
    {
        $this->discount_type = $discount_type;
    }

    /**
     * @param OdooRelation $item
     */
    public function addDiscountSpecificProductIds(OdooRelation $item): void
    {
        if ($this->hasDiscountSpecificProductIds($item)) {
            return;
        }

        if (null === $this->discount_specific_product_ids) {
            $this->discount_specific_product_ids = [];
        }

        $this->discount_specific_product_ids[] = $item;
    }

    /**
     * @return float|null
     *
     * @SerializedName("discount_percentage")
     */
    public function getDiscountPercentage(): ?float
    {
        return $this->discount_percentage;
    }

    /**
     * @param float|null $discount_percentage
     */
    public function setDiscountPercentage(?float $discount_percentage): void
    {
        $this->discount_percentage = $discount_percentage;
    }

    /**
     * @return string|null
     *
     * @SerializedName("discount_apply_on")
     */
    public function getDiscountApplyOn(): ?string
    {
        return $this->discount_apply_on;
    }

    /**
     * @param string|null $discount_apply_on
     */
    public function setDiscountApplyOn(?string $discount_apply_on): void
    {
        $this->discount_apply_on = $discount_apply_on;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("discount_specific_product_ids")
     */
    public function getDiscountSpecificProductIds(): ?array
    {
        return $this->discount_specific_product_ids;
    }

    /**
     * @param OdooRelation[]|null $discount_specific_product_ids
     */
    public function setDiscountSpecificProductIds(?array $discount_specific_product_ids): void
    {
        $this->discount_specific_product_ids = $discount_specific_product_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDiscountSpecificProductIds(OdooRelation $item): bool
    {
        if (null === $this->discount_specific_product_ids) {
            return false;
        }

        return in_array($item, $this->discount_specific_product_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.coupon.reward';
    }
}
