<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online\Link;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.online.link.wizard
 * Name : account.online.link.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    public const ODOO_MODEL_NAME = 'account.online.link.wizard';

    /**
     * Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Online Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $online_account_id;

    /**
     * Action
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> create (Create new journal)
     *     -> link (Link to existing journal)
     *     -> drop (Do not link)
     *
     *
     * @var string|null
     */
    private $action;

    /**
     * Account name
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Balance
     * balance of the account sent by the third party provider
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $balance;

    /**
     * Account Online Wizard
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_online_wizard_id;

    /**
     * Account Number
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $account_number;

    /**
     * Synchronization frequency
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> none (Create one statement per synchronization)
     *     -> day (Create daily statements)
     *     -> week (Create weekly statements)
     *     -> bimonthly (Create bi-monthly statements)
     *     -> month (Create monthly statements)
     *
     *
     * @var string|null
     */
    private $journal_statements_creation;

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
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param string|null $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $journal_statements_creation
     */
    public function setJournalStatementsCreation(?string $journal_statements_creation): void
    {
        $this->journal_statements_creation = $journal_statements_creation;
    }

    /**
     * @return string|null
     */
    public function getJournalStatementsCreation(): ?string
    {
        return $this->journal_statements_creation;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation|null $account_online_wizard_id
     */
    public function setAccountOnlineWizardId(?OdooRelation $account_online_wizard_id): void
    {
        $this->account_online_wizard_id = $account_online_wizard_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountOnlineWizardId(): ?OdooRelation
    {
        return $this->account_online_wizard_id;
    }

    /**
     * @param float|null $balance
     */
    public function setBalance(?float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return float|null
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param OdooRelation|null $online_account_id
     */
    public function setOnlineAccountId(?OdooRelation $online_account_id): void
    {
        $this->online_account_id = $online_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getOnlineAccountId(): ?OdooRelation
    {
        return $this->online_account_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
