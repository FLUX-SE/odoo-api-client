<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : calendar.attendee
 * ---
 * Name : calendar.attendee
 * ---
 * Info :
 * Calendar Attendee Information
 */
final class Attendee extends Base
{
    /**
     * Meeting linked
     * ---
     * Relation : many2one (calendar.event)
     * @see \Flux\OdooApiClient\Model\Object\Calendar\Event
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $event_id;

    /**
     * Contact
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
     * Status
     * ---
     * Status of the attendee's participation
     * ---
     * Selection :
     *     -> needsAction (Needs Action)
     *     -> tentative (Uncertain)
     *     -> declined (Declined)
     *     -> accepted (Accepted)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Common name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $common_name;

    /**
     * Email
     * ---
     * Email of Invited Person
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $email;

    /**
     * Free/Busy
     * ---
     * Selection :
     *     -> free (Free)
     *     -> busy (Busy)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $availability;

    /**
     * Invitation Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $access_token;

    /**
     * Recurrence Rule
     * ---
     * Relation : many2one (calendar.recurrence)
     * @see \Flux\OdooApiClient\Model\Object\Calendar\Recurrence
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $recurrence_id;

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
     * @param OdooRelation $event_id Meeting linked
     *        ---
     *        Relation : many2one (calendar.event)
     *        @see \Flux\OdooApiClient\Model\Object\Calendar\Event
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Contact
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $event_id, OdooRelation $partner_id)
    {
        $this->event_id = $event_id;
        $this->partner_id = $partner_id;
    }

    /**
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
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
     * @param OdooRelation|null $recurrence_id
     */
    public function setRecurrenceId(?OdooRelation $recurrence_id): void
    {
        $this->recurrence_id = $recurrence_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("recurrence_id")
     */
    public function getRecurrenceId(): ?OdooRelation
    {
        return $this->recurrence_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("event_id")
     */
    public function getEventId(): OdooRelation
    {
        return $this->event_id;
    }

    /**
     * @param string|null $availability
     */
    public function setAvailability(?string $availability): void
    {
        $this->availability = $availability;
    }

    /**
     * @return string|null
     *
     * @SerializedName("availability")
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email")
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $common_name
     */
    public function setCommonName(?string $common_name): void
    {
        $this->common_name = $common_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("common_name")
     */
    public function getCommonName(): ?string
    {
        return $this->common_name;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
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
     * @param OdooRelation $event_id
     */
    public function setEventId(OdooRelation $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'calendar.attendee';
    }
}
