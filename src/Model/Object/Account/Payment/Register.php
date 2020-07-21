<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.payment.register
 * Name : account.payment.register
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Register extends Base
{
    /**
     * Payment Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $payment_date;

    /**
     * Journal
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $journal_id;

    /**
     * Payment Method Type
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Check: Pay bill by check and print it from Odoo.
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     * deposit.To enable batch deposit, module account_batch_payment must be installed.
     * SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     * transfer, module account_sepa must be installed 
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $payment_method_id;

    /**
     * Invoices
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * Group Payment
     * Only one payment will be created by partner (bank)/ currency.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $group_payment;

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
     * @param DateTimeInterface $payment_date Payment Date
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $journal_id Journal
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $payment_method_id Payment Method Type
     *        Manual: Get paid by cash, check or any other method outside of Odoo.
     *        Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     *        the customer when buying or subscribing online (payment token).
     *        Check: Pay bill by check and print it from Odoo.
     *        Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     *        When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     *        deposit.To enable batch deposit, module account_batch_payment must be installed.
     *        SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     *        transfer, module account_sepa must be installed 
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        DateTimeInterface $payment_date,
        OdooRelation $journal_id,
        OdooRelation $payment_method_id
    ) {
        $this->payment_date = $payment_date;
        $this->journal_id = $journal_id;
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return bool|null
     */
    public function isGroupPayment(): ?bool
    {
        return $this->group_payment;
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
     * @param bool|null $group_payment
     */
    public function setGroupPayment(?bool $group_payment): void
    {
        $this->group_payment = $group_payment;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getPaymentDate(): DateTimeInterface
    {
        return $this->payment_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param OdooRelation $payment_method_id
     */
    public function setPaymentMethodId(OdooRelation $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPaymentMethodId(): OdooRelation
    {
        return $this->payment_method_id;
    }

    /**
     * @param OdooRelation $journal_id
     */
    public function setJournalId(OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @return OdooRelation
     */
    public function getJournalId(): OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.payment.register';
    }
}
