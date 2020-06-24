<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account\Tag;
use Flux\OdooApiClient\Model\Object\Account\Account\Type;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.account
 * Name : account.account
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
final class Account extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Account Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Deprecated
     *
     * @var bool
     */
    private $deprecated;

    /**
     * Used
     *
     * @var bool
     */
    private $used;

    /**
     * Type
     *
     * @var null|Type
     */
    private $user_type_id;

    /**
     * Internal Type
     *
     * @var array
     */
    private $internal_type;

    /**
     * Internal Group
     *
     * @var array
     */
    private $internal_group;

    /**
     * Allow Reconciliation
     *
     * @var bool
     */
    private $reconcile;

    /**
     * Default Taxes
     *
     * @var Tax
     */
    private $tax_ids;

    /**
     * Internal Notes
     *
     * @var string
     */
    private $note;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Tags
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Group
     *
     * @var Group
     */
    private $group_id;

    /**
     * Root
     *
     * @var Root
     */
    private $root_id;

    /**
     * Opening debit
     *
     * @var float
     */
    private $opening_debit;

    /**
     * Opening credit
     *
     * @var float
     */
    private $opening_credit;

    /**
     * Asset Model
     *
     * @var Asset
     */
    private $asset_model;

    /**
     * Create Asset
     *
     * @var null|array
     */
    private $create_asset;

    /**
     * Can Create Asset
     *
     * @var bool
     */
    private $can_create_asset;

    /**
     * Form View Ref
     *
     * @var string
     */
    private $form_view_ref;

    /**
     * Asset Type
     *
     * @var array
     */
    private $asset_type;

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
     * @param float $opening_debit
     */
    public function setOpeningDebit(float $opening_debit): void
    {
        $this->opening_debit = $opening_debit;
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
     * @return array
     */
    public function getAssetType(): array
    {
        return $this->asset_type;
    }

    /**
     * @return string
     */
    public function getFormViewRef(): string
    {
        return $this->form_view_ref;
    }

    /**
     * @return bool
     */
    public function isCanCreateAsset(): bool
    {
        return $this->can_create_asset;
    }

    /**
     * @param ?array $create_asset
     */
    public function removeCreateAsset(?array $create_asset): void
    {
        if ($this->hasCreateAsset($create_asset)) {
            $index = array_search($create_asset, $this->create_asset);
            unset($this->create_asset[$index]);
        }
    }

    /**
     * @param ?array $create_asset
     */
    public function addCreateAsset(?array $create_asset): void
    {
        if ($this->hasCreateAsset($create_asset)) {
            return;
        }

        if (null === $this->create_asset) {
            $this->create_asset = [];
        }

        $this->create_asset[] = $create_asset;
    }

    /**
     * @param ?array $create_asset
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCreateAsset(?array $create_asset, bool $strict = true): bool
    {
        if (null === $this->create_asset) {
            return false;
        }

        return in_array($create_asset, $this->create_asset, $strict);
    }

    /**
     * @param null|array $create_asset
     */
    public function setCreateAsset(?array $create_asset): void
    {
        $this->create_asset = $create_asset;
    }

    /**
     * @param Asset $asset_model
     */
    public function setAssetModel(Asset $asset_model): void
    {
        $this->asset_model = $asset_model;
    }

    /**
     * @param float $opening_credit
     */
    public function setOpeningCredit(float $opening_credit): void
    {
        $this->opening_credit = $opening_credit;
    }

    /**
     * @return Root
     */
    public function getRootId(): Root
    {
        return $this->root_id;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param Group $group_id
     */
    public function setGroupId(Group $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Tax $tax_ids
     */
    public function setTaxIds(Tax $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param bool $reconcile
     */
    public function setReconcile(bool $reconcile): void
    {
        $this->reconcile = $reconcile;
    }

    /**
     * @return array
     */
    public function getInternalGroup(): array
    {
        return $this->internal_group;
    }

    /**
     * @return array
     */
    public function getInternalType(): array
    {
        return $this->internal_type;
    }

    /**
     * @param null|Type $user_type_id
     */
    public function setUserTypeId(Type $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @param bool $used
     */
    public function setUsed(bool $used): void
    {
        $this->used = $used;
    }

    /**
     * @param bool $deprecated
     */
    public function setDeprecated(bool $deprecated): void
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
