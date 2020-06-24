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
 *
 * This class is used as an interface.
 * It is used to save the state of the current online accout.
 */
final class Journal extends Base
{
    /**
     * Journal Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Account Online Provider
     *
     * @var Provider
     */
    private $account_online_provider_id;

    /**
     * Journal
     *
     * @var JournalAlias
     */
    private $journal_ids;

    /**
     * Account Number
     *
     * @var string
     */
    private $account_number;

    /**
     * Last synchronization
     *
     * @var DateTimeInterface
     */
    private $last_sync;

    /**
     * Online Identifier
     *
     * @var string
     */
    private $online_identifier;

    /**
     * Provider
     *
     * @var string
     */
    private $provider_name;

    /**
     * Balance
     *
     * @var float
     */
    private $balance;

    /**
     * Ponto Last Synchronization Identifier
     *
     * @var string
     */
    private $ponto_last_synchronization_identifier;

    /**
     * Yodlee Account Status
     *
     * @var string
     */
    private $yodlee_account_status;

    /**
     * Yodlee Status Code
     *
     * @var int
     */
    private $yodlee_status_code;

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
     * @return Provider
     */
    public function getAccountOnlineProviderId(): Provider
    {
        return $this->account_online_provider_id;
    }

    /**
     * @param JournalAlias $journal_ids
     */
    public function setJournalIds(JournalAlias $journal_ids): void
    {
        $this->journal_ids = $journal_ids;
    }

    /**
     * @param string $account_number
     */
    public function setAccountNumber(string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @param DateTimeInterface $last_sync
     */
    public function setLastSync(DateTimeInterface $last_sync): void
    {
        $this->last_sync = $last_sync;
    }

    /**
     * @return string
     */
    public function getOnlineIdentifier(): string
    {
        return $this->online_identifier;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->provider_name;
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
    public function getPontoLastSynchronizationIdentifier(): string
    {
        return $this->ponto_last_synchronization_identifier;
    }

    /**
     * @return string
     */
    public function getYodleeAccountStatus(): string
    {
        return $this->yodlee_account_status;
    }

    /**
     * @return int
     */
    public function getYodleeStatusCode(): int
    {
        return $this->yodlee_status_code;
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
