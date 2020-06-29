<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.account.type
 * Name : account.account.type
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
final class Type extends Base
{
    /**
     * Account Type
     *
     * @var string
     */
    private $name;

    /**
     * Bring Accounts Balance Forward
     * Used in reports to know if we should consider journal items from the beginning of time instead of from the
     * fiscal year only. Account types that should be reset to zero at each new fiscal year (like expenses,
     * revenue..) should not have this option set.
     *
     * @var null|bool
     */
    private $include_initial_balance;

    /**
     * Type
     * The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     * or bank accounts, payable/receivable is for vendor/customer accounts.
     *
     * @var array
     */
    private $type;

    /**
     * Internal Group
     * The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     *
     * @var array
     */
    private $internal_group;

    /**
     * Description
     *
     * @var null|string
     */
    private $note;

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
     * @param string $name Account Type
     * @param array $type Type
     *        The 'Internal Type' is used for features available on different types of accounts: liquidity type is for cash
     *        or bank accounts, payable/receivable is for vendor/customer accounts.
     * @param array $internal_group Internal Group
     *        The 'Internal Group' is used to filter accounts based on the internal group set on the account type.
     */
    public function __construct(string $name, array $type, array $internal_group)
    {
        $this->name = $name;
        $this->type = $type;
        $this->internal_group = $internal_group;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $include_initial_balance
     */
    public function setIncludeInitialBalance(?bool $include_initial_balance): void
    {
        $this->include_initial_balance = $include_initial_balance;
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param array $internal_group
     */
    public function setInternalGroup(array $internal_group): void
    {
        $this->internal_group = $internal_group;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInternalGroup($item, bool $strict = true): bool
    {
        return in_array($item, $this->internal_group, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addInternalGroup($item): void
    {
        if ($this->hasInternalGroup($item)) {
            return;
        }

        $this->internal_group[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeInternalGroup($item): void
    {
        if ($this->hasInternalGroup($item)) {
            $index = array_search($item, $this->internal_group);
            unset($this->internal_group[$index]);
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
