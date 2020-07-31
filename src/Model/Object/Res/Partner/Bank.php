<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res\Partner;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.partner.bank
 * ---
 * Name : res.partner.bank
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
class Bank extends Base
{
    /**
     * Type
     * ---
     * Bank account type: Normal or IBAN. Inferred from the bank account number.
     * ---
     * Selection :
     *     -> bank (Normal)
     *     -> iban (IBAN)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $acc_type;

    /**
     * Account Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $acc_number;

    /**
     * Sanitized Account Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sanitized_acc_number;

    /**
     * Account Holder Name
     * ---
     * Account holder name, in case it is different than the name of the Account Holder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $acc_holder_name;

    /**
     * Account Holder
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $partner_id;

    /**
     * Bank
     * ---
     * Relation : many2one (res.bank)
     * @see \Flux\OdooApiClient\Model\Object\Res\Bank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $bank_id;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $bank_name;

    /**
     * Bank Identifier Code
     * ---
     * Sometimes called BIC or Swift.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $bank_bic;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $sequence;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $currency_id;

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
    protected $company_id;

    /**
     * Has all required arguments
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $qr_code_valid;

    /**
     * Account Journal
     * ---
     * The accounting journal corresponding to this bank account.
     * ---
     * Relation : one2many (account.journal -> bank_account_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $journal_id;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param string $acc_number Account Number
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Account Holder
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $acc_number, OdooRelation $partner_id)
    {
        $this->acc_number = $acc_number;
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeJournalId(OdooRelation $item): void
    {
        if (null === $this->journal_id) {
            $this->journal_id = [];
        }

        if ($this->hasJournalId($item)) {
            $index = array_search($item, $this->journal_id);
            unset($this->journal_id[$index]);
        }
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("qr_code_valid")
     */
    public function isQrCodeValid(): ?bool
    {
        return $this->qr_code_valid;
    }

    /**
     * @param bool|null $qr_code_valid
     */
    public function setQrCodeValid(?bool $qr_code_valid): void
    {
        $this->qr_code_valid = $qr_code_valid;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("journal_id")
     */
    public function getJournalId(): ?array
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation[]|null $journal_id
     */
    public function setJournalId(?array $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasJournalId(OdooRelation $item): bool
    {
        if (null === $this->journal_id) {
            return false;
        }

        return in_array($item, $this->journal_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function addJournalId(OdooRelation $item): void
    {
        if ($this->hasJournalId($item)) {
            return;
        }

        if (null === $this->journal_id) {
            $this->journal_id = [];
        }

        $this->journal_id[] = $item;
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
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("acc_type")
     */
    public function getAccType(): ?string
    {
        return $this->acc_type;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param string|null $acc_type
     */
    public function setAccType(?string $acc_type): void
    {
        $this->acc_type = $acc_type;
    }

    /**
     * @return string
     *
     * @SerializedName("acc_number")
     */
    public function getAccNumber(): string
    {
        return $this->acc_number;
    }

    /**
     * @param string $acc_number
     */
    public function setAccNumber(string $acc_number): void
    {
        $this->acc_number = $acc_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sanitized_acc_number")
     */
    public function getSanitizedAccNumber(): ?string
    {
        return $this->sanitized_acc_number;
    }

    /**
     * @param string|null $sanitized_acc_number
     */
    public function setSanitizedAccNumber(?string $sanitized_acc_number): void
    {
        $this->sanitized_acc_number = $sanitized_acc_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("acc_holder_name")
     */
    public function getAccHolderName(): ?string
    {
        return $this->acc_holder_name;
    }

    /**
     * @param string|null $acc_holder_name
     */
    public function setAccHolderName(?string $acc_holder_name): void
    {
        $this->acc_holder_name = $acc_holder_name;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("bank_id")
     */
    public function getBankId(): ?OdooRelation
    {
        return $this->bank_id;
    }

    /**
     * @param OdooRelation|null $bank_id
     */
    public function setBankId(?OdooRelation $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("bank_name")
     */
    public function getBankName(): ?string
    {
        return $this->bank_name;
    }

    /**
     * @param string|null $bank_name
     */
    public function setBankName(?string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("bank_bic")
     */
    public function getBankBic(): ?string
    {
        return $this->bank_bic;
    }

    /**
     * @param string|null $bank_bic
     */
    public function setBankBic(?string $bank_bic): void
    {
        $this->bank_bic = $bank_bic;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.partner.bank';
    }
}
