<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.online.wizard
 * ---
 * Name : account.online.wizard
 * ---
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
    /**
     * Number Added
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $number_added;

    /**
     * Transactions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $transactions;

    /**
     * Status
     * ---
     * Selection : (default value, usually null)
     *     -> success (Success)
     *     -> failed (Failed)
     *     -> cancelled (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $status;

    /**
     * Method
     * ---
     * Selection : (default value, usually null)
     *     -> add (add)
     *     -> edit (edit)
     *     -> refresh (refresh)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $method;

    /**
     * Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $message;

    /**
     * Fetch transactions from
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $sync_date;

    /**
     * Synchronized accounts
     * ---
     * Relation : one2many (account.online.link.wizard -> account_online_wizard_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Online\Link\Wizard
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $account_ids;

    /**
     * Hide Table
     * ---
     * Technical field to hide table in view
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $hide_table;

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
     * @return int|null
     *
     * @SerializedName("number_added")
     */
    public function getNumberAdded(): ?int
    {
        return $this->number_added;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccountIds(OdooRelation $item): void
    {
        if ($this->hasAccountIds($item)) {
            return;
        }

        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        $this->account_ids[] = $item;
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
     * @param bool|null $hide_table
     */
    public function setHideTable(?bool $hide_table): void
    {
        $this->hide_table = $hide_table;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("hide_table")
     */
    public function isHideTable(): ?bool
    {
        return $this->hide_table;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAccountIds(OdooRelation $item): void
    {
        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        if ($this->hasAccountIds($item)) {
            $index = array_search($item, $this->account_ids);
            unset($this->account_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountIds(OdooRelation $item): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids);
    }

    /**
     * @param int|null $number_added
     */
    public function setNumberAdded(?int $number_added): void
    {
        $this->number_added = $number_added;
    }

    /**
     * @param OdooRelation[]|null $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("account_ids")
     */
    public function getAccountIds(): ?array
    {
        return $this->account_ids;
    }

    /**
     * @param DateTimeInterface|null $sync_date
     */
    public function setSyncDate(?DateTimeInterface $sync_date): void
    {
        $this->sync_date = $sync_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("sync_date")
     */
    public function getSyncDate(): ?DateTimeInterface
    {
        return $this->sync_date;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message")
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string|null
     *
     * @SerializedName("method")
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     *
     * @SerializedName("status")
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $transactions
     */
    public function setTransactions(?string $transactions): void
    {
        $this->transactions = $transactions;
    }

    /**
     * @return string|null
     *
     * @SerializedName("transactions")
     */
    public function getTransactions(): ?string
    {
        return $this->transactions;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.online.wizard';
    }
}
