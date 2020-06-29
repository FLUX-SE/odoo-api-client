<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment.register
 * Name : account.payment.register
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Register extends Base
{
    /**
     * Payment Date
     *
     * @var DateTimeInterface
     */
    private $payment_date;

    /**
     * Journal
     *
     * @var Journal
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
     *
     * @var Method
     */
    private $payment_method_id;

    /**
     * Invoices
     *
     * @var null|Move[]
     */
    private $invoice_ids;

    /**
     * Group Payment
     * Only one payment will be created by partner (bank)/ currency.
     *
     * @var null|bool
     */
    private $group_payment;

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
     * @param DateTimeInterface $payment_date Payment Date
     * @param Journal $journal_id Journal
     * @param Method $payment_method_id Payment Method Type
     *        Manual: Get paid by cash, check or any other method outside of Odoo.
     *        Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     *        the customer when buying or subscribing online (payment token).
     *        Check: Pay bill by check and print it from Odoo.
     *        Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     *        When encoding the bank statement in Odoo, you are suggested to reconcile the transaction with the batch
     *        deposit.To enable batch deposit, module account_batch_payment must be installed.
     *        SEPA Credit Transfer: Pay bill from a SEPA Credit Transfer file you submit to your bank. To enable sepa credit
     *        transfer, module account_sepa must be installed
     */
    public function __construct(
        DateTimeInterface $payment_date,
        Journal $journal_id,
        Method $payment_method_id
    ) {
        $this->payment_date = $payment_date;
        $this->journal_id = $journal_id;
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @param DateTimeInterface $payment_date
     */
    public function setPaymentDate(DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param Method $payment_method_id
     */
    public function setPaymentMethodId(Method $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return null|Move[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param null|bool $group_payment
     */
    public function setGroupPayment(?bool $group_payment): void
    {
        $this->group_payment = $group_payment;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
