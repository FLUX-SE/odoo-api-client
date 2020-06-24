<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Fetchmail\Server;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.mail
 * Name : mail.mail
 *
 * Model holding RFC2822 email messages to send. This model also provides
 * facilities to queue and send new email messages.
 */
final class Mail extends Message
{
    /**
     * Message
     *
     * @var null|Message
     */
    private $mail_message_id;

    /**
     * Rich-text Contents
     *
     * @var string
     */
    private $body_html;

    /**
     * References
     *
     * @var string
     */
    private $references;

    /**
     * Headers
     *
     * @var string
     */
    private $headers;

    /**
     * Is Notification
     *
     * @var bool
     */
    private $notification;

    /**
     * To
     *
     * @var string
     */
    private $email_to;

    /**
     * Cc
     *
     * @var string
     */
    private $email_cc;

    /**
     * To (Partners)
     *
     * @var Partner
     */
    private $recipient_ids;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Auto Delete
     *
     * @var bool
     */
    private $auto_delete;

    /**
     * Failure Reason
     *
     * @var string
     */
    private $failure_reason;

    /**
     * Scheduled Send Date
     *
     * @var string
     */
    private $scheduled_date;

    /**
     * Inbound Mail Server
     *
     * @var Server
     */
    private $fetchmail_server_id;

    /**
     * @param null|Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @param string $body_html
     */
    public function setBodyHtml(string $body_html): void
    {
        $this->body_html = $body_html;
    }

    /**
     * @return string
     */
    public function getReferences(): string
    {
        return $this->references;
    }

    /**
     * @param string $headers
     */
    public function setHeaders(string $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @param bool $notification
     */
    public function setNotification(bool $notification): void
    {
        $this->notification = $notification;
    }

    /**
     * @param string $email_to
     */
    public function setEmailTo(string $email_to): void
    {
        $this->email_to = $email_to;
    }

    /**
     * @param string $email_cc
     */
    public function setEmailCc(string $email_cc): void
    {
        $this->email_cc = $email_cc;
    }

    /**
     * @param Partner $recipient_ids
     */
    public function setRecipientIds(Partner $recipient_ids): void
    {
        $this->recipient_ids = $recipient_ids;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param bool $auto_delete
     */
    public function setAutoDelete(bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
    }

    /**
     * @return string
     */
    public function getFailureReason(): string
    {
        return $this->failure_reason;
    }

    /**
     * @param string $scheduled_date
     */
    public function setScheduledDate(string $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return Server
     */
    public function getFetchmailServerId(): Server
    {
        return $this->fetchmail_server_id;
    }
}
