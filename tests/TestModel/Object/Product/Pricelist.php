<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.pricelist
 * ---
 * Name : product.pricelist
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
final class Pricelist extends Base
{
    /**
     * Pricelist Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * ---
     * If unchecked, it will allow you to hide the pricelist without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Pricelist Items
     * ---
     * Relation : one2many (product.pricelist.item -> pricelist_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Pricelist\Item
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $item_ids;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $currency_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Country Groups
     * ---
     * Relation : many2many (res.country.group)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country\Group
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $country_group_ids;

    /**
     * Discount Policy
     * ---
     * Selection :
     *     -> with_discount (Discount included in the price)
     *     -> without_discount (Show public price & discount to the customer)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $discount_policy;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Pricelist Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $currency_id Currency
     *        ---
     *        Relation : many2one (res.currency)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $discount_policy Discount Policy
     *        ---
     *        Selection :
     *            -> with_discount (Discount included in the price)
     *            -> without_discount (Show public price & discount to the customer)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $currency_id, string $discount_policy)
    {
        $this->name = $name;
        $this->currency_id = $currency_id;
        $this->discount_policy = $discount_policy;
    }

    /**
     * @param OdooRelation[]|null $country_group_ids
     */
    public function setCountryGroupIds(?array $country_group_ids): void
    {
        $this->country_group_ids = $country_group_ids;
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
     * @param string $discount_policy
     */
    public function setDiscountPolicy(string $discount_policy): void
    {
        $this->discount_policy = $discount_policy;
    }

    /**
     * @return string
     *
     * @SerializedName("discount_policy")
     */
    public function getDiscountPolicy(): string
    {
        return $this->discount_policy;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCountryGroupIds(OdooRelation $item): void
    {
        if (null === $this->country_group_ids) {
            $this->country_group_ids = [];
        }

        if ($this->hasCountryGroupIds($item)) {
            $index = array_search($item, $this->country_group_ids);
            unset($this->country_group_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCountryGroupIds(OdooRelation $item): void
    {
        if ($this->hasCountryGroupIds($item)) {
            return;
        }

        if (null === $this->country_group_ids) {
            $this->country_group_ids = [];
        }

        $this->country_group_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCountryGroupIds(OdooRelation $item): bool
    {
        if (null === $this->country_group_ids) {
            return false;
        }

        return in_array($item, $this->country_group_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("country_group_ids")
     */
    public function getCountryGroupIds(): ?array
    {
        return $this->country_group_ids;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param OdooRelation $currency_id
     */
    public function setCurrencyId(OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param OdooRelation $item
     */
    public function removeItemIds(OdooRelation $item): void
    {
        if (null === $this->item_ids) {
            $this->item_ids = [];
        }

        if ($this->hasItemIds($item)) {
            $index = array_search($item, $this->item_ids);
            unset($this->item_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addItemIds(OdooRelation $item): void
    {
        if ($this->hasItemIds($item)) {
            return;
        }

        if (null === $this->item_ids) {
            $this->item_ids = [];
        }

        $this->item_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasItemIds(OdooRelation $item): bool
    {
        if (null === $this->item_ids) {
            return false;
        }

        return in_array($item, $this->item_ids);
    }

    /**
     * @param OdooRelation[]|null $item_ids
     */
    public function setItemIds(?array $item_ids): void
    {
        $this->item_ids = $item_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("item_ids")
     */
    public function getItemIds(): ?array
    {
        return $this->item_ids;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.pricelist';
    }
}
