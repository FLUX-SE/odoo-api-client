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
 *
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
     * @var null|DateTimeInterface
     */
    private $payment_date;

    /**
     * Journal
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Payment Method Type
     *
     * @var null|Method
     */
    private $payment_method_id;

    /**
     * Invoices
     *
     * @var Move
     */
    private $invoice_ids;

    /**
     * Group Payment
     *
     * @var bool
     */
    private $group_payment;

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
     * @param null|DateTimeInterface $payment_date
     */
    public function setPaymentDate(?DateTimeInterface $payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param null|Method $payment_method_id
     */
    public function setPaymentMethodId(Method $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return Move
     */
    public function getInvoiceIds(): Move
    {
        return $this->invoice_ids;
    }

    /**
     * @param bool $group_payment
     */
    public function setGroupPayment(bool $group_payment): void
    {
        $this->group_payment = $group_payment;
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
