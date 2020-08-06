<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.account
 * ---
 * Name : account.account
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
final class Account extends Base
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
     * Account Currency
     * ---
     * Forces all moves for this account to have this account currency.
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * Deprecated
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $deprecated;

    /**
     * Used
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $used;

    /**
     * Type
     * ---
     * Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     * close a fiscal year and generate opening entries.
     * ---
     * Relation : many2one (account.account.type)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_type_id;

    /**
     * Internal Type
     * ---
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     * ---
     * Selection :
     *     -> other (Regular)
     *     -> receivable (Receivable)
     *     -> payable (Payable)
     *     -> liquidity (Liquidity)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $internal_type;

    /**
     * Internal Group
     * ---
     * The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     * ---
     * Selection :
     *     -> equity (Equity)
     *     -> asset (Asset)
     *     -> liability (Liability)
     *     -> income (Income)
     *     -> expense (Expense)
     *     -> off_balance (Off Balance)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $internal_group;

    /**
     * Allow Reconciliation
     * ---
     * Check this box if this account allows invoices & payments matching of journal items.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $reconcile;

    /**
     * Default Taxes
     * ---
     * Relation : many2many (account.tax)
     * @see \Flux\OdooApiClient\Model\Object\Account\Tax
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Internal Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Tags
     * ---
     * Optional tags you may want to assign for custom reporting
     * ---
     * Relation : many2many (account.account.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account\Tag
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tag_ids;

    /**
     * Group
     * ---
     * Relation : many2one (account.group)
     * @see \Flux\OdooApiClient\Model\Object\Account\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Root
     * ---
     * Relation : many2one (account.root)
     * @see \Flux\OdooApiClient\Model\Object\Account\Root
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $root_id;

    /**
     * Opening debit
     * ---
     * Opening debit value for this account.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $opening_debit;

    /**
     * Opening credit
     * ---
     * Opening credit value for this account.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $opening_credit;

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
     * @param string $code Code
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $user_type_id Type
     *        ---
     *        Account Type is used for information purpose, to generate country-specific legal reports, and set the rules to
     *        close a fiscal year and generate opening entries.
     *        ---
     *        Relation : many2one (account.account.type)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $code,
        OdooRelation $user_type_id,
        OdooRelation $company_id
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->user_type_id = $user_type_id;
        $this->company_id = $company_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("opening_debit")
     */
    public function getOpeningDebit(): ?float
    {
        return $this->opening_debit;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("tag_ids")
     */
    public function getTagIds(): ?array
    {
        return $this->tag_ids;
    }

    /**
     * @param OdooRelation[]|null $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
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
     *
     * @SerializedName("group_id")
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
     *
     * @SerializedName("root_id")
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
     * @param float|null $opening_debit
     */
    public function setOpeningDebit(?float $opening_debit): void
    {
        $this->opening_debit = $opening_debit;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("opening_credit")
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
     *
     * @SerializedName("create_uid")
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
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
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
     * @param OdooRelation $user_type_id
     */
    public function setUserTypeId(OdooRelation $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
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
     *
     * @SerializedName("currency_id")
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
     *
     * @SerializedName("code")
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
     *
     * @SerializedName("deprecated")
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
     *
     * @SerializedName("used")
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
     *
     * @SerializedName("user_type_id")
     */
    public function getUserTypeId(): OdooRelation
    {
        return $this->user_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("internal_type")
     */
    public function getInternalType(): ?string
    {
        return $this->internal_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $internal_type
     */
    public function setInternalType(?string $internal_type): void
    {
        $this->internal_type = $internal_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("internal_group")
     */
    public function getInternalGroup(): ?string
    {
        return $this->internal_group;
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
     *
     * @SerializedName("reconcile")
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
     *
     * @SerializedName("tax_ids")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.account';
    }
}