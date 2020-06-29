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
 * Odoo model : mail.thread.blacklist
 * Name : mail.thread.blacklist
 * Info :
 * Mixin that is inherited by all model with opt out. This mixin inherits from
 * mail.address.mixin which defines the _primary_email variable and the email_normalized
 * field that are mandatory to use the blacklist mixin. Mail Thread capabilities
 * are required for this mixin.
 */
final class Blacklist extends Base
{
    /**
     * Blacklist
     * If the email address is on the blacklist, the contact won't receive mass mailing anymore, from any list
     *
     * @var null|bool
     */
    private $is_blacklisted;

    /**
     * Bounce
     * Counter of the number of bounced emails for this contact
     *
     * @var null|int
     */
    private $message_bounce;

    /**
     * Is Follower
     *
     * @var null|bool
     */
    private $message_is_follower;

    /**
     * Followers
     *
     * @var null|Followers[]
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     *
     * @var null|Partner[]
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|Channel[]
     */
    private $message_channel_ids;

    /**
     * Messages
     *
     * @var null|Message[]
     */
    private $message_ids;

    /**
     * Unread Messages
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * Number of unread messages
     *
     * @var null|int
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * If checked, new messages require your attention.
     *
     * @var null|bool
     */
    private $message_needaction;

    /**
     * Number of Actions
     * Number of messages which requires an action
     *
     * @var null|int
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_error;

    /**
     * Number of errors
     * Number of messages with delivery error
     *
     * @var null|int
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     *
     * @var null|int
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     *
     * @var null|Attachment
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * Website communication history
     *
     * @var null|Message[]
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * If checked, some messages have a delivery error.
     *
     * @var null|bool
     */
    private $message_has_sms_error;

    /**
     * Normalized Email
     * This field is used to search on email address as the primary email field can contain more than strictly an
     * email address.
     *
     * @var null|string
     */
    private $email_normalized;

    /**
     * @return null|bool
     */
    public function isIsBlacklisted(): ?bool
    {
        return $this->is_blacklisted;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return null|Message[]
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @return null|Attachment
     */
    public function getMessageMainAttachmentId(): ?Attachment
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return null|int
     */
    public function getMessageBounce(): ?int
    {
        return $this->message_bounce;
    }

    /**
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @return null|Message[]
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return null|Followers[]
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return null|string
     */
    public function getEmailNormalized(): ?string
    {
        return $this->email_normalized;
    }
}
