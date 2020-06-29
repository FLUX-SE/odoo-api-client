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
 * Info :
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
     * name of the banking institution
     *
     * @var null|string
     */
    private $name;

    /**
     * Provider Account Identifier
     * ID used to identify provider account in third party server
     *
     * @var null|string
     */
    private $provider_account_identifier;

    /**
     * Provider Identifier
     * ID of the banking institution in third party server used for debugging purpose
     *
     * @var null|string
     */
    private $provider_identifier;

    /**
     * Synchronization status
     * Update status of provider account
     *
     * @var null|string
     */
    private $status;

    /**
     * Status Code
     * Code to identify problem
     *
     * @var null|string
     */
    private $status_code;

    /**
     * Message
     * Techhnical message from third party provider that can help debugging
     *
     * @var null|string
     */
    private $message;

    /**
     * Action Required
     * True if user needs to take action by updating account
     *
     * @var null|bool
     */
    private $action_required;

    /**
     * Last Refresh
     *
     * @var null|DateTimeInterface
     */
    private $last_refresh;

    /**
     * Next synchronization
     *
     * @var null|DateTimeInterface
     */
    private $next_refresh;

    /**
     * Account Online Journal
     *
     * @var null|Journal[]
     */
    private $account_online_journal_ids;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Plaid Error Type
     * Additional information on error
     *
     * @var null|string
     */
    private $plaid_error_type;

    /**
     * Plaid Item
     * item id in plaid database
     *
     * @var null|string
     */
    private $plaid_item_id;

    /**
     * Ponto Token
     * Technical field that contains the ponto token
     *
     * @var null|string
     */
    private $ponto_token;

    /**
     * Provider Type
     *
     * @var null|array
     */
    private $provider_type;

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
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param Company $company_id Company
     */
    public function __construct(Company $company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param null|Message[] $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @return null|bool
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
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
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param null|Attachment $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?Attachment $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param null|Message[] $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @return null|bool
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Journal $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountOnlineJournalIds(Journal $item, bool $strict = true): bool
    {
        if (null === $this->account_online_journal_ids) {
            return false;
        }

        return in_array($item, $this->account_online_journal_ids, $strict);
    }

    /**
     * @return null|string
     */
    public function getProviderAccountIdentifier(): ?string
    {
        return $this->provider_account_identifier;
    }

    /**
     * @return null|string
     */
    public function getProviderIdentifier(): ?string
    {
        return $this->provider_identifier;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return null|string
     */
    public function getStatusCode(): ?string
    {
        return $this->status_code;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return null|bool
     */
    public function isActionRequired(): ?bool
    {
        return $this->action_required;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLastRefresh(): ?DateTimeInterface
    {
        return $this->last_refresh;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNextRefresh(): ?DateTimeInterface
    {
        return $this->next_refresh;
    }

    /**
     * @param null|Journal[] $account_online_journal_ids
     */
    public function setAccountOnlineJournalIds(?array $account_online_journal_ids): void
    {
        $this->account_online_journal_ids = $account_online_journal_ids;
    }

    /**
     * @param Journal $item
     */
    public function addAccountOnlineJournalIds(Journal $item): void
    {
        if ($this->hasAccountOnlineJournalIds($item)) {
            return;
        }

        if (null === $this->account_online_journal_ids) {
            $this->account_online_journal_ids = [];
        }

        $this->account_online_journal_ids[] = $item;
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
     * @param Journal $item
     */
    public function removeAccountOnlineJournalIds(Journal $item): void
    {
        if (null === $this->account_online_journal_ids) {
            $this->account_online_journal_ids = [];
        }

        if ($this->hasAccountOnlineJournalIds($item)) {
            $index = array_search($item, $this->account_online_journal_ids);
            unset($this->account_online_journal_ids[$index]);
        }
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return null|string
     */
    public function getPlaidErrorType(): ?string
    {
        return $this->plaid_error_type;
    }

    /**
     * @return null|string
     */
    public function getPlaidItemId(): ?string
    {
        return $this->plaid_item_id;
    }

    /**
     * @return null|string
     */
    public function getPontoToken(): ?string
    {
        return $this->ponto_token;
    }

    /**
     * @return null|array
     */
    public function getProviderType(): ?array
    {
        return $this->provider_type;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
