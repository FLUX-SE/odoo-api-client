<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.moderation
 * Name : mail.moderation
 *
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
     * @var null|string
     */
    private $email;

    /**
     * Status
     *
     * @var null|array
     */
    private $status;

    /**
     * Channel
     *
     * @var null|Channel
     */
    private $channel_id;

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
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param null|array $status
     */
    public function setStatus(?array $status): void
    {
        $this->status = $status;
    }

    /**
     * @param ?array $status
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStatus(?array $status, bool $strict = true): bool
    {
        if (null === $this->status) {
            return false;
        }

        return in_array($status, $this->status, $strict);
    }

    /**
     * @param ?array $status
     */
    public function addStatus(?array $status): void
    {
        if ($this->hasStatus($status)) {
            return;
        }

        if (null === $this->status) {
            $this->status = [];
        }

        $this->status[] = $status;
    }

    /**
     * @param ?array $status
     */
    public function removeStatus(?array $status): void
    {
        if ($this->hasStatus($status)) {
            $index = array_search($status, $this->status);
            unset($this->status[$index]);
        }
    }

    /**
     * @param null|Channel $channel_id
     */
    public function setChannelId(Channel $channel_id): void
    {
        $this->channel_id = $channel_id;
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
