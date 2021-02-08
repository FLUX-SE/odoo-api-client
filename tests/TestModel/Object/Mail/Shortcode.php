<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Mail;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.shortcode
 * ---
 * Name : mail.shortcode
 * ---
 * Info :
 * Shortcode
 *                 Canned Responses, allowing the user to defined shortcuts in its message. Should be applied
 * before storing message in database.
 *                 Emoji allowing replacing text with image for visual effect. Should be applied when the message
 * is displayed (only for final rendering).
 *                 These shortcodes are global and are available for every user.
 */
final class Shortcode extends Base
{
    /**
     * Shortcut
     * ---
     * The shortcut which must be replaced in the Chat Messages
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $source;

    /**
     * Substitution
     * ---
     * The escaped html code replacing the shortcut
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $substitution;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Messages
     * ---
     * Relation : many2one (mail.message)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $message_ids;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $source Shortcut
     *        ---
     *        The shortcut which must be replaced in the Chat Messages
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $substitution Substitution
     *        ---
     *        The escaped html code replacing the shortcut
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $source, string $substitution)
    {
        $this->source = $source;
        $this->substitution = $substitution;
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
     * @return string
     *
     * @SerializedName("source")
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param OdooRelation|null $message_ids
     */
    public function setMessageIds(?OdooRelation $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?OdooRelation
    {
        return $this->message_ids;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $substitution
     */
    public function setSubstitution(string $substitution): void
    {
        $this->substitution = $substitution;
    }

    /**
     * @return string
     *
     * @SerializedName("substitution")
     */
    public function getSubstitution(): string
    {
        return $this->substitution;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.shortcode';
    }
}
