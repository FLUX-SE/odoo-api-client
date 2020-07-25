<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.online.journal
 * Name : account.online.journal
 * Info :
 * This class is used as an interface.
 *         It is used to save the state of the current online accout.
 */
final class Journal extends Base
{
    /**
     * Journal Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Account Online Provider
     * ---
     * Relation : many2one (account.online.provider)
     * @see \Flux\OdooApiClient\Model\Object\Account\Online\Provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_online_provider_id;

    /**
     * Journal
     * ---
     * Relation : one2many (account.journal -> account_online_journal_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $journal_ids;

    /**
     * Account Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $account_number;

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
     * Online Identifier
     * ---
     * id use to identify account in provider system
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $online_identifier;

    /**
     * Provider
     * ---
     * name of the banking institution
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $provider_name;

    /**
     * Balance
     * ---
     * balance of the account sent by the third party provider
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $balance;

    /**
     * Ponto Last Synchronization Identifier
     * ---
     * id of ponto synchronization
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $ponto_last_synchronization_identifier;

    /**
     * Yodlee Account Status
     * ---
     * Active/Inactive on Yodlee system
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $yodlee_account_status;

    /**
     * Yodlee Status Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $yodlee_status_code;

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
     * @param string $name Journal Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return string|null
     */
    public function getPontoLastSynchronizationIdentifier(): ?string
    {
        return $this->ponto_last_synchronization_identifier;
    }

    /**
     * @param string|null $ponto_last_synchronization_identifier
     */
    public function setPontoLastSynchronizationIdentifier(
        ?string $ponto_last_synchronization_identifier
    ): void {
        $this->ponto_last_synchronization_identifier = $ponto_last_synchronization_identifier;
    }

    /**
     * @return string|null
     */
    public function getYodleeAccountStatus(): ?string
    {
        return $this->yodlee_account_status;
    }

    /**
     * @param string|null $yodlee_account_status
     */
    public function setYodleeAccountStatus(?string $yodlee_account_status): void
    {
        $this->yodlee_account_status = $yodlee_account_status;
    }

    /**
     * @return int|null
     */
    public function getYodleeStatusCode(): ?int
    {
        return $this->yodlee_status_code;
    }

    /**
     * @param int|null $yodlee_status_code
     */
    public function setYodleeStatusCode(?int $yodlee_status_code): void
    {
        $this->yodlee_status_code = $yodlee_status_code;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return float|null
     */
    public function getBalance(): ?float
    {
        return $this->balance;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param float|null $balance
     */
    public function setBalance(?float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @param string|null $provider_name
     */
    public function setProviderName(?string $provider_name): void
    {
        $this->provider_name = $provider_name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountOnlineProviderId(): ?OdooRelation
    {
        return $this->account_online_provider_id;
    }

    /**
     * @param OdooRelation|null $account_online_provider_id
     */
    public function setAccountOnlineProviderId(?OdooRelation $account_online_provider_id): void
    {
        $this->account_online_provider_id = $account_online_provider_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getJournalIds(): ?array
    {
        return $this->journal_ids;
    }

    /**
     * @param OdooRelation[]|null $journal_ids
     */
    public function setJournalIds(?array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
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
     * @return string|null
     */
    public function getProviderName(): ?string
    {
        return $this->provider_name;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->account_number;
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
    public function getLastSync(): ?DateTimeInterface
    {
        return $this->last_sync;
    }

    /**
     * @param DateTimeInterface|null $last_sync
     */
    public function setLastSync(?DateTimeInterface $last_sync): void
    {
        $this->last_sync = $last_sync;
    }

    /**
     * @return string|null
     */
    public function getOnlineIdentifier(): ?string
    {
        return $this->online_identifier;
    }

    /**
     * @param string|null $online_identifier
     */
    public function setOnlineIdentifier(?string $online_identifier): void
    {
        $this->online_identifier = $online_identifier;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.online.journal';
    }
}
