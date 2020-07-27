<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.payment.method
 * ---
 * Name : pos.payment.method
 * ---
 * Info :
 * Used to classify pos.payment.
 *
 *         Generic characteristics of a pos.payment is described in this model.
 *         E.g. A cash payment can be described by a pos.payment.method with
 *         fields: is_cash_count = True and a cash_journal_id set to an
 *         `account.journal` (type='cash') record.
 *
 *         When a pos.payment.method is cash, cash_journal_id is required as
 *         it will be the journal where the account.bank.statement.line records
 *         will be created.
 */
final class Method extends Base
{
    /**
     * Payment Method
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Intermediary Account
     * ---
     * Account used as counterpart of the income account in the accounting entry representing the pos sales.
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $receivable_account_id;

    /**
     * Cash
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_cash_count;

    /**
     * Cash Journal
     * ---
     * The payment method is of type cash. A cash statement will be automatically generated.
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $cash_journal_id;

    /**
     * Split Transactions
     * ---
     * If ticked, each payment will generate a separated journal item. Ticking that option will slow the closing of
     * the PoS.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $split_transactions;

    /**
     * Pos Sessions
     * ---
     * Open PoS sessions that are using this payment method.
     * ---
     * Relation : many2many (pos.session)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $open_session_ids;

    /**
     * Point of Sale Configurations
     * ---
     * Relation : many2many (pos.config)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Config
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $config_ids;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Use a Payment Terminal
     * ---
     * Record payments with a terminal on this journal.
     * ---
     * Selection : (default value, usually null)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $use_payment_terminal;

    /**
     * Hide Use Payment Terminal
     * ---
     * Technical field which is used to hide use_payment_terminal when no payment interfaces are installed.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $hide_use_payment_terminal;

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
     * @param string $name Payment Method
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $receivable_account_id Intermediary Account
     *        ---
     *        Account used as counterpart of the income account in the accounting entry representing the pos sales.
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $receivable_account_id)
    {
        $this->name = $name;
        $this->receivable_account_id = $receivable_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string|null
     */
    public function getUsePaymentTerminal(): ?string
    {
        return $this->use_payment_terminal;
    }

    /**
     * @param string|null $use_payment_terminal
     */
    public function setUsePaymentTerminal(?string $use_payment_terminal): void
    {
        $this->use_payment_terminal = $use_payment_terminal;
    }

    /**
     * @return bool|null
     */
    public function isHideUsePaymentTerminal(): ?bool
    {
        return $this->hide_use_payment_terminal;
    }

    /**
     * @param bool|null $hide_use_payment_terminal
     */
    public function setHideUsePaymentTerminal(?bool $hide_use_payment_terminal): void
    {
        $this->hide_use_payment_terminal = $hide_use_payment_terminal;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function addConfigIds(OdooRelation $item): void
    {
        if ($this->hasConfigIds($item)) {
            return;
        }

        if (null === $this->config_ids) {
            $this->config_ids = [];
        }

        $this->config_ids[] = $item;
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
     * @param OdooRelation $item
     */
    public function removeConfigIds(OdooRelation $item): void
    {
        if (null === $this->config_ids) {
            $this->config_ids = [];
        }

        if ($this->hasConfigIds($item)) {
            $index = array_search($item, $this->config_ids);
            unset($this->config_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasConfigIds(OdooRelation $item): bool
    {
        if (null === $this->config_ids) {
            return false;
        }

        return in_array($item, $this->config_ids);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation|null $cash_journal_id
     */
    public function setCashJournalId(?OdooRelation $cash_journal_id): void
    {
        $this->cash_journal_id = $cash_journal_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     */
    public function getReceivableAccountId(): OdooRelation
    {
        return $this->receivable_account_id;
    }

    /**
     * @param OdooRelation $receivable_account_id
     */
    public function setReceivableAccountId(OdooRelation $receivable_account_id): void
    {
        $this->receivable_account_id = $receivable_account_id;
    }

    /**
     * @return bool|null
     */
    public function isIsCashCount(): ?bool
    {
        return $this->is_cash_count;
    }

    /**
     * @param bool|null $is_cash_count
     */
    public function setIsCashCount(?bool $is_cash_count): void
    {
        $this->is_cash_count = $is_cash_count;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCashJournalId(): ?OdooRelation
    {
        return $this->cash_journal_id;
    }

    /**
     * @return bool|null
     */
    public function isSplitTransactions(): ?bool
    {
        return $this->split_transactions;
    }

    /**
     * @param OdooRelation[]|null $config_ids
     */
    public function setConfigIds(?array $config_ids): void
    {
        $this->config_ids = $config_ids;
    }

    /**
     * @param bool|null $split_transactions
     */
    public function setSplitTransactions(?bool $split_transactions): void
    {
        $this->split_transactions = $split_transactions;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getOpenSessionIds(): ?array
    {
        return $this->open_session_ids;
    }

    /**
     * @param OdooRelation[]|null $open_session_ids
     */
    public function setOpenSessionIds(?array $open_session_ids): void
    {
        $this->open_session_ids = $open_session_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOpenSessionIds(OdooRelation $item): bool
    {
        if (null === $this->open_session_ids) {
            return false;
        }

        return in_array($item, $this->open_session_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOpenSessionIds(OdooRelation $item): void
    {
        if ($this->hasOpenSessionIds($item)) {
            return;
        }

        if (null === $this->open_session_ids) {
            $this->open_session_ids = [];
        }

        $this->open_session_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOpenSessionIds(OdooRelation $item): void
    {
        if (null === $this->open_session_ids) {
            $this->open_session_ids = [];
        }

        if ($this->hasOpenSessionIds($item)) {
            $index = array_search($item, $this->open_session_ids);
            unset($this->open_session_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getConfigIds(): ?array
    {
        return $this->config_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.payment.method';
    }
}
