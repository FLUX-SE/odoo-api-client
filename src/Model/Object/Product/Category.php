<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.category
 * ---
 * Name : product.category
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
final class Category extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Complete Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Parent Category
     * ---
     * Relation : many2one (product.category)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Parent Path
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_path;

    /**
     * Child Categories
     * ---
     * Relation : one2many (product.category -> parent_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_id;

    /**
     * # Products
     * ---
     * The number of products under this category (Does not consider the children categories)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $product_count;

    /**
     * Income Account
     * ---
     * This account will be used when validating a customer invoice.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account
     * ---
     * The expense is accounted for when a vendor bill is validated, except in anglo-saxon accounting with perpetual
     * inventory valuation in which case the expense (Cost of Goods Sold account) is recognized at the customer
     * invoice validation.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_account_expense_categ_id;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int|null $product_count
     */
    public function setProductCount(?int $product_count): void
    {
        $this->product_count = $product_count;
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
     * @param OdooRelation|null $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(?OdooRelation $property_account_expense_categ_id): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_account_expense_categ_id")
     */
    public function getPropertyAccountExpenseCategId(): ?OdooRelation
    {
        return $this->property_account_expense_categ_id;
    }

    /**
     * @param OdooRelation|null $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(?OdooRelation $property_account_income_categ_id): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_account_income_categ_id")
     */
    public function getPropertyAccountIncomeCategId(): ?OdooRelation
    {
        return $this->property_account_income_categ_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("product_count")
     */
    public function getProductCount(): ?int
    {
        return $this->product_count;
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
     * @param OdooRelation $item
     */
    public function removeChildId(OdooRelation $item): void
    {
        if (null === $this->child_id) {
            $this->child_id = [];
        }

        if ($this->hasChildId($item)) {
            $index = array_search($item, $this->child_id);
            unset($this->child_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildId(OdooRelation $item): void
    {
        if ($this->hasChildId($item)) {
            return;
        }

        if (null === $this->child_id) {
            $this->child_id = [];
        }

        $this->child_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildId(OdooRelation $item): bool
    {
        if (null === $this->child_id) {
            return false;
        }

        return in_array($item, $this->child_id);
    }

    /**
     * @param OdooRelation[]|null $child_id
     */
    public function setChildId(?array $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_id")
     */
    public function getChildId(): ?array
    {
        return $this->child_id;
    }

    /**
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @return string|null
     *
     * @SerializedName("parent_path")
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("complete_name")
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
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
        return 'product.category';
    }
}
