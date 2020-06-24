<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Channel as ChannelAlias;
use Flux\OdooApiClient\Model\Object\Mail\Channel\Partner;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Partner as PartnerAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.channel
 * Name : mail.channel
 *
 * A mail.channel is a discussion group that may behave like a listener
 * on documents.
 */
final class Channel extends Alias
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Channel Type
     *
     * @var array
     */
    private $channel_type;

    /**
     * Is a chat
     *
     * @var bool
     */
    private $is_chat;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * UUID
     *
     * @var string
     */
    private $uuid;

    /**
     * Send messages by email
     *
     * @var bool
     */
    private $email_send;

    /**
     * Last Seen
     *
     * @var Partner
     */
    private $channel_last_seen_partner_ids;

    /**
     * Listeners
     *
     * @var PartnerAlias
     */
    private $channel_partner_ids;

    /**
     * Channel Message
     *
     * @var Message
     */
    private $channel_message_ids;

    /**
     * Is a member
     *
     * @var bool
     */
    private $is_member;

    /**
     * Privacy
     *
     * @var null|array
     */
    private $public;

    /**
     * Authorized Group
     *
     * @var Groups
     */
    private $group_public_id;

    /**
     * Auto Subscription
     *
     * @var Groups
     */
    private $group_ids;

    /**
     * Image
     *
     * @var int
     */
    private $image_128;

    /**
     * Is Subscribed
     *
     * @var bool
     */
    private $is_subscribed;

    /**
     * Moderate this channel
     *
     * @var bool
     */
    private $moderation;

    /**
     * Moderators
     *
     * @var Users
     */
    private $moderator_ids;

    /**
     * Moderator
     *
     * @var bool
     */
    private $is_moderator;

    /**
     * Moderated Emails
     *
     * @var Moderation
     */
    private $moderation_ids;

    /**
     * Moderated emails count
     *
     * @var int
     */
    private $moderation_count;

    /**
     * Automatic notification
     *
     * @var bool
     */
    private $moderation_notify;

    /**
     * Notification message
     *
     * @var string
     */
    private $moderation_notify_msg;

    /**
     * Send guidelines to new subscribers
     *
     * @var bool
     */
    private $moderation_guidelines;

    /**
     * Guidelines
     *
     * @var string
     */
    private $moderation_guidelines_msg;

    /**
     * Alias
     *
     * @var null|Alias
     */
    private $alias_id;

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
     * @var PartnerAlias
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var ChannelAlias
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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return ChannelAlias
     */
    public function getMessageChannelIds(): ChannelAlias
    {
        return $this->message_channel_ids;
    }

    /**
     * @param bool $moderation_notify
     */
    public function setModerationNotify(bool $moderation_notify): void
    {
        $this->moderation_notify = $moderation_notify;
    }

    /**
     * @param string $moderation_notify_msg
     */
    public function setModerationNotifyMsg(string $moderation_notify_msg): void
    {
        $this->moderation_notify_msg = $moderation_notify_msg;
    }

    /**
     * @param bool $moderation_guidelines
     */
    public function setModerationGuidelines(bool $moderation_guidelines): void
    {
        $this->moderation_guidelines = $moderation_guidelines;
    }

    /**
     * @param string $moderation_guidelines_msg
     */
    public function setModerationGuidelinesMsg(string $moderation_guidelines_msg): void
    {
        $this->moderation_guidelines_msg = $moderation_guidelines_msg;
    }

    /**
     * @param null|Alias $alias_id
     */
    public function setAliasId(Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return PartnerAlias
     */
    public function getMessagePartnerIds(): PartnerAlias
    {
        return $this->message_partner_ids;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param Moderation $moderation_ids
     */
    public function setModerationIds(Moderation $moderation_ids): void
    {
        $this->moderation_ids = $moderation_ids;
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
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return int
     */
    public function getModerationCount(): int
    {
        return $this->moderation_count;
    }

    /**
     * @return bool
     */
    public function isIsModerator(): bool
    {
        return $this->is_moderator;
    }

    /**
     * @param array $channel_type
     */
    public function setChannelType(array $channel_type): void
    {
        $this->channel_type = $channel_type;
    }

    /**
     * @param Message $channel_message_ids
     */
    public function setChannelMessageIds(Message $channel_message_ids): void
    {
        $this->channel_message_ids = $channel_message_ids;
    }

    /**
     * @param array $channel_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelType(array $channel_type, bool $strict = true): bool
    {
        return in_array($channel_type, $this->channel_type, $strict);
    }

    /**
     * @param array $channel_type
     */
    public function addChannelType(array $channel_type): void
    {
        if ($this->hasChannelType($channel_type)) {
            return;
        }

        $this->channel_type[] = $channel_type;
    }

    /**
     * @param array $channel_type
     */
    public function removeChannelType(array $channel_type): void
    {
        if ($this->hasChannelType($channel_type)) {
            $index = array_search($channel_type, $this->channel_type);
            unset($this->channel_type[$index]);
        }
    }

    /**
     * @return bool
     */
    public function isIsChat(): bool
    {
        return $this->is_chat;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @param bool $email_send
     */
    public function setEmailSend(bool $email_send): void
    {
        $this->email_send = $email_send;
    }

    /**
     * @param Partner $channel_last_seen_partner_ids
     */
    public function setChannelLastSeenPartnerIds(Partner $channel_last_seen_partner_ids): void
    {
        $this->channel_last_seen_partner_ids = $channel_last_seen_partner_ids;
    }

    /**
     * @param PartnerAlias $channel_partner_ids
     */
    public function setChannelPartnerIds(PartnerAlias $channel_partner_ids): void
    {
        $this->channel_partner_ids = $channel_partner_ids;
    }

    /**
     * @return bool
     */
    public function isIsMember(): bool
    {
        return $this->is_member;
    }

    /**
     * @param Users $moderator_ids
     */
    public function setModeratorIds(Users $moderator_ids): void
    {
        $this->moderator_ids = $moderator_ids;
    }

    /**
     * @param null|array $public
     */
    public function setPublic(?array $public): void
    {
        $this->public = $public;
    }

    /**
     * @param ?array $public
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPublic(?array $public, bool $strict = true): bool
    {
        if (null === $this->public) {
            return false;
        }

        return in_array($public, $this->public, $strict);
    }

    /**
     * @param ?array $public
     */
    public function addPublic(?array $public): void
    {
        if ($this->hasPublic($public)) {
            return;
        }

        if (null === $this->public) {
            $this->public = [];
        }

        $this->public[] = $public;
    }

    /**
     * @param ?array $public
     */
    public function removePublic(?array $public): void
    {
        if ($this->hasPublic($public)) {
            $index = array_search($public, $this->public);
            unset($this->public[$index]);
        }
    }

    /**
     * @param Groups $group_public_id
     */
    public function setGroupPublicId(Groups $group_public_id): void
    {
        $this->group_public_id = $group_public_id;
    }

    /**
     * @param Groups $group_ids
     */
    public function setGroupIds(Groups $group_ids): void
    {
        $this->group_ids = $group_ids;
    }

    /**
     * @param int $image_128
     */
    public function setImage128(int $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return bool
     */
    public function isIsSubscribed(): bool
    {
        return $this->is_subscribed;
    }

    /**
     * @param bool $moderation
     */
    public function setModeration(bool $moderation): void
    {
        $this->moderation = $moderation;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }
}
