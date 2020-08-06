<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.moderation
 * ---
 * Name : mail.moderation
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
final class Moderation extends Base
{
    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $email;

    /**
     * Status
     * ---
     * Selection :
     *     -> allow (Always Allow)
     *     -> ban (Permanent Ban)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $status;

    /**
     * Channel
     * ---
     * Relation : many2one (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $channel_id;

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
     * @param string $email Email
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $status Status
     *        ---
     *        Selection :
     *            -> allow (Always Allow)
     *            -> ban (Permanent Ban)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $channel_id Channel
     *        ---
     *        Relation : many2one (mail.channel)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $email, string $status, OdooRelation $channel_id)
    {
        $this->email = $email;
        $this->status = $status;
        $this->channel_id = $channel_id;
    }

    /**
     * @return string
     *
     * @SerializedName("email")
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     *
     * @SerializedName("status")
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("channel_id")
     */
    public function getChannelId(): OdooRelation
    {
        return $this->channel_id;
    }

    /**
     * @param OdooRelation $channel_id
     */
    public function setChannelId(OdooRelation $channel_id): void
    {
        $this->channel_id = $channel_id;
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
        return 'mail.moderation';
    }
}