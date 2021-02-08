<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Mail;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.followers
 * ---
 * Name : mail.followers
 * ---
 * Info :
 * mail_followers holds the data related to the follow mechanism inside
 *         Odoo. Partners can choose to follow documents (records) of any kind
 *         that inherits from mail.thread. Following documents allow to receive
 *         notifications for new messages. A subscription is characterized by:
 *
 *         :param: res_model: model of the followed objects
 *         :param: res_id: ID of resource (may be 0 for every objects)
 */
final class Followers extends Base
{
    /**
     * Related Document Model Name
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
     * Related Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Listener
     * ---
     * Relation : many2one (mail.channel)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $channel_id;

    /**
     * Subtype
     * ---
     * Message subtypes followed, meaning subtypes that will be pushed onto the user's Wall.
     * ---
     * Relation : many2many (mail.message.subtype)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message\Subtype
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $subtype_ids;

    /**
     * Name
     * ---
     * Name of the related partner (if exist) or the related channel
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Email
     * ---
     * Email of the related partner (if exist) or False
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $email;

    /**
     * Is Active
     * ---
     * If the related partner is active (if exist) or if related channel exist
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_active;

    /**
     * @param string $res_model Related Document Model Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $res_model)
    {
        $this->res_model = $res_model;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSubtypeIds(OdooRelation $item): bool
    {
        if (null === $this->subtype_ids) {
            return false;
        }

        return in_array($item, $this->subtype_ids);
    }

    /**
     * @param bool|null $is_active
     */
    public function setIsActive(?bool $is_active): void
    {
        $this->is_active = $is_active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_active")
     */
    public function isIsActive(): ?bool
    {
        return $this->is_active;
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
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     * @param OdooRelation $item
     */
    public function removeSubtypeIds(OdooRelation $item): void
    {
        if (null === $this->subtype_ids) {
            $this->subtype_ids = [];
        }

        if ($this->hasSubtypeIds($item)) {
            $index = array_search($item, $this->subtype_ids);
            unset($this->subtype_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSubtypeIds(OdooRelation $item): void
    {
        if ($this->hasSubtypeIds($item)) {
            return;
        }

        if (null === $this->subtype_ids) {
            $this->subtype_ids = [];
        }

        $this->subtype_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $subtype_ids
     */
    public function setSubtypeIds(?array $subtype_ids): void
    {
        $this->subtype_ids = $subtype_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("subtype_ids")
     */
    public function getSubtypeIds(): ?array
    {
        return $this->subtype_ids;
    }

    /**
     * @param OdooRelation|null $channel_id
     */
    public function setChannelId(?OdooRelation $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("channel_id")
     */
    public function getChannelId(): ?OdooRelation
    {
        return $this->channel_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
        return 'mail.followers';
    }
}
