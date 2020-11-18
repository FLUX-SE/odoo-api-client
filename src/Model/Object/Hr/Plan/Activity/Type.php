<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Plan\Activity;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.plan.activity.type
 * ---
 * Name : hr.plan.activity.type
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
final class Type extends Base
{
    /**
     * Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $summary;

    /**
     * Responsible
     * ---
     * Selection :
     *     -> coach (Coach)
     *     -> manager (Manager)
     *     -> employee (Employee)
     *     -> other (Other)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $responsible;

    /**
     * Responsible Person
     * ---
     * Specific responsible of activity if not linked to the employee.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $responsible_id;

    /**
     * Note
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

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
     * @param string $responsible Responsible
     *        ---
     *        Selection :
     *            -> coach (Coach)
     *            -> manager (Manager)
     *            -> employee (Employee)
     *            -> other (Other)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $responsible)
    {
        $this->responsible = $responsible;
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
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param OdooRelation|null $responsible_id
     */
    public function setResponsibleId(?OdooRelation $responsible_id): void
    {
        $this->responsible_id = $responsible_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("responsible_id")
     */
    public function getResponsibleId(): ?OdooRelation
    {
        return $this->responsible_id;
    }

    /**
     * @param string $responsible
     */
    public function setResponsible(string $responsible): void
    {
        $this->responsible = $responsible;
    }

    /**
     * @return string
     *
     * @SerializedName("responsible")
     */
    public function getResponsible(): string
    {
        return $this->responsible;
    }

    /**
     * @param string|null $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("summary")
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.plan.activity.type';
    }
}
