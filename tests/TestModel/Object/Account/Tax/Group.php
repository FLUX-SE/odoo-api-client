<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Tax;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.tax.group
 * ---
 * Name : account.tax.group
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
final class Group extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Tax current account (payable)
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_tax_payable_account_id;

    /**
     * Tax current account (receivable)
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_tax_receivable_account_id;

    /**
     * Advance Tax payment account
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $property_advance_tax_payment_account_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @param OdooRelation|null $property_advance_tax_payment_account_id
     */
    public function setPropertyAdvanceTaxPaymentAccountId(
        ?OdooRelation $property_advance_tax_payment_account_id
    ): void {
        $this->property_advance_tax_payment_account_id = $property_advance_tax_payment_account_id;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_advance_tax_payment_account_id")
     */
    public function getPropertyAdvanceTaxPaymentAccountId(): ?OdooRelation
    {
        return $this->property_advance_tax_payment_account_id;
    }

    /**
     * @param OdooRelation|null $property_tax_receivable_account_id
     */
    public function setPropertyTaxReceivableAccountId(
        ?OdooRelation $property_tax_receivable_account_id
    ): void {
        $this->property_tax_receivable_account_id = $property_tax_receivable_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_tax_receivable_account_id")
     */
    public function getPropertyTaxReceivableAccountId(): ?OdooRelation
    {
        return $this->property_tax_receivable_account_id;
    }

    /**
     * @param OdooRelation|null $property_tax_payable_account_id
     */
    public function setPropertyTaxPayableAccountId(?OdooRelation $property_tax_payable_account_id): void
    {
        $this->property_tax_payable_account_id = $property_tax_payable_account_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_tax_payable_account_id")
     */
    public function getPropertyTaxPayableAccountId(): ?OdooRelation
    {
        return $this->property_tax_payable_account_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.tax.group';
    }
}
