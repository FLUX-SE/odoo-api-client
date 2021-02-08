<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\User\Work\Entry;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.user.work.entry.employee
 * ---
 * Name : hr.user.work.entry.employee
 * ---
 * Info :
 * Personnal calendar filter
 */
final class Employee extends Base
{
    /**
     * Me
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_id;

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
     * @param OdooRelation $user_id Me
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_id Employee
     *        ---
     *        Relation : many2one (hr.employee)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $user_id, OdooRelation $employee_id)
    {
        $this->user_id = $user_id;
        $this->employee_id = $employee_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @param OdooRelation $employee_id
     */
    public function setEmployeeId(OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
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
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.user.work.entry.employee';
    }
}
