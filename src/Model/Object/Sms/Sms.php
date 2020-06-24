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
final class Sms extends Base
{
    /**
     * Number
     *
     * @var string
     */
    private $number;

    /**
     * Body
     *
     * @var string
     */
    private $body;

    /**
     * Customer
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Mail Message
     *
     * @var Message
     */
    private $mail_message_id;

    /**
     * SMS Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Error Code
     *
     * @var array
     */
    private $error_code;

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
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param array $error_code
     */
    public function setErrorCode(array $error_code): void
    {
        $this->error_code = $error_code;
    }

    /**
     * @param array $error_code
     * @param bool $strict
     *
     * @return bool
     */
    public function hasErrorCode(array $error_code, bool $strict = true): bool
    {
        return in_array($error_code, $this->error_code, $strict);
    }

    /**
     * @param array $error_code
     */
    public function addErrorCode(array $error_code): void
    {
        if ($this->hasErrorCode($error_code)) {
            return;
        }

        $this->error_code[] = $error_code;
    }

    /**
     * @param array $error_code
     */
    public function removeErrorCode(array $error_code): void
    {
        if ($this->hasErrorCode($error_code)) {
            $index = array_search($error_code, $this->error_code);
            unset($this->error_code[$index]);
        }
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
