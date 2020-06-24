<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.account.type
 * Name : account.account.type
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
final class Type extends Base
{
    /**
     * Account Type
     *
     * @var null|string
     */
    private $name;

    /**
     * Bring Accounts Balance Forward
     *
     * @var bool
     */
    private $include_initial_balance;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Internal Group
     *
     * @var null|array
     */
    private $internal_group;

    /**
     * Description
     *
     * @var string
     */
    private $note;

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
     * @param bool $include_initial_balance
     */
    public function setIncludeInitialBalance(bool $include_initial_balance): void
    {
        $this->include_initial_balance = $include_initial_balance;
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param null|array $internal_group
     */
    public function setInternalGroup(?array $internal_group): void
    {
        $this->internal_group = $internal_group;
    }

    /**
     * @param ?array $internal_group
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInternalGroup(?array $internal_group, bool $strict = true): bool
    {
        if (null === $this->internal_group) {
            return false;
        }

        return in_array($internal_group, $this->internal_group, $strict);
    }

    /**
     * @param ?array $internal_group
     */
    public function addInternalGroup(?array $internal_group): void
    {
        if ($this->hasInternalGroup($internal_group)) {
            return;
        }

        if (null === $this->internal_group) {
            $this->internal_group = [];
        }

        $this->internal_group[] = $internal_group;
    }

    /**
     * @param ?array $internal_group
     */
    public function removeInternalGroup(?array $internal_group): void
    {
        if ($this->hasInternalGroup($internal_group)) {
            $index = array_search($internal_group, $this->internal_group);
            unset($this->internal_group[$index]);
        }
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
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
