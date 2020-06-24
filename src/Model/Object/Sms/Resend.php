<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sms\Resend\Recipient;

/**
 * Odoo model : sms.resend
 * Name : sms.resend
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Resend extends Base
{
    /**
     * Message
     *
     * @var null|Message
     */
    private $mail_message_id;

    /**
     * Recipients
     *
     * @var Recipient
     */
    private $recipient_ids;

    /**
     * Has Cancel
     *
     * @var bool
     */
    private $has_cancel;

    /**
     * Has Insufficient Credit
     *
     * @var bool
     */
    private $has_insufficient_credit;

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
     * @return null|Message
     */
    public function getMailMessageId(): Message
    {
        return $this->mail_message_id;
    }

    /**
     * @param Recipient $recipient_ids
     */
    public function setRecipientIds(Recipient $recipient_ids): void
    {
        $this->recipient_ids = $recipient_ids;
    }

    /**
     * @return bool
     */
    public function isHasCancel(): bool
    {
        return $this->has_cancel;
    }

    /**
     * @return bool
     */
    public function isHasInsufficientCredit(): bool
    {
        return $this->has_insufficient_credit;
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
