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
final class Account extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Account Currency
     * Forces all moves for this account to have this account currency.
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Deprecated
     *
     * @var null|bool
     */
    private $deprecated;

    /**
     * Used
     *
     * @var null|bool
     */
    private $used;

    /**
     * Type
     * Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     * close a fiscal year and generate opening entries.
     *
     * @var Type
     */
    private $user_type_id;

    /**
     * Internal Type
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     *
     * @var null|array
     */
    private $internal_type;

    /**
     * Internal Group
     * The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     *
     * @var null|array
     */
    private $internal_group;

    /**
     * Allow Reconciliation
     * Check this box if this account allows invoices & payments matching of journal items.
     *
     * @var null|bool
     */
    private $reconcile;

    /**
     * Default Taxes
     *
     * @var null|Tax[]
     */
    private $tax_ids;

    /**
     * Internal Notes
     *
     * @var null|string
     */
    private $note;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Tags
     * Optional tags you may want to assign for custom reporting
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Group
     *
     * @var null|Group
     */
    private $group_id;

    /**
     * Root
     *
     * @var null|Root
     */
    private $root_id;

    /**
     * Opening debit
     * Opening debit value for this account.
     *
     * @var null|float
     */
    private $opening_debit;

    /**
     * Opening credit
     * Opening credit value for this account.
     *
     * @var null|float
     */
    private $opening_credit;

    /**
     * Asset Model
     * If this is selected, an asset will be created automatically when Journal Items on this account are posted.
     *
     * @var null|Asset
     */
    private $asset_model;

    /**
     * Create Asset
     *
     * @var array
     */
    private $create_asset;

    /**
     * Can Create Asset
     * Technical field specifying if the account can generate asset depending on it's type. It is used in the account
     * form view.
     *
     * @var null|bool
     */
    private $can_create_asset;

    /**
     * Form View Ref
     *
     * @var null|string
     */
    private $form_view_ref;

    /**
     * Asset Type
     *
     * @var null|array
     */
    private $asset_type;

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
     * @param string $code Code
     * @param Type $user_type_id Type
     *        Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     *        close a fiscal year and generate opening entries.
     * @param Company $company_id Company
     * @param array $create_asset Create Asset
     */
    public function __construct(
        string $name,
        string $code,
        Type $user_type_id,
        Company $company_id,
        array $create_asset
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->user_type_id = $user_type_id;
        $this->company_id = $company_id;
        $this->create_asset = $create_asset;
    }

    /**
     * @param mixed $item
     */
    public function addCreateAsset($item): void
    {
        if ($this->hasCreateAsset($item)) {
            return;
        }

        $this->create_asset[] = $item;
    }

    /**
     * @return null|Root
     */
    public function getRootId(): ?Root
    {
        return $this->root_id;
    }

    /**
     * @param null|float $opening_debit
     */
    public function setOpeningDebit(?float $opening_debit): void
    {
        $this->opening_debit = $opening_debit;
    }

    /**
     * @param null|float $opening_credit
     */
    public function setOpeningCredit(?float $opening_credit): void
    {
        $this->opening_credit = $opening_credit;
    }

    /**
     * @param null|Asset $asset_model
     */
    public function setAssetModel(?Asset $asset_model): void
    {
        $this->asset_model = $asset_model;
    }

    /**
     * @param array $create_asset
     */
    public function setCreateAsset(array $create_asset): void
    {
        $this->create_asset = $create_asset;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCreateAsset($item, bool $strict = true): bool
    {
        return in_array($item, $this->create_asset, $strict);
    }

    /**
     * @param mixed $item
     */
    public function removeCreateAsset($item): void
    {
        if ($this->hasCreateAsset($item)) {
            $index = array_search($item, $this->create_asset);
            unset($this->create_asset[$index]);
        }
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
     * @return null|bool
     */
    public function isCanCreateAsset(): ?bool
    {
        return $this->can_create_asset;
    }

    /**
     * @return null|string
     */
    public function getFormViewRef(): ?string
    {
        return $this->form_view_ref;
    }

    /**
     * @return null|array
     */
    public function getAssetType(): ?array
    {
        return $this->asset_type;
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
     * @param null|Group $group_id
     */
    public function setGroupId(?Group $group_id): void
    {
        $this->group_id = $group_id;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|array
     */
    public function getInternalGroup(): ?array
    {
        return $this->internal_group;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|bool $deprecated
     */
    public function setDeprecated(?bool $deprecated): void
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @param null|bool $used
     */
    public function setUsed(?bool $used): void
    {
        $this->used = $used;
    }

    /**
     * @param Type $user_type_id
     */
    public function setUserTypeId(Type $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @return null|array
     */
    public function getInternalType(): ?array
    {
        return $this->internal_type;
    }

    /**
     * @param null|bool $reconcile
     */
    public function setReconcile(?bool $reconcile): void
    {
        $this->reconcile = $reconcile;
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
     * @param null|Tax[] $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param Tax $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxIds(Tax $item, bool $strict = true): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids, $strict);
    }

    /**
     * @param Tax $item
     */
    public function addTaxIds(Tax $item): void
    {
        if ($this->hasTaxIds($item)) {
            return;
        }

        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        $this->tax_ids[] = $item;
    }

    /**
     * @param Tax $item
     */
    public function removeTaxIds(Tax $item): void
    {
        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        if ($this->hasTaxIds($item)) {
            $index = array_search($item, $this->tax_ids);
            unset($this->tax_ids[$index]);
        }
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
