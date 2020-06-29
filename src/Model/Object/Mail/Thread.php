<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : mail.thread
 * Name : mail.thread
 * Info :
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
final class Thread extends Base
{
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
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return null|bool
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param Message $item
     */
    public function removeWebsiteMessageIds(Message $item): void
    {
        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        if ($this->hasWebsiteMessageIds($item)) {
            $index = array_search($item, $this->website_message_ids);
            unset($this->website_message_ids[$index]);
        }
    }

    /**
     * @param Message $item
     */
    public function addWebsiteMessageIds(Message $item): void
    {
        if ($this->hasWebsiteMessageIds($item)) {
            return;
        }

        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        $this->website_message_ids[] = $item;
    }

    /**
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids, $strict);
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @return null|int
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param Message $item
     */
    public function removeMessageIds(Message $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids);
            unset($this->message_ids[$index]);
        }
    }

    /**
     * @param Message $item
     */
    public function addMessageIds(Message $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    /**
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids, $strict);
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @param Followers $item
     */
    public function removeMessageFollowerIds(Followers $item): void
    {
        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        if ($this->hasMessageFollowerIds($item)) {
            $index = array_search($item, $this->message_follower_ids);
            unset($this->message_follower_ids[$index]);
        }
    }

    /**
     * @param Followers $item
     */
    public function addMessageFollowerIds(Followers $item): void
    {
        if ($this->hasMessageFollowerIds($item)) {
            return;
        }

        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        $this->message_follower_ids[] = $item;
    }

    /**
     * @param Followers $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMessageFollowerIds(Followers $item, bool $strict = true): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids, $strict);
    }

    /**
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }
}
