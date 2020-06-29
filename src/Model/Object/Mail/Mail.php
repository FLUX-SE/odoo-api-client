<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Fetchmail\Server;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.mail
 * Name : mail.mail
 * Info :
 * Model holding RFC2822 email messages to send. This model also provides
 * facilities to queue and send new email messages.
 */
final class Mail extends Message
{
    /**
     * Message
     *
     * @var Message
     */
    private $mail_message_id;

    /**
     * Rich-text Contents
     * Rich-text/HTML message
     *
     * @var null|string
     */
    private $body_html;

    /**
     * References
     * Message references, such as identifiers of previous messages
     *
     * @var null|string
     */
    private $references;

    /**
     * Headers
     *
     * @var null|string
     */
    private $headers;

    /**
     * Is Notification
     * Mail has been created to notify people of an existing mail.message
     *
     * @var null|bool
     */
    private $notification;

    /**
     * To
     * Message recipients (emails)
     *
     * @var null|string
     */
    private $email_to;

    /**
     * Cc
     * Carbon copy message recipients
     *
     * @var null|string
     */
    private $email_cc;

    /**
     * To (Partners)
     *
     * @var null|Partner[]
     */
    private $recipient_ids;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Auto Delete
     * Permanently delete this email after sending it, to save space
     *
     * @var null|bool
     */
    private $auto_delete;

    /**
     * Failure Reason
     * Failure reason. This is usually the exception thrown by the email server, stored to ease the debugging of
     * mailing issues.
     *
     * @var null|string
     */
    private $failure_reason;

    /**
     * Scheduled Send Date
     * If set, the queue manager will send the email after the date. If not set, the email will be send as soon as
     * possible.
     *
     * @var null|string
     */
    private $scheduled_date;

    /**
     * Inbound Mail Server
     *
     * @var null|Server
     */
    private $fetchmail_server_id;

    /**
     * @param Message $mail_message_id Message
     * @param array $message_type Type
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     */
    public function __construct(Message $mail_message_id, array $message_type)
    {
        $this->mail_message_id = $mail_message_id;
        parent::__construct($message_type);
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRecipientIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->recipient_ids) {
            return false;
        }

        return in_array($item, $this->recipient_ids, $strict);
    }

    /**
     * @param null|string $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return null|string
     */
    public function getFailureReason(): ?string
    {
        return $this->failure_reason;
    }

    /**
     * @param null|bool $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param Partner $item
     */
    public function removeRecipientIds(Partner $item): void
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
     * @param Partner $item
     */
    public function addRecipientIds(Partner $item): void
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
     * @param null|Partner[] $recipient_ids
     */
    public function setRecipientIds(?array $recipient_ids): void
    {
        $this->recipient_ids = $recipient_ids;
    }

    /**
     * @param Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @param null|string $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param null|string $email_to
     */
    public function setEmailTo(?string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param null|bool $notification
     */
    public function setNotification(?bool $notification): void
    {
        $this->notification = $notification;
    }

    /**
     * @param null|string $headers
     */
    public function setHeaders(?string $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return null|string
     */
    public function getReferences(): ?string
    {
        return $this->references;
    }

    /**
     * @param null|string $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @return null|Server
     */
    public function getFetchmailServerId(): ?Server
    {
        return $this->fetchmail_server_id;
    }
}
