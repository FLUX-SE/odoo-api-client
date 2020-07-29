<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.wizard.invite
 * ---
 * Name : mail.wizard.invite
 * ---
 * Info :
 * Wizard to invite partners (or channels) and make them followers.
 */
final class Invite extends Base
{
    /**
     * Related Document Model
     * ---
     * Model of the followed resource
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $res_model;

    /**
     * Related Document ID
     * ---
     * Id of the followed resource
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Recipients
     * ---
     * List of partners that will be added as follower of the current document.
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Channels
     * ---
     * List of channels that will be added as listeners of the current document.
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $channel_ids;

    /**
     * Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $message;

    /**
     * Send Email
     * ---
     * If checked, the partners will receive an email warning they have been added in the document's followers.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $send_mail;

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
     * @param string $res_model Related Document Model
     *        ---
     *        Model of the followed resource
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $res_model)
    {
        $this->res_model = $res_model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message")
     */
    public function getMessage(): ?string
    {
        return $this->message;
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
     * @param bool|null $send_mail
     */
    public function setSendMail(?bool $send_mail): void
    {
        $this->send_mail = $send_mail;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("send_mail")
     */
    public function isSendMail(): ?bool
    {
        return $this->send_mail;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelIds(OdooRelation $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
    }

    /**
     * @return string
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): string
    {
        return $this->res_model;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChannelIds(OdooRelation $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelIds(OdooRelation $item): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("channel_ids")
     */
    public function getChannelIds(): ?array
    {
        return $this->channel_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.wizard.invite';
    }
}
