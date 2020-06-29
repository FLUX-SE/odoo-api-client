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
final class Line extends Base
{
    /**
     * Description
     *
     * @var string
     */
    private $name;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Quantity
     *
     * @var null|float
     */
    private $unit_amount;

    /**
     * Unit of Measure
     *
     * @var null|Uom
     */
    private $product_uom_id;

    /**
     * Category
     * Conversion between Units of Measure can only occur if they belong to the same category. The conversion will be
     * made based on the ratios.
     *
     * @var null|Category
     */
    private $product_uom_category_id;

    /**
     * Analytic Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * User
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Tags
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Group
     *
     * @var null|Group
     */
    private $group_id;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Financial Account
     *
     * @var null|AccountAlias
     */
    private $general_account_id;

    /**
     * Journal Item
     *
     * @var null|LineAlias
     */
    private $move_id;

    /**
     * Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Ref.
     *
     * @var null|string
     */
    private $ref;

    /**
     * Sales Order Item
     *
     * @var null|LineAliasAlias
     */
    private $so_line;

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
     * @param string $name Description
     * @param DateTimeInterface $date Date
     * @param float $amount Amount
     * @param Account $account_id Analytic Account
     * @param Company $company_id Company
     */
    public function __construct(
        string $name,
        DateTimeInterface $date,
        float $amount,
        Account $account_id,
        Company $company_id
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->amount = $amount;
        $this->account_id = $account_id;
        $this->company_id = $company_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|LineAliasAlias $so_line
     */
    public function setSoLine(?LineAliasAlias $so_line): void
    {
        $this->so_line = $so_line;
    }

    /**
     * @param null|string $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|LineAlias $move_id
     */
    public function setMoveId(?LineAlias $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return null|AccountAlias
     */
    public function getGeneralAccountId(): ?AccountAlias
    {
        return $this->general_account_id;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return null|Group
     */
    public function getGroupId(): ?Group
    {
        return $this->group_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @param Tag $item
     */
    public function removeTagIds(Tag $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Tag $item
     */
    public function addTagIds(Tag $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids, $strict);
    }

    /**
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return null|Category
     */
    public function getProductUomCategoryId(): ?Category
    {
        return $this->product_uom_category_id;
    }

    /**
     * @param null|Uom $product_uom_id
     */
    public function setProductUomId(?Uom $product_uom_id): void
    {
        $this->product_uom_id = $product_uom_id;
    }

    /**
     * @param null|float $unit_amount
     */
    public function setUnitAmount(?float $unit_amount): void
    {
        $this->unit_amount = $unit_amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
