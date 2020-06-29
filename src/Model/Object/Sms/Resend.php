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
 * Info :
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
     * @var Message
     */
    private $mail_message_id;

    /**
     * Recipients
     *
     * @var null|Recipient[]
     */
    private $recipient_ids;

    /**
     * Has Cancel
     *
     * @var null|bool
     */
    private $has_cancel;

    /**
     * Has Insufficient Credit
     *
     * @var null|bool
     */
    private $has_insufficient_credit;

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
     * @param Message $mail_message_id Message
     */
    public function __construct(Message $mail_message_id)
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return Message
     */
    public function getMailMessageId(): Message
    {
        return $this->mail_message_id;
    }

    /**
     * @param null|Recipient[] $recipient_ids
     */
    public function setRecipientIds(?array $recipient_ids): void
    {
        $this->recipient_ids = $recipient_ids;
    }

    /**
     * @param Recipient $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRecipientIds(Recipient $item, bool $strict = true): bool
    {
        if (null === $this->recipient_ids) {
            return false;
        }

        return in_array($item, $this->recipient_ids, $strict);
    }

    /**
     * @param Recipient $item
     */
    public function addRecipientIds(Recipient $item): void
    {
        if ($this->hasRecipientIds($item)) {
            return;
        }

        if (null === $this->recipient_ids) {
            $this->recipient_ids = [];
        }

        $this->recipient_ids[] = $item;
    }

    /**
     * @param Recipient $item
     */
    public function removeRecipientIds(Recipient $item): void
    {
        if (null === $this->recipient_ids) {
            $this->recipient_ids = [];
        }

        if ($this->hasRecipientIds($item)) {
            $index = array_search($item, $this->recipient_ids);
            unset($this->recipient_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isHasCancel(): ?bool
    {
        return $this->has_cancel;
    }

    /**
     * @return null|bool
     */
    public function isHasInsufficientCredit(): ?bool
    {
        return $this->has_insufficient_credit;
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
