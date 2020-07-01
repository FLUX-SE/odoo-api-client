<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.account
 * Name : account.account
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
final class Account extends Base
{
    public const ODOO_MODEL_NAME = 'account.account';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Account Currency
     * Forces all moves for this account to have this account currency.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Code
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Deprecated
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $deprecated;

    /**
     * Used
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $used;

    /**
     * Type
     * Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     * close a fiscal year and generate opening entries.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_type_id;

    /**
     * Internal Type
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> other (Regular)
     *     -> receivable (Receivable)
     *     -> payable (Payable)
     *     -> liquidity (Liquidity)
     *
     *
     * @var string|null
     */
    private $internal_type;

    /**
     * Internal Group
     * The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> equity (Equity)
     *     -> asset (Asset)
     *     -> liability (Liability)
     *     -> income (Income)
     *     -> expense (Expense)
     *     -> off_balance (Off Balance)
     *
     *
     * @var string|null
     */
    private $internal_group;

    /**
     * Allow Reconciliation
     * Check this box if this account allows invoices & payments matching of journal items.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $reconcile;

    /**
     * Default Taxes
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Internal Notes
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Tags
     * Optional tags you may want to assign for custom reporting
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Group
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Root
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $root_id;

    /**
     * Opening debit
     * Opening debit value for this account.
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $opening_debit;

    /**
     * Opening credit
     * Opening credit value for this account.
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $opening_credit;

    /**
     * Asset Model
     * If this is selected, an asset will be created automatically when Journal Items on this account are posted.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $asset_model;

    /**
     * Create Asset
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> no (No)
     *     -> draft (Create in draft)
     *     -> validate (Create and validate)
     *
     *
     * @var string
     */
    private $create_asset;

    /**
     * Can Create Asset
     * Technical field specifying if the account can generate asset depending on it's type. It is used in the account
     * form view.
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $can_create_asset;

    /**
     * Form View Ref
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $form_view_ref;

    /**
     * Asset Type
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> sale (Deferred Revenue)
     *     -> expense (Deferred Expense)
     *     -> purchase (Asset)
     *
     *
     * @var string|null
     */
    private $asset_type;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Code
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_type_id Type
     *        Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     *        close a fiscal year and generate opening entries.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     * @param string $create_asset Create Asset
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> no (No)
     *            -> draft (Create in draft)
     *            -> validate (Create and validate)
     *
     */
    public function __construct(
        string $name,
        string $code,
        OdooRelation $user_type_id,
        OdooRelation $company_id,
        string $create_asset
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->user_type_id = $user_type_id;
        $this->company_id = $company_id;
        $this->create_asset = $create_asset;
    }

    /**
     * @param string $create_asset
     */
    public function setCreateAsset(string $create_asset): void
    {
        $this->create_asset = $create_asset;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTagIds(OdooRelation $item): void
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
     * @return OdooRelation|null
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRootId(): ?OdooRelation
    {
        return $this->root_id;
    }

    /**
     * @param OdooRelation|null $root_id
     */
    public function setRootId(?OdooRelation $root_id): void
    {
        $this->root_id = $root_id;
    }

    /**
     * @return float|null
     */
    public function getOpeningDebit(): ?float
    {
        return $this->opening_debit;
    }

    /**
     * @param float|null $opening_debit
     */
    public function setOpeningDebit(?float $opening_debit): void
    {
        $this->opening_debit = $opening_debit;
    }

    /**
     * @return float|null
     */
    public function getOpeningCredit(): ?float
    {
        return $this->opening_credit;
    }

    /**
     * @param float|null $opening_credit
     */
    public function setOpeningCredit(?float $opening_credit): void
    {
        $this->opening_credit = $opening_credit;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAssetModel(): ?OdooRelation
    {
        return $this->asset_model;
    }

    /**
     * @param OdooRelation|null $asset_model
     */
    public function setAssetModel(?OdooRelation $asset_model): void
    {
        $this->asset_model = $asset_model;
    }

    /**
     * @return string
     */
    public function getCreateAsset(): string
    {
        return $this->create_asset;
    }

    /**
     * @return bool|null
     */
    public function isCanCreateAsset(): ?bool
    {
        return $this->can_create_asset;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTagIds(OdooRelation $item): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids);
    }

    /**
     * @param bool|null $can_create_asset
     */
    public function setCanCreateAsset(?bool $can_create_asset): void
    {
        $this->can_create_asset = $can_create_asset;
    }

    /**
     * @return string|null
     */
    public function getFormViewRef(): ?string
    {
        return $this->form_view_ref;
    }

    /**
     * @param string|null $form_view_ref
     */
    public function setFormViewRef(?string $form_view_ref): void
    {
        $this->form_view_ref = $form_view_ref;
    }

    /**
     * @return string|null
     */
    public function getAssetType(): ?string
    {
        return $this->asset_type;
    }

    /**
     * @param string|null $asset_type
     */
    public function setAssetType(?string $asset_type): void
    {
        $this->asset_type = $asset_type;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
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
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTagIds(OdooRelation $item): void
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
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $internal_type
     */
    public function setInternalType(?string $internal_type): void
    {
        $this->internal_type = $internal_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool|null
     */
    public function isDeprecated(): ?bool
    {
        return $this->deprecated;
    }

    /**
     * @param bool|null $deprecated
     */
    public function setDeprecated(?bool $deprecated): void
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @return bool|null
     */
    public function isUsed(): ?bool
    {
        return $this->used;
    }

    /**
     * @param bool|null $used
     */
    public function setUsed(?bool $used): void
    {
        $this->used = $used;
    }

    /**
     * @return OdooRelation
     */
    public function getUserTypeId(): OdooRelation
    {
        return $this->user_type_id;
    }

    /**
     * @param OdooRelation $user_type_id
     */
    public function setUserTypeId(OdooRelation $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @return string|null
     */
    public function getInternalType(): ?string
    {
        return $this->internal_type;
    }

    /**
     * @return string|null
     */
    public function getInternalGroup(): ?string
    {
        return $this->internal_group;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param string|null $internal_group
     */
    public function setInternalGroup(?string $internal_group): void
    {
        $this->internal_group = $internal_group;
    }

    /**
     * @return bool|null
     */
    public function isReconcile(): ?bool
    {
        return $this->reconcile;
    }

    /**
     * @param bool|null $reconcile
     */
    public function setReconcile(?bool $reconcile): void
    {
        $this->reconcile = $reconcile;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIds(OdooRelation $item): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeTaxIds(OdooRelation $item): void
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
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
