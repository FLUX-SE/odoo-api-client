<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.shortcode
 * Name : mail.shortcode
 *
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
     *
     * @var null|string
     */
    private $source;

    /**
     * Substitution
     *
     * @var null|string
     */
    private $substitution;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Messages
     *
     * @var Message
     */
    private $message_ids;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $source
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
    }

    /**
     * @param null|string $substitution
     */
    public function setSubstitution(?string $substitution): void
    {
        $this->substitution = $substitution;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
