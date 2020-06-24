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
class Bank extends Base
{
    /**
     * Type
     *
     * @var array
     */
    protected $acc_type;

    /**
     * Account Number
     *
     * @var null|string
     */
    protected $acc_number;

    /**
     * Sanitized Account Number
     *
     * @var string
     */
    protected $sanitized_acc_number;

    /**
     * Account Holder Name
     *
     * @var string
     */
    protected $acc_holder_name;

    /**
     * Account Holder
     *
     * @var null|Partner
     */
    protected $partner_id;

    /**
     * Bank
     *
     * @var BankAlias
     */
    protected $bank_id;

    /**
     * Name
     *
     * @var string
     */
    protected $bank_name;

    /**
     * Bank Identifier Code
     *
     * @var string
     */
    protected $bank_bic;

    /**
     * Sequence
     *
     * @var int
     */
    protected $sequence;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency_id;

    /**
     * Company
     *
     * @var Company
     */
    protected $company_id;

    /**
     * Has all required arguments
     *
     * @var bool
     */
    protected $qr_code_valid;

    /**
     * Account Journal
     *
     * @var Journal
     */
    protected $journal_id;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @return array
     */
    public function getAccType(): array
    {
        return $this->acc_type;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return Journal
     */
    public function getJournalId(): Journal
    {
        return $this->journal_id;
    }

    /**
     * @return bool
     */
    public function isQrCodeValid(): bool
    {
        return $this->qr_code_valid;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|string $acc_number
     */
    public function setAccNumber(?string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @param string $bank_bic
     */
    public function setBankBic(string $bank_bic): void
    {
        $this->bank_bic = $bank_bic;
    }

    /**
     * @param string $bank_name
     */
    public function setBankName(string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }

    /**
     * @param BankAlias $bank_id
     */
    public function setBankId(BankAlias $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string $acc_holder_name
     */
    public function setAccHolderName(string $acc_holder_name): void
    {
        $this->acc_holder_name = $acc_holder_name;
    }

    /**
     * @return string
     */
    public function getSanitizedAccNumber(): string
    {
        return $this->sanitized_acc_number;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
