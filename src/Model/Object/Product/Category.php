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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Complete Name
     *
     * @var string
     */
    private $complete_name;

    /**
     * Parent Category
     *
     * @var CategoryAlias
     */
    private $parent_id;

    /**
     * Parent Path
     *
     * @var string
     */
    private $parent_path;

    /**
     * Child Categories
     *
     * @var CategoryAlias
     */
    private $child_id;

    /**
     * # Products
     *
     * @var int
     */
    private $product_count;

    /**
     * Income Account
     *
     * @var Account
     */
    private $property_account_income_categ_id;

    /**
     * Expense Account
     *
     * @var Account
     */
    private $property_account_expense_categ_id;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCompleteName(): string
    {
        return $this->complete_name;
    }

    /**
     * @param CategoryAlias $parent_id
     */
    public function setParentId(CategoryAlias $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param string $parent_path
     */
    public function setParentPath(string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @param CategoryAlias $child_id
     */
    public function setChildId(CategoryAlias $child_id): void
    {
        $this->child_id = $child_id;
    }

    /**
     * @return int
     */
    public function getProductCount(): int
    {
        return $this->product_count;
    }

    /**
     * @param Account $property_account_income_categ_id
     */
    public function setPropertyAccountIncomeCategId(Account $property_account_income_categ_id): void
    {
        $this->property_account_income_categ_id = $property_account_income_categ_id;
    }

    /**
     * @param Account $property_account_expense_categ_id
     */
    public function setPropertyAccountExpenseCategId(Account $property_account_expense_categ_id): void
    {
        $this->property_account_expense_categ_id = $property_account_expense_categ_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
