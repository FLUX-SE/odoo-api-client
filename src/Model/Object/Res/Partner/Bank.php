<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Partner;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Bank as BankAlias;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : res.partner.bank
 * Name : res.partner.bank
 * Info :
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
class Bank extends Base
{
    /**
     * Type
     * Bank account type: Normal or IBAN. Inferred from the bank account number.
     *
     * @var null|array
     */
    protected $acc_type;

    /**
     * Account Number
     *
     * @var string
     */
    protected $acc_number;

    /**
     * Sanitized Account Number
     *
     * @var null|string
     */
    protected $sanitized_acc_number;

    /**
     * Account Holder Name
     * Account holder name, in case it is different than the name of the Account Holder
     *
     * @var null|string
     */
    protected $acc_holder_name;

    /**
     * Account Holder
     *
     * @var Partner
     */
    protected $partner_id;

    /**
     * Bank
     *
     * @var null|BankAlias
     */
    protected $bank_id;

    /**
     * Name
     *
     * @var null|string
     */
    protected $bank_name;

    /**
     * Bank Identifier Code
     * Sometimes called BIC or Swift.
     *
     * @var null|string
     */
    protected $bank_bic;

    /**
     * Sequence
     *
     * @var null|int
     */
    protected $sequence;

    /**
     * Currency
     *
     * @var null|Currency
     */
    protected $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    protected $company_id;

    /**
     * Has all required arguments
     *
     * @var null|bool
     */
    protected $qr_code_valid;

    /**
     * Account Journal
     * The accounting journal corresponding to this bank account.
     *
     * @var null|Journal[]
     */
    protected $journal_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $acc_number Account Number
     * @param Partner $partner_id Account Holder
     */
    public function __construct(string $acc_number, Partner $partner_id)
    {
        $this->acc_number = $acc_number;
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @return null|Journal[]
     */
    public function getJournalId(): ?array
    {
        return $this->journal_id;
    }

    /**
     * @return null|bool
     */
    public function isQrCodeValid(): ?bool
    {
        return $this->qr_code_valid;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return null|array
     */
    public function getAccType(): ?array
    {
        return $this->acc_type;
    }

    /**
     * @param null|string $bank_bic
     */
    public function setBankBic(?string $bank_bic): void
    {
        $this->bank_bic = $bank_bic;
    }

    /**
     * @param null|string $bank_name
     */
    public function setBankName(?string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }

    /**
     * @param null|BankAlias $bank_id
     */
    public function setBankId(?BankAlias $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|string $acc_holder_name
     */
    public function setAccHolderName(?string $acc_holder_name): void
    {
        $this->acc_holder_name = $acc_holder_name;
    }

    /**
     * @return null|string
     */
    public function getSanitizedAccNumber(): ?string
    {
        return $this->sanitized_acc_number;
    }

    /**
     * @param string $acc_number
     */
    public function setAccNumber(string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
