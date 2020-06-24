<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.tax.group
 * Name : account.tax.group
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Group extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Tax current account (payable)
     *
     * @var Account
     */
    private $property_tax_payable_account_id;

    /**
     * Tax current account (receivable)
     *
     * @var Account
     */
    private $property_tax_receivable_account_id;

    /**
     * Advance Tax payment account
     *
     * @var Account
     */
    private $property_advance_tax_payment_account_id;

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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Account $property_tax_payable_account_id
     */
    public function setPropertyTaxPayableAccountId(Account $property_tax_payable_account_id): void
    {
        $this->property_tax_payable_account_id = $property_tax_payable_account_id;
    }

    /**
     * @param Account $property_tax_receivable_account_id
     */
    public function setPropertyTaxReceivableAccountId(Account $property_tax_receivable_account_id): void
    {
        $this->property_tax_receivable_account_id = $property_tax_receivable_account_id;
    }

    /**
     * @param Account $property_advance_tax_payment_account_id
     */
    public function setPropertyAdvanceTaxPaymentAccountId(
        Account $property_advance_tax_payment_account_id
    ): void
    {
        $this->property_advance_tax_payment_account_id = $property_advance_tax_payment_account_id;
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
