<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.moderation
 * Name : mail.moderation
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Moderation extends Base
{
    /**
     * Email
     *
     * @var string
     */
    private $email;

    /**
     * Status
     *
     * @var array
     */
    private $status;

    /**
     * Channel
     *
     * @var Channel
     */
    private $channel_id;

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
     * @param string $email Email
     * @param array $status Status
     * @param Channel $channel_id Channel
     */
    public function __construct(string $email, array $status, Channel $channel_id)
    {
        $this->email = $email;
        $this->status = $status;
        $this->channel_id = $channel_id;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param array $status
     */
    public function setStatus(array $status): void
    {
        $this->status = $status;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStatus($item, bool $strict = true): bool
    {
        return in_array($item, $this->status, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addStatus($item): void
    {
        if ($this->hasStatus($item)) {
            return;
        }

        $this->status[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeStatus($item): void
    {
        if ($this->hasStatus($item)) {
            $index = array_search($item, $this->status);
            unset($this->status[$index]);
        }
    }

    /**
     * @param Channel $channel_id
     */
    public function setChannelId(Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
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
