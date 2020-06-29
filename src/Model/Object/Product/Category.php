<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Category as CategoryAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : product.category
 * Name : product.category
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Category extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Complete Name
     *
     * @var null|string
     */
    private $complete_name;

    /**
     * Parent Category
     *
     * @var null|CategoryAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var null|string
     */
    private $parent_path;

    /**
     * Child Categories
     *
     * @var null|CategoryAlias[]
     */
    private $child_id;

    /**
     * # Products
     * The number of products under this category (Does not consider the children categories)
     *
     * @var null|int
     */
    private $product_count;

    /**
     * Income Account
     * This account will be used when validating a customer invoice.
     *
     * @var null|Account
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account
     * The expense is accounted for when a vendor bill is validated, except in anglo-saxon accounting with perpetual
     * inventory valuation in which case the expense (Cost of Goods Sold account) is recognized at the customer
     * invoice validation.
     *
     * @var null|Account
     */
    private $property_account_expense_categ_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
    }

    /**
     * @param null|CategoryAlias $parent_id
     */
    public function setParentId(?CategoryAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param null|string $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param null|CategoryAlias[] $child_id
     */
    public function setChildId(?array $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @param CategoryAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChildId(CategoryAlias $item, bool $strict = true): bool
    {
        if (null === $this->child_id) {
            return false;
        }

        return in_array($item, $this->child_id, $strict);
    }

    /**
     * @param CategoryAlias $item
     */
    public function addChildId(CategoryAlias $item): void
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
     * @param CategoryAlias $item
     */
    public function removeChildId(CategoryAlias $item): void
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
     * @return null|int
     */
    public function getProductCount(): ?int
    {
        return $this->product_count;
    }

    /**
     * @param null|Account $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(?Account $property_account_income_categ_id): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @param null|Account $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(?Account $property_account_expense_categ_id): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
