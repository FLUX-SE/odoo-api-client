<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.mail
 * Name : mail.mail
 * Info :
 * Model holding RFC2822 email messages to send. This model also provides
 *                 facilities to queue and send new email messages.
 */
final class Mail extends Message
{
    /**
     * Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $mail_message_id;

    /**
     * Rich-text Contents
     * Rich-text/HTML message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $body_html;

    /**
     * References
     * Message references, such as identifiers of previous messages
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $references;

    /**
     * Headers
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $headers;

    /**
     * Is Notification
     * Mail has been created to notify people of an existing mail.message
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $notification;

    /**
     * To
     * Message recipients (emails)
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_to;

    /**
     * Cc
     * Carbon copy message recipients
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_cc;

    /**
     * To (Partners)
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $recipient_ids;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> outgoing (Outgoing)
     *     -> sent (Sent)
     *     -> received (Received)
     *     -> exception (Delivery Failed)
     *     -> cancel (Cancelled)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Auto Delete
     * Permanently delete this email after sending it, to save space
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_delete;

    /**
     * Failure Reason
     * Failure reason. This is usually the exception thrown by the email server, stored to ease the debugging of
     * mailing issues.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $failure_reason;

    /**
     * Scheduled Send Date
     * If set, the queue manager will send the email after the date. If not set, the email will be send as soon as
     * possible.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $scheduled_date;

    /**
     * Inbound Mail Server
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fetchmail_server_id;

    /**
     * @param OdooRelation $mail_message_id Message
     *        Searchable : yes
     *        Sortable : yes
     * @param string $message_type Type
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> email (Email)
     *            -> comment (Comment)
     *            -> notification (System notification)
     *            -> user_notification (User Specific Notification)
     *            -> snailmail (Snailmail)
     *            -> sms (SMS)
     *       
     */
    public function __construct(OdooRelation $mail_message_id, string $message_type)
    {
        $this->mail_message_id = $mail_message_id;
        parent::__construct($message_type);
    }

    /**
     * @param OdooRelation[]|null $recipient_ids
     */
    public function setRecipientIds(?array $recipient_ids): void
    {
        $this->recipient_ids = $recipient_ids;
    }

    /**
     * @param OdooRelation|null $fetchmail_server_id
     */
    public function setFetchmailServerId(?OdooRelation $fetchmail_server_id): void
    {
        $this->fetchmail_server_id = $fetchmail_server_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFetchmailServerId(): ?OdooRelation
    {
        return $this->fetchmail_server_id;
    }

    /**
     * @param string|null $scheduled_date
     */
    public function setScheduledDate(?string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return string|null
     */
    public function getScheduledDate(): ?string
    {
        return $this->scheduled_date;
    }

    /**
     * @param string|null $failure_reason
     */
    public function setFailureReason(?string $failure_reason): void
    {
        $this->failure_reason = $failure_reason;
    }

    /**
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failure_reason;
    }

    /**
     * @param bool|null $auto_delete
     */
    public function setAutoDelete(?bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @return bool|null
     */
    public function isAutoDelete(): ?bool
    {
        return $this->auto_delete;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRecipientIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addRecipientIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRecipientIds(OdooRelation $item): bool
    {
        if (null === $this->recipient_ids) {
            return false;
        }

        return in_array($item, $this->recipient_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRecipientIds(): ?array
    {
        return $this->recipient_ids;
    }

    /**
     * @return OdooRelation
     */
    public function getMailMessageId(): OdooRelation
    {
        return $this->mail_message_id;
    }

    /**
     * @param string|null $email_cc
     */
    public function setEmailCc(?string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @return string|null
     */
    public function getEmailCc(): ?string
    {
        return $this->email_cc;
    }

    /**
     * @param string|null $email_to
     */
    public function setEmailTo(?string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @return string|null
     */
    public function getEmailTo(): ?string
    {
        return $this->email_to;
    }

    /**
     * @param bool|null $notification
     */
    public function setNotification(?bool $notification): void
    {
        $this->notification = $notification;
    }

    /**
     * @return bool|null
     */
    public function isNotification(): ?bool
    {
        return $this->notification;
    }

    /**
     * @param string|null $headers
     */
    public function setHeaders(?string $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return string|null
     */
    public function getHeaders(): ?string
    {
        return $this->headers;
    }

    /**
     * @param string|null $references
     */
    public function setReferences(?string $references): void
    {
        $this->references = $references;
    }

    /**
     * @return string|null
     */
    public function getReferences(): ?string
    {
        return $this->references;
    }

    /**
     * @param string|null $body_html
     */
    public function setBodyHtml(?string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @return string|null
     */
    public function getBodyHtml(): ?string
    {
        return $this->body_html;
    }

    /**
     * @param OdooRelation $mail_message_id
     */
    public function setMailMessageId(OdooRelation $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.mail';
    }
}
