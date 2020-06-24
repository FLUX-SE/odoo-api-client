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
 * Odoo model : mail.thread.phone
 * Name : mail.thread.phone
 *
 * Purpose of this mixin is to offer two services
 *
 * * compute a sanitized phone number based on ´´_sms_get_number_fields´´.
 * It takes first sanitized value, trying each field returned by the
 * method (see ``MailThread._sms_get_number_fields()´´ for more details
 * about the usage of this method);
 * * compute blacklist state of records. It is based on phone.blacklist
 * model and give an easy-to-use field and API to manipulate blacklisted
 * records;
 *
 * Main API methods
 *
 * * ``_phone_set_blacklisted``: set recordset as blacklisted;
 * * ``_phone_reset_blacklisted``: reactivate recordset (even if not blacklisted
 * this method can be called safely);
 */
final class Phone extends Base
{
    /**
     * Sanitized Number
     *
     * @var string
     */
    private $phone_sanitized;

    /**
     * Phone Blacklisted
     *
     * @var bool
     */
    private $phone_blacklisted;

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
    public function getPhoneSanitized(): string
    {
        return $this->phone_sanitized;
    }

    /**
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
    }

    /**
     * @return Message
     */
    public function getWebsiteMessageIds(): Message
    {
        return $this->website_message_ids;
    }

    /**
     * @return Attachment
     */
    public function getMessageMainAttachmentId(): Attachment
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @return int
     */
    public function getMessageAttachmentCount(): int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
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
    public function getMessageNeedactionCounter(): int
    {
        return $this->message_needaction_counter;
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
    public function isPhoneBlacklisted(): bool
    {
        return $this->phone_blacklisted;
    }

    /**
     * @return bool
     */
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
    }

    /**
     * @return Message
     */
    public function getMessageIds(): Message
    {
        return $this->message_ids;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @return Followers
     */
    public function getMessageFollowerIds(): Followers
    {
        return $this->message_follower_ids;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }
}
