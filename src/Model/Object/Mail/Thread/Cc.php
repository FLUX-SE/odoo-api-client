<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Thread;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.thread.cc
 * Name : mail.thread.cc
 *
 * mail_thread model is meant to be inherited by any model that needs to
 * act as a discussion topic on which messages can be attached. Public
 * methods are prefixed with ``message_`` in order to avoid name
 * collisions with methods of the models that will inherit from this class.
 *
 * ``mail.thread`` defines fields used to handle and display the
 * communication history. ``mail.thread`` also manages followers of
 * inheriting classes. All features and expected behavior are managed
 * by mail.thread. Widgets has been designed for the 7.0 and following
 * versions of Odoo.
 *
 * Inheriting classes are not required to implement any method, as the
 * default implementation will work for any model. However it is common
 * to override at least the ``message_new`` and ``message_update``
 * methods (calling ``super``) to add model-specific behavior at
 * creation and update of a thread when processing incoming emails.
 *
 * Options:
 * - _mail_flat_thread: if set to True, all messages without parent_id
 * are automatically attached to the first message posted on the
 * ressource. If set to False, the display of Chatter is done using
 * threads, and no parent_id is automatically set.
 *
 * MailThread features can be somewhat controlled through context keys :
 *
 * - ``mail_create_nosubscribe``: at create or message_post, do not subscribe
 * uid to the record thread
 * - ``mail_create_nolog``: at create, do not log the automatic '<Document>
 * created' message
 * - ``mail_notrack``: at create and write, do not perform the value tracking
 * creating messages
 * - ``tracking_disable``: at create and write, perform no MailThread features
 * (auto subscription, tracking, post, ...)
 * - ``mail_notify_force_send``: if less than 50 email notifications to send,
 * send them directly instead of using the queue; True by default
 */
final class Cc extends Base
{
    /**
     * Email cc
     *
     * @var string
     */
    private $email_cc;

    /**
     * Is Follower
     *
     * @var bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var Followers
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var Partner
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var Channel
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var Message
     */
    private $message_ids;

    /**
     * Unread Messages
     *
     * @var bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     *
     * @var int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     *
     * @var bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     *
     * @var int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     *
     * @var bool
     */
    private $message_has_error;

    /**
     * Number of errors
     *
     * @var int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     *
     * @var Message
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     *
     * @var bool
     */
    private $message_has_sms_error;

    /**
     * @return string
     */
    public function getEmailCc(): string
    {
        return $this->email_cc;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return Followers
     */
    public function getMessageFollowerIds(): Followers
    {
        return $this->message_follower_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Message
     */
    public function getMessageIds(): Message
    {
        return $this->message_ids;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
    }

    /**
     * @return int
     */
    public function getMessageUnreadCounter(): int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
    }

    /**
     * @return int
     */
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return Attachment
     */
    public function getMessageMainAttachmentId(): Attachment
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @return Message
     */
    public function getWebsiteMessageIds(): Message
    {
        return $this->website_message_ids;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }
}
