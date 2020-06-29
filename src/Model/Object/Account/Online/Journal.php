<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal as JournalAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.online.journal
 * Name : account.online.journal
 * Info :
 * This class is used as an interface.
 * It is used to save the state of the current online accout.
 */
final class Journal extends Base
{
    /**
     * Journal Name
     *
     * @var string
     */
    private $name;

    /**
     * Account Online Provider
     *
     * @var null|Provider
     */
    private $account_online_provider_id;

    /**
     * Journal
     *
     * @var null|JournalAlias[]
     */
    private $journal_ids;

    /**
     * Account Number
     *
     * @var null|string
     */
    private $account_number;

    /**
     * Last synchronization
     *
     * @var null|DateTimeInterface
     */
    private $last_sync;

    /**
     * Online Identifier
     * id use to identify account in provider system
     *
     * @var null|string
     */
    private $online_identifier;

    /**
     * Provider
     * name of the banking institution
     *
     * @var null|string
     */
    private $provider_name;

    /**
     * Balance
     * balance of the account sent by the third party provider
     *
     * @var null|float
     */
    private $balance;

    /**
     * Ponto Last Synchronization Identifier
     * id of ponto synchronization
     *
     * @var null|string
     */
    private $ponto_last_synchronization_identifier;

    /**
     * Yodlee Account Status
     * Active/Inactive on Yodlee system
     *
     * @var null|string
     */
    private $yodlee_account_status;

    /**
     * Yodlee Status Code
     *
     * @var null|int
     */
    private $yodlee_status_code;

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
     * @param string $name Journal Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getProviderName(): ?string
    {
        return $this->provider_name;
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
     * @return null|int
     */
    public function getYodleeStatusCode(): ?int
    {
        return $this->yodlee_status_code;
    }

    /**
     * @return null|string
     */
    public function getYodleeAccountStatus(): ?string
    {
        return $this->yodlee_account_status;
    }

    /**
     * @return null|string
     */
    public function getPontoLastSynchronizationIdentifier(): ?string
    {
        return $this->ponto_last_synchronization_identifier;
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
    public function getOnlineIdentifier(): ?string
    {
        return $this->online_identifier;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|DateTimeInterface $last_sync
     */
    public function setLastSync(?DateTimeInterface $last_sync): void
    {
        $this->last_sync = $last_sync;
    }

    /**
     * @param null|string $account_number
     */
    public function setAccountNumber(?string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @param JournalAlias $item
     */
    public function removeJournalIds(JournalAlias $item): void
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
     * @param JournalAlias $item
     */
    public function addJournalIds(JournalAlias $item): void
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
     * @param JournalAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasJournalIds(JournalAlias $item, bool $strict = true): bool
    {
        if (null === $this->journal_ids) {
            return false;
        }

        return in_array($item, $this->journal_ids, $strict);
    }

    /**
     * @param null|JournalAlias[] $journal_ids
     */
    public function setJournalIds(?array $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @return null|Provider
     */
    public function getAccountOnlineProviderId(): ?Provider
    {
        return $this->account_online_provider_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
