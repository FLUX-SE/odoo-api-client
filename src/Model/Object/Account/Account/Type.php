<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.account.type
 * Name : account.account.type
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
final class Type extends Base
{
    /**
     * Account Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Bring Accounts Balance Forward
     * Used in reports to know if we should consider journal items from the beginning of time instead of from the
     * fiscal year only. Account types that should be reset to zero at each new fiscal year (like expenses,
     * revenue..) should not have this option set.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $include_initial_balance;

    /**
     * Type
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
     * @var string
     */
    private $type;

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
     * @var string
     */
    private $internal_group;

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

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
     * @param string $name Account Type
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     *        or bank accounts, payable/receivable is for vendor/customer accounts.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> other (Regular)
     *            -> receivable (Receivable)
     *            -> payable (Payable)
     *            -> liquidity (Liquidity)
     *
     * @param string $internal_group Internal Group
     *        The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> equity (Equity)
     *            -> asset (Asset)
     *            -> liability (Liability)
     *            -> income (Income)
     *            -> expense (Expense)
     *            -> off_balance (Off Balance)
     *
     */
    public function __construct(string $name, string $type, string $internal_group)
    {
        $this->name = $name;
        $this->type = $type;
        $this->internal_group = $internal_group;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $internal_group
     */
    public function setInternalGroup(string $internal_group): void
    {
        $this->internal_group = $internal_group;
    }

    /**
     * @return string
     */
    public function getInternalGroup(): string
    {
        return $this->internal_group;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param bool|null $include_initial_balance
     */
    public function setIncludeInitialBalance(?bool $include_initial_balance): void
    {
        $this->include_initial_balance = $include_initial_balance;
    }

    /**
     * @return bool|null
     */
    public function isIncludeInitialBalance(): ?bool
    {
        return $this->include_initial_balance;
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
        return 'account.account.type';
    }
}
