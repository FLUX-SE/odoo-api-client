<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\Reconcile\Model\Partner;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.reconcile.model.partner.mapping
 * ---
 * Name : account.reconcile.model.partner.mapping
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
final class Mapping extends Base
{
    /**
     * Model
     * ---
     * Relation : many2one (account.reconcile.model)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Reconcile\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Find Text in Label
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $payment_ref_regex;

    /**
     * Find Text in Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $narration_regex;

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
     * @param OdooRelation $model_id Model
     *        ---
     *        Relation : many2one (account.reconcile.model)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Reconcile\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Partner
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $model_id, OdooRelation $partner_id)
    {
        $this->model_id = $model_id;
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param string|null $narration_regex
     */
    public function setNarrationRegex(?string $narration_regex): void
    {
        $this->narration_regex = $narration_regex;
    }

    /**
     * @return string|null
     *
     * @SerializedName("narration_regex")
     */
    public function getNarrationRegex(): ?string
    {
        return $this->narration_regex;
    }

    /**
     * @param string|null $payment_ref_regex
     */
    public function setPaymentRefRegex(?string $payment_ref_regex): void
    {
        $this->payment_ref_regex = $payment_ref_regex;
    }

    /**
     * @return string|null
     *
     * @SerializedName("payment_ref_regex")
     */
    public function getPaymentRefRegex(): ?string
    {
        return $this->payment_ref_regex;
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
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.reconcile.model.partner.mapping';
    }
}
