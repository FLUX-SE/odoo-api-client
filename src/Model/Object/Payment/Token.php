<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : payment.token
 * ---
 * Name : payment.token
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
final class Token extends Base
{
    /**
     * Name
     * ---
     * Name of the payment token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Short name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $short_name;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Acquirer Account
     * ---
     * Relation : many2one (payment.acquirer)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Acquirer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $acquirer_id;

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
     * Acquirer Ref.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $acquirer_ref;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Payment Transactions
     * ---
     * Relation : one2many (payment.transaction -> payment_token_id)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Transaction
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_ids;

    /**
     * Verified
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $verified;

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
     * @param OdooRelation $partner_id Partner
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $acquirer_id Acquirer Account
     *        ---
     *        Relation : many2one (payment.acquirer)
     *        @see \Flux\OdooApiClient\Model\Object\Payment\Acquirer
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $acquirer_ref Acquirer Ref.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $partner_id, OdooRelation $acquirer_id, string $acquirer_ref)
    {
        $this->partner_id = $partner_id;
        $this->acquirer_id = $acquirer_id;
        $this->acquirer_ref = $acquirer_ref;
    }

    /**
     * @param OdooRelation[]|null $payment_ids
     */
    public function setPaymentIds(?array $payment_ids): void
    {
        $this->payment_ids = $payment_ids;
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
     * @param bool|null $verified
     */
    public function setVerified(?bool $verified): void
    {
        $this->verified = $verified;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("verified")
     */
    public function isVerified(): ?bool
    {
        return $this->verified;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentIds(OdooRelation $item): void
    {
        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        if ($this->hasPaymentIds($item)) {
            $index = array_search($item, $this->payment_ids);
            unset($this->payment_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIds($item)) {
            return;
        }

        if (null === $this->payment_ids) {
            $this->payment_ids = [];
        }

        $this->payment_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentIds(OdooRelation $item): bool
    {
        if (null === $this->payment_ids) {
            return false;
        }

        return in_array($item, $this->payment_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("payment_ids")
     */
    public function getPaymentIds(): ?array
    {
        return $this->payment_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $acquirer_ref
     */
    public function setAcquirerRef(string $acquirer_ref): void
    {
        $this->acquirer_ref = $acquirer_ref;
    }

    /**
     * @return string
     *
     * @SerializedName("acquirer_ref")
     */
    public function getAcquirerRef(): string
    {
        return $this->acquirer_ref;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
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
     * @param OdooRelation $acquirer_id
     */
    public function setAcquirerId(OdooRelation $acquirer_id): void
    {
        $this->acquirer_id = $acquirer_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("acquirer_id")
     */
    public function getAcquirerId(): OdooRelation
    {
        return $this->acquirer_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param string|null $short_name
     */
    public function setShortName(?string $short_name): void
    {
        $this->short_name = $short_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("short_name")
     */
    public function getShortName(): ?string
    {
        return $this->short_name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.token';
    }
}
