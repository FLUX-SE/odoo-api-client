<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Online;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.online.provider
 * Name : account.online.provider
 *
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Provider extends Base
{
    /**
     * Institution
     *
     * @var string
     */
    private $name;

    /**
     * Provider Account Identifier
     *
     * @var string
     */
    private $provider_account_identifier;

    /**
     * Provider Identifier
     *
     * @var string
     */
    private $provider_identifier;

    /**
     * Synchronization status
     *
     * @var string
     */
    private $status;

    /**
     * Status Code
     *
     * @var string
     */
    private $status_code;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * Action Required
     *
     * @var bool
     */
    private $action_required;

    /**
     * Last Refresh
     *
     * @var DateTimeInterface
     */
    private $last_refresh;

    /**
     * Next synchronization
     *
     * @var DateTimeInterface
     */
    private $next_refresh;

    /**
     * Account Online Journal
     *
     * @var Journal
     */
    private $account_online_journal_ids;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Plaid Error Type
     *
     * @var string
     */
    private $plaid_error_type;

    /**
     * Plaid Item
     *
     * @var string
     */
    private $plaid_item_id;

    /**
     * Ponto Token
     *
     * @var string
     */
    private $ponto_token;

    /**
     * Provider Type
     *
     * @var array
     */
    private $provider_type;

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
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param Message $website_message_ids
     */
    public function setWebsiteMessageIds(Message $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @return bool
     */
    public function isMessageNeedaction(): bool
    {
        return $this->message_needaction;
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
    public function isMessageUnread(): bool
    {
        return $this->message_unread;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @return string
     */
    public function getProviderAccountIdentifier(): string
    {
        return $this->provider_account_identifier;
    }

    /**
     * @return DateTimeInterface
     */
    public function getNextRefresh(): DateTimeInterface
    {
        return $this->next_refresh;
    }

    /**
     * @return string
     */
    public function getProviderIdentifier(): string
    {
        return $this->provider_identifier;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->status_code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function isActionRequired(): bool
    {
        return $this->action_required;
    }

    /**
     * @return DateTimeInterface
     */
    public function getLastRefresh(): DateTimeInterface
    {
        return $this->last_refresh;
    }

    /**
     * @param Journal $account_online_journal_ids
     */
    public function setAccountOnlineJournalIds(Journal $account_online_journal_ids): void
    {
        $this->account_online_journal_ids = $account_online_journal_ids;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return string
     */
    public function getPlaidErrorType(): string
    {
        return $this->plaid_error_type;
    }

    /**
     * @return string
     */
    public function getPlaidItemId(): string
    {
        return $this->plaid_item_id;
    }

    /**
     * @return string
     */
    public function getPontoToken(): string
    {
        return $this->ponto_token;
    }

    /**
     * @return array
     */
    public function getProviderType(): array
    {
        return $this->provider_type;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
