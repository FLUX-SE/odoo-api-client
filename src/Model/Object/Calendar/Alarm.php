<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : calendar.alarm
 * ---
 * Name : calendar.alarm
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
final class Alarm extends Base
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
     * Remind Before
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $duration;

    /**
     * Unit
     * ---
     * Selection :
     *     -> minutes (Minutes)
     *     -> hours (Hours)
     *     -> days (Days)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $interval;

    /**
     * Duration in minutes
     * ---
     * Duration in minutes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $duration_minutes;

    /**
     * Type
     * ---
     * Selection :
     *     -> notification (Notification)
     *     -> email (Email)
     *     -> sms (SMS Text Message)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $alarm_type;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $duration Remind Before
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $interval Unit
     *        ---
     *        Selection :
     *            -> minutes (Minutes)
     *            -> hours (Hours)
     *            -> days (Days)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alarm_type Type
     *        ---
     *        Selection :
     *            -> notification (Notification)
     *            -> email (Email)
     *            -> sms (SMS Text Message)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, int $duration, string $interval, string $alarm_type)
    {
        $this->name = $name;
        $this->duration = $duration;
        $this->interval = $interval;
        $this->alarm_type = $alarm_type;
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
     * @param string $alarm_type
     */
    public function setAlarmType(string $alarm_type): void
    {
        $this->alarm_type = $alarm_type;
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
     * @return string
     *
     * @SerializedName("alarm_type")
     */
    public function getAlarmType(): string
    {
        return $this->alarm_type;
    }

    /**
     * @param int|null $duration_minutes
     */
    public function setDurationMinutes(?int $duration_minutes): void
    {
        $this->duration_minutes = $duration_minutes;
    }

    /**
     * @return int|null
     *
     * @SerializedName("duration_minutes")
     */
    public function getDurationMinutes(): ?int
    {
        return $this->duration_minutes;
    }

    /**
     * @param string $interval
     */
    public function setInterval(string $interval): void
    {
        $this->interval = $interval;
    }

    /**
     * @return string
     *
     * @SerializedName("interval")
     */
    public function getInterval(): string
    {
        return $this->interval;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     *
     * @SerializedName("duration")
     */
    public function getDuration(): int
    {
        return $this->duration;
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
        return 'calendar.alarm';
    }
}
