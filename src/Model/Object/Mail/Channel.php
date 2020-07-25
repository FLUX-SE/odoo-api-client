<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : mail.channel
 * Name : mail.channel
 * Info :
 * A mail.channel is a discussion group that may behave like a listener
 *         on documents.
 */
final class Channel extends Alias
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Channel Type
     * ---
     * Selection : (default value, usually null)
     *     -> chat (Chat Discussion)
     *     -> channel (Channel)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $channel_type;

    /**
     * Is a chat
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_chat;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * UUID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $uuid;

    /**
     * Send messages by email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $email_send;

    /**
     * Last Seen
     * ---
     * Relation : one2many (mail.channel.partner -> channel_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $channel_last_seen_partner_ids;

    /**
     * Listeners
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $channel_partner_ids;

    /**
     * Channel Message
     * ---
     * Relation : many2many (mail.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $channel_message_ids;

    /**
     * Is a member
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_member;

    /**
     * Privacy
     * ---
     * This group is visible by non members. Invisible groups can add members through the invite button.
     * ---
     * Selection : (default value, usually null)
     *     -> public (Everyone)
     *     -> private (Invited people only)
     *     -> groups (Selected group of users)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $public;

    /**
     * Authorized Group
     * ---
     * Relation : many2one (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_public_id;

    /**
     * Auto Subscription
     * ---
     * Members of those groups will automatically added as followers. Note that they will be able to manage their
     * subscription manually if necessary.
     * ---
     * Relation : many2many (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $group_ids;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_128;

    /**
     * Is Subscribed
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_subscribed;

    /**
     * Moderate this channel
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $moderation;

    /**
     * Moderators
     * ---
     * Relation : many2many (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $moderator_ids;

    /**
     * Moderator
     * ---
     * Current user is a moderator of the channel
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_moderator;

    /**
     * Moderated Emails
     * ---
     * Relation : one2many (mail.moderation -> channel_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Moderation
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $moderation_ids;

    /**
     * Moderated emails count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $moderation_count;

    /**
     * Automatic notification
     * ---
     * People receive an automatic notification about their message being waiting for moderation.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $moderation_notify;

    /**
     * Notification message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $moderation_notify_msg;

    /**
     * Send guidelines to new subscribers
     * ---
     * Newcomers on this moderated channel will automatically receive the guidelines.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $moderation_guidelines;

    /**
     * Guidelines
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $moderation_guidelines_msg;

    /**
     * Alias
     * ---
     * Relation : many2one (mail.alias)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Alias
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $alias_id;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

    /**
     * Followers
     * ---
     * Relation : one2many (mail.followers -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Followers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_follower_ids;

    /**
     * Followers (Partners)
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_partner_ids;

    /**
     * Followers (Channels)
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_channel_ids;

    /**
     * Messages
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_ids;

    /**
     * Unread Messages
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_unread;

    /**
     * Unread Messages Counter
     * ---
     * Number of unread messages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_unread_counter;

    /**
     * Action Needed
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_needaction;

    /**
     * Number of Actions
     * ---
     * Number of messages which requires an action
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_needaction_counter;

    /**
     * Message Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_error;

    /**
     * Number of errors
     * ---
     * Number of messages with delivery error
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

    /**
     * Main Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $message_main_attachment_id;

    /**
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $website_message_ids;

    /**
     * SMS Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_has_sms_error;

    /**
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $public Privacy
     *        ---
     *        This group is visible by non members. Invisible groups can add members through the invite button.
     *        ---
     *        Selection : (default value, usually null)
     *            -> public (Everyone)
     *            -> private (Invited people only)
     *            -> groups (Selected group of users)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $alias_id Alias
     *        ---
     *        Relation : many2one (mail.alias)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Alias
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $alias_model_id Aliased Model
     *        ---
     *        The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     *        existing record will cause the creation of a new record of this model (e.g. a Project Task)
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alias_defaults Default Values
     *        ---
     *        A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alias_contact Alias Contact Security
     *        ---
     *        Policy to post a message on the document using the mailgateway.
     *        - everyone: everyone can post
     *        - partners: only authenticated partners
     *        - followers: only followers of the related document or members of following channels
     *
     *        ---
     *        Selection : (default value, usually null)
     *            -> everyone (Everyone)
     *            -> partners (Authenticated Partners)
     *            -> followers (Followers only)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $public,
        OdooRelation $alias_id,
        OdooRelation $alias_model_id,
        string $alias_defaults,
        string $alias_contact
    ) {
        $this->name = $name;
        $this->public = $public;
        $this->alias_id = $alias_id;
        parent::__construct($alias_model_id, $alias_defaults, $alias_contact);
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageChannelIds(OdooRelation $item): void
    {
        if ($this->hasMessageChannelIds($item)) {
            return;
        }

        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        $this->message_channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessagePartnerIds(OdooRelation $item): void
    {
        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        if ($this->hasMessagePartnerIds($item)) {
            $index = array_search($item, $this->message_partner_ids);
            unset($this->message_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessagePartnerIds(OdooRelation $item): void
    {
        if ($this->hasMessagePartnerIds($item)) {
            return;
        }

        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        $this->message_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessagePartnerIds(OdooRelation $item): bool
    {
        if (null === $this->message_partner_ids) {
            return false;
        }

        return in_array($item, $this->message_partner_ids);
    }

    /**
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageFollowerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addMessageFollowerIds(OdooRelation $item): void
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
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @return bool|null
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param OdooRelation $alias_id
     */
    public function setAliasId(OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return OdooRelation
     */
    public function getAliasId(): OdooRelation
    {
        return $this->alias_id;
    }

    /**
     * @param string|null $moderation_guidelines_msg
     */
    public function setModerationGuidelinesMsg(?string $moderation_guidelines_msg): void
    {
        $this->moderation_guidelines_msg = $moderation_guidelines_msg;
    }

    /**
     * @return string|null
     */
    public function getModerationGuidelinesMsg(): ?string
    {
        return $this->moderation_guidelines_msg;
    }

    /**
     * @param bool|null $moderation_guidelines
     */
    public function setModerationGuidelines(?bool $moderation_guidelines): void
    {
        $this->moderation_guidelines = $moderation_guidelines;
    }

    /**
     * @return bool|null
     */
    public function isModerationGuidelines(): ?bool
    {
        return $this->moderation_guidelines;
    }

    /**
     * @param string|null $moderation_notify_msg
     */
    public function setModerationNotifyMsg(?string $moderation_notify_msg): void
    {
        $this->moderation_notify_msg = $moderation_notify_msg;
    }

    /**
     * @return string|null
     */
    public function getModerationNotifyMsg(): ?string
    {
        return $this->moderation_notify_msg;
    }

    /**
     * @param bool|null $moderation_notify
     */
    public function setModerationNotify(?bool $moderation_notify): void
    {
        $this->moderation_notify = $moderation_notify;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageChannelIds(OdooRelation $item): void
    {
        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        if ($this->hasMessageChannelIds($item)) {
            $index = array_search($item, $this->message_channel_ids);
            unset($this->message_channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param int|null $moderation_count
     */
    public function setModerationCount(?int $moderation_count): void
    {
        $this->moderation_count = $moderation_count;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWebsiteMessageIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addWebsiteMessageIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(OdooRelation $item): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids);
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return int|null
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return int|null
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids);
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @return bool|null
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return int|null
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return int|null
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return bool|null
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addMessageIds(OdooRelation $item): void
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
     * @return bool|null
     */
    public function isModerationNotify(): ?bool
    {
        return $this->moderation_notify;
    }

    /**
     * @return int|null
     */
    public function getModerationCount(): ?int
    {
        return $this->moderation_count;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelLastSeenPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->channel_last_seen_partner_ids) {
            return false;
        }

        return in_array($item, $this->channel_last_seen_partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addChannelMessageIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelMessageIds(OdooRelation $item): bool
    {
        if (null === $this->channel_message_ids) {
            return false;
        }

        return in_array($item, $this->channel_message_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_message_ids
     */
    public function setChannelMessageIds(?array $channel_message_ids): void
    {
        $this->channel_message_ids = $channel_message_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChannelMessageIds(): ?array
    {
        return $this->channel_message_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addChannelPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->channel_partner_ids) {
            return false;
        }

        return in_array($item, $this->channel_partner_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_partner_ids
     */
    public function setChannelPartnerIds(?array $channel_partner_ids): void
    {
        $this->channel_partner_ids = $channel_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChannelPartnerIds(): ?array
    {
        return $this->channel_partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelLastSeenPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addChannelLastSeenPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation[]|null $channel_last_seen_partner_ids
     */
    public function setChannelLastSeenPartnerIds(?array $channel_last_seen_partner_ids): void
    {
        $this->channel_last_seen_partner_ids = $channel_last_seen_partner_ids;
    }

    /**
     * @return bool|null
     */
    public function isIsMember(): ?bool
    {
        return $this->is_member;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChannelLastSeenPartnerIds(): ?array
    {
        return $this->channel_last_seen_partner_ids;
    }

    /**
     * @param bool|null $email_send
     */
    public function setEmailSend(?bool $email_send): void
    {
        $this->email_send = $email_send;
    }

    /**
     * @return bool|null
     */
    public function isEmailSend(): ?bool
    {
        return $this->email_send;
    }

    /**
     * @param string|null $uuid
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param bool|null $is_chat
     */
    public function setIsChat(?bool $is_chat): void
    {
        $this->is_chat = $is_chat;
    }

    /**
     * @return bool|null
     */
    public function isIsChat(): ?bool
    {
        return $this->is_chat;
    }

    /**
     * @param string|null $channel_type
     */
    public function setChannelType(?string $channel_type): void
    {
        $this->channel_type = $channel_type;
    }

    /**
     * @return string|null
     */
    public function getChannelType(): ?string
    {
        return $this->channel_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelMessageIds(OdooRelation $item): void
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
     * @param bool|null $is_member
     */
    public function setIsMember(?bool $is_member): void
    {
        $this->is_member = $is_member;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModerationIds(OdooRelation $item): void
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
     * @param bool|null $moderation
     */
    public function setModeration(?bool $moderation): void
    {
        $this->moderation = $moderation;
    }

    /**
     * @param OdooRelation $item
     */
    public function addModerationIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModerationIds(OdooRelation $item): bool
    {
        if (null === $this->moderation_ids) {
            return false;
        }

        return in_array($item, $this->moderation_ids);
    }

    /**
     * @param OdooRelation[]|null $moderation_ids
     */
    public function setModerationIds(?array $moderation_ids): void
    {
        $this->moderation_ids = $moderation_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModerationIds(): ?array
    {
        return $this->moderation_ids;
    }

    /**
     * @param bool|null $is_moderator
     */
    public function setIsModerator(?bool $is_moderator): void
    {
        $this->is_moderator = $is_moderator;
    }

    /**
     * @return bool|null
     */
    public function isIsModerator(): ?bool
    {
        return $this->is_moderator;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModeratorIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addModeratorIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModeratorIds(OdooRelation $item): bool
    {
        if (null === $this->moderator_ids) {
            return false;
        }

        return in_array($item, $this->moderator_ids);
    }

    /**
     * @param OdooRelation[]|null $moderator_ids
     */
    public function setModeratorIds(?array $moderator_ids): void
    {
        $this->moderator_ids = $moderator_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModeratorIds(): ?array
    {
        return $this->moderator_ids;
    }

    /**
     * @return bool|null
     */
    public function isModeration(): ?bool
    {
        return $this->moderation;
    }

    /**
     * @return string
     */
    public function getPublic(): string
    {
        return $this->public;
    }

    /**
     * @param bool|null $is_subscribed
     */
    public function setIsSubscribed(?bool $is_subscribed): void
    {
        $this->is_subscribed = $is_subscribed;
    }

    /**
     * @return bool|null
     */
    public function isIsSubscribed(): ?bool
    {
        return $this->is_subscribed;
    }

    /**
     * @param string|null $image_128
     */
    public function setImage128(?string $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return string|null
     */
    public function getImage128(): ?string
    {
        return $this->image_128;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroupIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addGroupIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroupIds(OdooRelation $item): bool
    {
        if (null === $this->group_ids) {
            return false;
        }

        return in_array($item, $this->group_ids);
    }

    /**
     * @param OdooRelation[]|null $group_ids
     */
    public function setGroupIds(?array $group_ids): void
    {
        $this->group_ids = $group_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getGroupIds(): ?array
    {
        return $this->group_ids;
    }

    /**
     * @param OdooRelation|null $group_public_id
     */
    public function setGroupPublicId(?OdooRelation $group_public_id): void
    {
        $this->group_public_id = $group_public_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGroupPublicId(): ?OdooRelation
    {
        return $this->group_public_id;
    }

    /**
     * @param string $public
     */
    public function setPublic(string $public): void
    {
        $this->public = $public;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.channel';
    }
}
