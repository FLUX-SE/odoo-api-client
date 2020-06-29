<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online\Link;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Online\Journal as JournalAlias;
use Flux\OdooApiClient\Model\Object\Account\Online\Wizard as WizardAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.online.link.wizard
 * Name : account.online.link.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Online Account
     *
     * @var null|JournalAlias
     */
    private $online_account_id;

    /**
     * Action
     *
     * @var null|array
     */
    private $action;

    /**
     * Account name
     *
     * @var null|string
     */
    private $name;

    /**
     * Balance
     * balance of the account sent by the third party provider
     *
     * @var null|float
     */
    private $balance;

    /**
     * Account Online Wizard
     *
     * @var null|WizardAlias
     */
    private $account_online_wizard_id;

    /**
     * Account Number
     *
     * @var null|string
     */
    private $account_number;

    /**
     * Synchronization frequency
     *
     * @var null|array
     */
    private $journal_statements_creation;

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
     * @param null|Journal $journal_id
     */
    public function setJournalId(?Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param null|array $journal_statements_creation
     */
    public function setJournalStatementsCreation(?array $journal_statements_creation): void
    {
        $this->journal_statements_creation = $journal_statements_creation;
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
     * @param mixed $item
     */
    public function removeJournalStatementsCreation($item): void
    {
        if (null === $this->journal_statements_creation) {
            $this->journal_statements_creation = [];
        }

        if ($this->hasJournalStatementsCreation($item)) {
            $index = array_search($item, $this->journal_statements_creation);
            unset($this->journal_statements_creation[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addJournalStatementsCreation($item): void
    {
        if ($this->hasJournalStatementsCreation($item)) {
            return;
        }

        if (null === $this->journal_statements_creation) {
            $this->journal_statements_creation = [];
        }

        $this->journal_statements_creation[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalStatementsCreation($item, bool $strict = true): bool
    {
        if (null === $this->journal_statements_creation) {
            return false;
        }

        return in_array($item, $this->journal_statements_creation, $strict);
    }

    /**
     * @return null|string
     */
    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    /**
     * @param null|JournalAlias $online_account_id
     */
    public function setOnlineAccountId(?JournalAlias $online_account_id): void
    {
        $this->online_account_id = $online_account_id;
    }

    /**
     * @param null|WizardAlias $account_online_wizard_id
     */
    public function setAccountOnlineWizardId(?WizardAlias $account_online_wizard_id): void
    {
        $this->account_online_wizard_id = $account_online_wizard_id;
    }

    /**
     * @return null|float
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $item
     */
    public function removeAction($item): void
    {
        if (null === $this->action) {
            $this->action = [];
        }

        if ($this->hasAction($item)) {
            $index = array_search($item, $this->action);
            unset($this->action[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAction($item): void
    {
        if ($this->hasAction($item)) {
            return;
        }

        if (null === $this->action) {
            $this->action = [];
        }

        $this->action[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAction($item, bool $strict = true): bool
    {
        if (null === $this->action) {
            return false;
        }

        return in_array($item, $this->action, $strict);
    }

    /**
     * @param null|array $action
     */
    public function setAction(?array $action): void
    {
        $this->action = $action;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
