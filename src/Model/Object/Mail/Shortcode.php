<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.shortcode
 * Name : mail.shortcode
 * Info :
 * Shortcode
 * Canned Responses, allowing the user to defined shortcuts in its message. Should be applied before storing
 * message in database.
 * Emoji allowing replacing text with image for visual effect. Should be applied when the message is displayed
 * (only for final rendering).
 * These shortcodes are global and are available for every user.
 */
final class Shortcode extends Base
{
    /**
     * Shortcut
     * The shortcut which must be replaced in the Chat Messages
     *
     * @var string
     */
    private $source;

    /**
     * Substitution
     * The escaped html code replacing the shortcut
     *
     * @var string
     */
    private $substitution;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Messages
     *
     * @var null|Message
     */
    private $message_ids;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $source Shortcut
     *        The shortcut which must be replaced in the Chat Messages
     * @param string $substitution Substitution
     *        The escaped html code replacing the shortcut
     */
    public function __construct(string $source, string $substitution)
    {
        $this->source = $source;
        $this->substitution = $substitution;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @param string $substitution
     */
    public function setSubstitution(string $substitution): void
    {
        $this->substitution = $substitution;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|Message $message_ids
     */
    public function setMessageIds(?Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
