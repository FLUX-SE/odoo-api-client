<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Link\Journal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.link.journal.line
 * ---
 * Name : account.link.journal.line
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Line extends Base
{
    /**
     * Action
     * ---
     * Selection :
     *     -> create (Create new journal)
     *     -> link (Link to existing journal)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $action;

    /**
     * Journal
     * ---
     * Relation : many2one (account.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Online Account
     * ---
     * Relation : many2one (account.online.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Online\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $online_account_id;

    /**
     * Account name
     * ---
     * Account Name as provided by third party provider
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Balance
     * ---
     * Balance of the account sent by the third party provider
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    private $balance;

    /**
     * Account Online Wizard
     * ---
     * Relation : many2one (account.link.journal)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Link\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_online_wizard_id;

    /**
     * Account Number
     * ---
     * Set if third party provider has the full account number
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $account_number;

    /**
     * Synchronization frequency
     * ---
     * Selection :
     *     -> none (Create one statement per synchronization)
     *     -> day (Create daily statements)
     *     -> week (Create weekly statements)
     *     -> bimonthly (Create bi-monthly statements)
     *     -> month (Create monthly statements)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $journal_statements_creation;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $journal_statements_creation Synchronization frequency
     *        ---
     *        Selection :
     *            -> none (Create one statement per synchronization)
     *            -> day (Create daily statements)
     *            -> week (Create weekly statements)
     *            -> bimonthly (Create bi-monthly statements)
     *            -> month (Create monthly statements)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $journal_statements_creation)
    {
        $this->journal_statements_creation = $journal_statements_creation;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_number")
     */
    public function getAccountNumber(): ?string
    {
        return $this->account_number;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string $journal_statements_creation
     */
    public function setJournalStatementsCreation(string $journal_statements_creation): void
    {
        $this->journal_statements_creation = $journal_statements_creation;
    }

    /**
     * @return string
     *
     * @SerializedName("journal_statements_creation")
     */
    public function getJournalStatementsCreation(): string
    {
        return $this->journal_statements_creation;
    }

    /**
     * @param string|null $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @param OdooRelation|null $account_online_wizard_id
     */
    public function setAccountOnlineWizardId(?OdooRelation $account_online_wizard_id): void
    {
        $this->account_online_wizard_id = $account_online_wizard_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("action")
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_online_wizard_id")
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
     *
     * @SerializedName("balance")
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
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     *
     * @SerializedName("online_account_id")
     */
    public function getOnlineAccountId(): ?OdooRelation
    {
        return $this->online_account_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param string|null $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.link.journal.line';
    }
}
