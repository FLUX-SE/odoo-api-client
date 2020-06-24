<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account as AccountAlias;
use Flux\OdooApiClient\Model\Object\Account\Move\Line as LineAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Line as LineAliasAlias;
use Flux\OdooApiClient\Model\Object\Uom\Category;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : account.analytic.line
 * Name : account.analytic.line
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
final class Line extends Base
{
    /**
     * Description
     *
     * @var null|string
     */
    private $name;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Amount
     *
     * @var null|float
     */
    private $amount;

    /**
     * Quantity
     *
     * @var float
     */
    private $unit_amount;

    /**
     * Unit of Measure
     *
     * @var Uom
     */
    private $product_uom_id;

    /**
     * Category
     *
     * @var Category
     */
    private $product_uom_category_id;

    /**
     * Analytic Account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * Tags
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Group
     *
     * @var Group
     */
    private $group_id;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Financial Account
     *
     * @var AccountAlias
     */
    private $general_account_id;

    /**
     * Journal Item
     *
     * @var LineAlias
     */
    private $move_id;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Ref.
     *
     * @var string
     */
    private $ref;

    /**
     * Sales Order Item
     *
     * @var LineAliasAlias
     */
    private $so_line;

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
     * @return Group
     */
    public function getGroupId(): Group
    {
        return $this->group_id;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param LineAliasAlias $so_line
     */
    public function setSoLine(LineAliasAlias $so_line): void
    {
        $this->so_line = $so_line;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param LineAlias $move_id
     */
    public function setMoveId(LineAlias $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return AccountAlias
     */
    public function getGeneralAccountId(): AccountAlias
    {
        return $this->general_account_id;
    }

    /**
     * @param Product $product_id
     */
    public function setProductId(Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return Category
     */
    public function getProductUomCategoryId(): Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param Uom $product_uom_id
     */
    public function setProductUomId(Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param float $unit_amount
     */
    public function setUnitAmount(float $unit_amount): void
    {
        $this->unit_amount = $unit_amount;
    }

    /**
     * @param null|float $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
