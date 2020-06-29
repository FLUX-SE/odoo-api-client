<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Mail\Channel as ChannelAlias;
use Flux\OdooApiClient\Model\Object\Mail\Channel\Partner;
use Flux\OdooApiClient\Model\Object\Res\Groups;
use Flux\OdooApiClient\Model\Object\Res\Partner as PartnerAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.channel
 * Name : mail.channel
 * Info :
 * A mail.channel is a discussion group that may behave like a listener
 * on documents.
 */
final class Channel extends Alias
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Channel Type
     *
     * @var null|array
     */
    private $channel_type;

    /**
     * Is a chat
     *
     * @var null|bool
     */
    private $is_chat;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * UUID
     *
     * @var null|string
     */
    private $uuid;

    /**
     * Send messages by email
     *
     * @var null|bool
     */
    private $email_send;

    /**
     * Last Seen
     *
     * @var null|Partner[]
     */
    private $channel_last_seen_partner_ids;

    /**
     * Listeners
     *
     * @var null|PartnerAlias[]
     */
    private $channel_partner_ids;

    /**
     * Channel Message
     *
     * @var null|Message[]
     */
    private $channel_message_ids;

    /**
     * Is a member
     *
     * @var null|bool
     */
    private $is_member;

    /**
     * Privacy
     * This group is visible by non members. Invisible groups can add members through the invite button.
     *
     * @var array
     */
    private $public;

    /**
     * Authorized Group
     *
     * @var null|Groups
     */
    private $group_public_id;

    /**
     * Auto Subscription
     * Members of those groups will automatically added as followers. Note that they will be able to manage their
     * subscription manually if necessary.
     *
     * @var null|Groups[]
     */
    private $group_ids;

    /**
     * Image
     *
     * @var null|int
     */
    private $image_128;

    /**
     * Is Subscribed
     *
     * @var null|bool
     */
    private $is_subscribed;

    /**
     * Moderate this channel
     *
     * @var null|bool
     */
    private $moderation;

    /**
     * Moderators
     *
     * @var null|Users[]
     */
    private $moderator_ids;

    /**
     * Moderator
     * Current user is a moderator of the channel
     *
     * @var null|bool
     */
    private $is_moderator;

    /**
     * Moderated Emails
     *
     * @var null|Moderation[]
     */
    private $moderation_ids;

    /**
     * Moderated emails count
     *
     * @var null|int
     */
    private $moderation_count;

    /**
     * Automatic notification
     * People receive an automatic notification about their message being waiting for moderation.
     *
     * @var null|bool
     */
    private $moderation_notify;

    /**
     * Notification message
     *
     * @var null|string
     */
    private $moderation_notify_msg;

    /**
     * Send guidelines to new subscribers
     * Newcomers on this moderated channel will automatically receive the guidelines.
     *
     * @var null|bool
     */
    private $moderation_guidelines;

    /**
     * Guidelines
     *
     * @var null|string
     */
    private $moderation_guidelines_msg;

    /**
     * Alias
     *
     * @var Alias
     */
    private $alias_id;

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
     * @var null|PartnerAlias[]
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     *
     * @var null|ChannelAlias[]
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
     * @param string $name Name
     * @param array $public Privacy
     *        This group is visible by non members. Invisible groups can add members through the invite button.
     * @param Alias $alias_id Alias
     * @param Model $alias_model_id Aliased Model
     *        The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     *        existing record will cause the creation of a new record of this model (e.g. a Project Task)
     * @param string $alias_defaults Default Values
     *        A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     * @param array $alias_contact Alias Contact Security
     *        Policy to post a message on the document using the mailgateway.
     *        - everyone: everyone can post
     *        - partners: only authenticated partners
     *        - followers: only followers of the related document or members of following channels
     */
    public function __construct(
        string $name,
        array $public,
        Alias $alias_id,
        Model $alias_model_id,
        string $alias_defaults,
        array $alias_contact
    ) {
        $this->name = $name;
        $this->public = $public;
        $this->alias_id = $alias_id;
        parent::__construct($alias_model_id, $alias_defaults, $alias_contact);
    }

    /**
     * @param null|bool $moderation_guidelines
     */
    public function setModerationGuidelines(?bool $moderation_guidelines): void
    {
        $this->moderation_guidelines = $moderation_guidelines;
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
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param Alias $alias_id
     */
    public function setAliasId(Alias $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @param null|string $moderation_guidelines_msg
     */
    public function setModerationGuidelinesMsg(?string $moderation_guidelines_msg): void
    {
        $this->moderation_guidelines_msg = $moderation_guidelines_msg;
    }

    /**
     * @param null|string $moderation_notify_msg
     */
    public function setModerationNotifyMsg(?string $moderation_notify_msg): void
    {
        $this->moderation_notify_msg = $moderation_notify_msg;
    }

    /**
     * @return null|PartnerAlias[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param null|bool $moderation_notify
     */
    public function setModerationNotify(?bool $moderation_notify): void
    {
        $this->moderation_notify = $moderation_notify;
    }

    /**
     * @return null|int
     */
    public function getModerationCount(): ?int
    {
        return $this->moderation_count;
    }

    /**
     * @param Moderation $item
     */
    public function removeModerationIds(Moderation $item): void
    {
        if (null === $this->moderation_ids) {
            $this->moderation_ids = [];
        }

        if ($this->hasModerationIds($item)) {
            $index = array_search($item, $this->moderation_ids);
            unset($this->moderation_ids[$index]);
        }
    }

    /**
     * @param Moderation $item
     */
    public function addModerationIds(Moderation $item): void
    {
        if ($this->hasModerationIds($item)) {
            return;
        }

        if (null === $this->moderation_ids) {
            $this->moderation_ids = [];
        }

        $this->moderation_ids[] = $item;
    }

    /**
     * @param Moderation $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModerationIds(Moderation $item, bool $strict = true): bool
    {
        if (null === $this->moderation_ids) {
            return false;
        }

        return in_array($item, $this->moderation_ids, $strict);
    }

    /**
     * @param null|Moderation[] $moderation_ids
     */
    public function setModerationIds(?array $moderation_ids): void
    {
        $this->moderation_ids = $moderation_ids;
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
     * @return null|ChannelAlias[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param Users $item
     */
    public function removeModeratorIds(Users $item): void
    {
        if (null === $this->moderator_ids) {
            $this->moderator_ids = [];
        }

        if ($this->hasModeratorIds($item)) {
            $index = array_search($item, $this->moderator_ids);
            unset($this->moderator_ids[$index]);
        }
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
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
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
     * @return null|bool
     */
    public function isIsModerator(): ?bool
    {
        return $this->is_moderator;
    }

    /**
     * @param Users $item
     */
    public function addModeratorIds(Users $item): void
    {
        if ($this->hasModeratorIds($item)) {
            return;
        }

        if (null === $this->moderator_ids) {
            $this->moderator_ids = [];
        }

        $this->moderator_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Partner[] $channel_last_seen_partner_ids
     */
    public function setChannelLastSeenPartnerIds(?array $channel_last_seen_partner_ids): void
    {
        $this->channel_last_seen_partner_ids = $channel_last_seen_partner_ids;
    }

    /**
     * @param PartnerAlias $item
     */
    public function addChannelPartnerIds(PartnerAlias $item): void
    {
        if ($this->hasChannelPartnerIds($item)) {
            return;
        }

        if (null === $this->channel_partner_ids) {
            $this->channel_partner_ids = [];
        }

        $this->channel_partner_ids[] = $item;
    }

    /**
     * @param PartnerAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelPartnerIds(PartnerAlias $item, bool $strict = true): bool
    {
        if (null === $this->channel_partner_ids) {
            return false;
        }

        return in_array($item, $this->channel_partner_ids, $strict);
    }

    /**
     * @param null|PartnerAlias[] $channel_partner_ids
     */
    public function setChannelPartnerIds(?array $channel_partner_ids): void
    {
        $this->channel_partner_ids = $channel_partner_ids;
    }

    /**
     * @param Partner $item
     */
    public function removeChannelLastSeenPartnerIds(Partner $item): void
    {
        if (null === $this->channel_last_seen_partner_ids) {
            $this->channel_last_seen_partner_ids = [];
        }

        if ($this->hasChannelLastSeenPartnerIds($item)) {
            $index = array_search($item, $this->channel_last_seen_partner_ids);
            unset($this->channel_last_seen_partner_ids[$index]);
        }
    }

    /**
     * @param Partner $item
     */
    public function addChannelLastSeenPartnerIds(Partner $item): void
    {
        if ($this->hasChannelLastSeenPartnerIds($item)) {
            return;
        }

        if (null === $this->channel_last_seen_partner_ids) {
            $this->channel_last_seen_partner_ids = [];
        }

        $this->channel_last_seen_partner_ids[] = $item;
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelLastSeenPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->channel_last_seen_partner_ids) {
            return false;
        }

        return in_array($item, $this->channel_last_seen_partner_ids, $strict);
    }

    /**
     * @param null|bool $email_send
     */
    public function setEmailSend(?bool $email_send): void
    {
        $this->email_send = $email_send;
    }

    /**
     * @param null|Message[] $channel_message_ids
     */
    public function setChannelMessageIds(?array $channel_message_ids): void
    {
        $this->channel_message_ids = $channel_message_ids;
    }

    /**
     * @param null|string $uuid
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|bool
     */
    public function isIsChat(): ?bool
    {
        return $this->is_chat;
    }

    /**
     * @param mixed $item
     */
    public function removeChannelType($item): void
    {
        if (null === $this->channel_type) {
            $this->channel_type = [];
        }

        if ($this->hasChannelType($item)) {
            $index = array_search($item, $this->channel_type);
            unset($this->channel_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addChannelType($item): void
    {
        if ($this->hasChannelType($item)) {
            return;
        }

        if (null === $this->channel_type) {
            $this->channel_type = [];
        }

        $this->channel_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelType($item, bool $strict = true): bool
    {
        if (null === $this->channel_type) {
            return false;
        }

        return in_array($item, $this->channel_type, $strict);
    }

    /**
     * @param null|array $channel_type
     */
    public function setChannelType(?array $channel_type): void
    {
        $this->channel_type = $channel_type;
    }

    /**
     * @param PartnerAlias $item
     */
    public function removeChannelPartnerIds(PartnerAlias $item): void
    {
        if (null === $this->channel_partner_ids) {
            $this->channel_partner_ids = [];
        }

        if ($this->hasChannelPartnerIds($item)) {
            $index = array_search($item, $this->channel_partner_ids);
            unset($this->channel_partner_ids[$index]);
        }
    }

    /**
     * @param Message $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasChannelMessageIds(Message $item, bool $strict = true): bool
    {
        if (null === $this->channel_message_ids) {
            return false;
        }

        return in_array($item, $this->channel_message_ids, $strict);
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModeratorIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->moderator_ids) {
            return false;
        }

        return in_array($item, $this->moderator_ids, $strict);
    }

    /**
     * @param Groups $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasGroupIds(Groups $item, bool $strict = true): bool
    {
        if (null === $this->group_ids) {
            return false;
        }

        return in_array($item, $this->group_ids, $strict);
    }

    /**
     * @param null|Users[] $moderator_ids
     */
    public function setModeratorIds(?array $moderator_ids): void
    {
        $this->moderator_ids = $moderator_ids;
    }

    /**
     * @param null|bool $moderation
     */
    public function setModeration(?bool $moderation): void
    {
        $this->moderation = $moderation;
    }

    /**
     * @return null|bool
     */
    public function isIsSubscribed(): ?bool
    {
        return $this->is_subscribed;
    }

    /**
     * @param null|int $image_128
     */
    public function setImage128(?int $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @param Groups $item
     */
    public function removeGroupIds(Groups $item): void
    {
        if (null === $this->group_ids) {
            $this->group_ids = [];
        }

        if ($this->hasGroupIds($item)) {
            $index = array_search($item, $this->group_ids);
            unset($this->group_ids[$index]);
        }
    }

    /**
     * @param Groups $item
     */
    public function addGroupIds(Groups $item): void
    {
        if ($this->hasGroupIds($item)) {
            return;
        }

        if (null === $this->group_ids) {
            $this->group_ids = [];
        }

        $this->group_ids[] = $item;
    }

    /**
     * @param null|Groups[] $group_ids
     */
    public function setGroupIds(?array $group_ids): void
    {
        $this->group_ids = $group_ids;
    }

    /**
     * @param Message $item
     */
    public function addChannelMessageIds(Message $item): void
    {
        if ($this->hasChannelMessageIds($item)) {
            return;
        }

        if (null === $this->channel_message_ids) {
            $this->channel_message_ids = [];
        }

        $this->channel_message_ids[] = $item;
    }

    /**
     * @param null|Groups $group_public_id
     */
    public function setGroupPublicId(?Groups $group_public_id): void
    {
        $this->group_public_id = $group_public_id;
    }

    /**
     * @param mixed $item
     */
    public function removePublic($item): void
    {
        if ($this->hasPublic($item)) {
            $index = array_search($item, $this->public);
            unset($this->public[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPublic($item): void
    {
        if ($this->hasPublic($item)) {
            return;
        }

        $this->public[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPublic($item, bool $strict = true): bool
    {
        return in_array($item, $this->public, $strict);
    }

    /**
     * @param array $public
     */
    public function setPublic(array $public): void
    {
        $this->public = $public;
    }

    /**
     * @return null|bool
     */
    public function isIsMember(): ?bool
    {
        return $this->is_member;
    }

    /**
     * @param Message $item
     */
    public function removeChannelMessageIds(Message $item): void
    {
        if (null === $this->channel_message_ids) {
            $this->channel_message_ids = [];
        }

        if ($this->hasChannelMessageIds($item)) {
            $index = array_search($item, $this->channel_message_ids);
            unset($this->channel_message_ids[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }
}
