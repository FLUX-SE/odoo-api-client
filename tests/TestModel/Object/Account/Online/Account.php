<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.online.account
 * ---
 * Name : account.online.account
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
     * Account Name
     * ---
     * Account Name as provided by third party provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Online Identifier
     * ---
     * Id used to identify account by third party provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_identifier;

    /**
     * Balance
     * ---
     * Balance of the account sent by the third party provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance;

    /**
     * Account Number
     * ---
     * Set if third party provider has the full account number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_number;

    /**
     * Account Data
     * ---
     * Extra information needed by third party provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_data;

    /**
     * Account Online Link
     * ---
     * Relation : many2one (account.online.link)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Online\Link
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_online_link_id;

    /**
     * Journal
     * ---
     * Relation : one2many (account.journal -> account_online_account_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $journal_ids;

    /**
     * Last synchronization
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $last_sync;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeJournalIds(OdooRelation $item): void
    {
        if (null === $this->journal_ids) {
            $this->journal_ids = [];
        }

        if ($this->hasJournalIds($item)) {
            $index = array_search($item, $this->journal_ids);
            unset($this->journal_ids[$index]);
        }
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param DateTimeInterface|null $last_sync
     */
    public function setLastSync(?DateTimeInterface $last_sync): void
    {
        $this->last_sync = $last_sync;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_sync")
     */
    public function getLastSync(): ?DateTimeInterface
    {
        return $this->last_sync;
    }

    /**
     * @param OdooRelation $item
     */
    public function addJournalIds(OdooRelation $item): void
    {
        if ($this->hasJournalIds($item)) {
            return;
        }

        if (null === $this->journal_ids) {
            $this->journal_ids = [];
        }

        $this->journal_ids[] = $item;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasJournalIds(OdooRelation $item): bool
    {
        if (null === $this->journal_ids) {
            return false;
        }

        return in_array($item, $this->journal_ids);
    }

    /**
     * @param OdooRelation[]|null $journal_ids
     */
    public function setJournalIds(?array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("journal_ids")
     */
    public function getJournalIds(): ?array
    {
        return $this->journal_ids;
    }

    /**
     * @param OdooRelation|null $account_online_link_id
     */
    public function setAccountOnlineLinkId(?OdooRelation $account_online_link_id): void
    {
        $this->account_online_link_id = $account_online_link_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("account_online_link_id")
     */
    public function getAccountOnlineLinkId(): ?OdooRelation
    {
        return $this->account_online_link_id;
    }

    /**
     * @param string|null $account_data
     */
    public function setAccountData(?string $account_data): void
    {
        $this->account_data = $account_data;
    }

    /**
     * @return string|null
     *
     * @SerializedName("account_data")
     */
    public function getAccountData(): ?string
    {
        return $this->account_data;
    }

    /**
     * @param string|null $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
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
     * @param string|null $online_identifier
     */
    public function setOnlineIdentifier(?string $online_identifier): void
    {
        $this->online_identifier = $online_identifier;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_identifier")
     */
    public function getOnlineIdentifier(): ?string
    {
        return $this->online_identifier;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.online.account';
    }
}
