<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.shortcode
 * Name : mail.shortcode
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
    public const ODOO_MODEL_NAME = 'mail.shortcode';

    /**
     * Shortcut
     * The shortcut which must be replaced in the Chat Messages
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $source;

    /**
     * Substitution
     * The escaped html code replacing the shortcut
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $substitution;

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Messages
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $message_ids;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $source Shortcut
     *        The shortcut which must be replaced in the Chat Messages
     *        Searchable : yes
     *        Sortable : yes
     * @param string $substitution Substitution
     *        The escaped html code replacing the shortcut
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $source, string $substitution)
    {
        $this->source = $source;
        $this->substitution = $substitution;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface|null
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
     * @param OdooRelation|null $message_ids
     */
    public function setMessageIds(?OdooRelation $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return OdooRelation|null
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
