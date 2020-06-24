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
 *
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
     * @var Journal
     */
    private $journal_id;

    /**
     * Online Account
     *
     * @var JournalAlias
     */
    private $online_account_id;

    /**
     * Action
     *
     * @var array
     */
    private $action;

    /**
     * Account name
     *
     * @var string
     */
    private $name;

    /**
     * Balance
     *
     * @var float
     */
    private $balance;

    /**
     * Account Online Wizard
     *
     * @var WizardAlias
     */
    private $account_online_wizard_id;

    /**
     * Account Number
     *
     * @var string
     */
    private $account_number;

    /**
     * Synchronization frequency
     *
     * @var array
     */
    private $journal_statements_creation;

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
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param array $journal_statements_creation
     */
    public function setJournalStatementsCreation(array $journal_statements_creation): void
    {
        $this->journal_statements_creation = $journal_statements_creation;
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
     * @param array $journal_statements_creation
     */
    public function removeJournalStatementsCreation(array $journal_statements_creation): void
    {
        if ($this->hasJournalStatementsCreation($journal_statements_creation)) {
            $index = array_search($journal_statements_creation, $this->journal_statements_creation);
            unset($this->journal_statements_creation[$index]);
        }
    }

    /**
     * @param array $journal_statements_creation
     */
    public function addJournalStatementsCreation(array $journal_statements_creation): void
    {
        if ($this->hasJournalStatementsCreation($journal_statements_creation)) {
            return;
        }

        $this->journal_statements_creation[] = $journal_statements_creation;
    }

    /**
     * @param array $journal_statements_creation
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalStatementsCreation(
        array $journal_statements_creation,
        bool $strict = true
    ): bool
    {
        return in_array($journal_statements_creation, $this->journal_statements_creation, $strict);
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * @param JournalAlias $online_account_id
     */
    public function setOnlineAccountId(JournalAlias $online_account_id): void
    {
        $this->online_account_id = $online_account_id;
    }

    /**
     * @param WizardAlias $account_online_wizard_id
     */
    public function setAccountOnlineWizardId(WizardAlias $account_online_wizard_id): void
    {
        $this->account_online_wizard_id = $account_online_wizard_id;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param array $action
     */
    public function removeAction(array $action): void
    {
        if ($this->hasAction($action)) {
            $index = array_search($action, $this->action);
            unset($this->action[$index]);
        }
    }

    /**
     * @param array $action
     */
    public function addAction(array $action): void
    {
        if ($this->hasAction($action)) {
            return;
        }

        $this->action[] = $action;
    }

    /**
     * @param array $action
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAction(array $action, bool $strict = true): bool
    {
        return in_array($action, $this->action, $strict);
    }

    /**
     * @param array $action
     */
    public function setAction(array $action): void
    {
        $this->action = $action;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
