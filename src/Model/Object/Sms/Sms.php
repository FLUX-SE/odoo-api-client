<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : sms.sms
 * Name : sms.sms
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
final class Sms extends Base
{
    /**
     * Number
     *
     * @var null|string
     */
    private $number;

    /**
     * Body
     *
     * @var null|string
     */
    private $body;

    /**
     * Customer
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Mail Message
     *
     * @var null|Message
     */
    private $mail_message_id;

    /**
     * SMS Status
     *
     * @var array
     */
    private $state;

    /**
     * Error Code
     *
     * @var null|array
     */
    private $error_code;

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
     * @param array $state SMS Status
     */
    public function __construct(array $state)
    {
        $this->state = $state;
    }

    /**
     * @param null|string $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|Message $mail_message_id
     */
    public function setMailMessageId(?Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param null|array $error_code
     */
    public function setErrorCode(?array $error_code): void
    {
        $this->error_code = $error_code;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasErrorCode($item, bool $strict = true): bool
    {
        if (null === $this->error_code) {
            return false;
        }

        return in_array($item, $this->error_code, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addErrorCode($item): void
    {
        if ($this->hasErrorCode($item)) {
            return;
        }

        if (null === $this->error_code) {
            $this->error_code = [];
        }

        $this->error_code[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeErrorCode($item): void
    {
        if (null === $this->error_code) {
            $this->error_code = [];
        }

        if ($this->hasErrorCode($item)) {
            $index = array_search($item, $this->error_code);
            unset($this->error_code[$index]);
        }
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
