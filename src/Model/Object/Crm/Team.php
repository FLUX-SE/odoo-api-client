<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Crm;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Channel;
use Flux\OdooApiClient\Model\Object\Mail\Followers;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : crm.team
 * Name : crm.team
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
final class Team extends Base
{
    /**
     * Sales Team
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Active
     * If the active field is set to false, it will allow you to hide the Sales Team without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Team Leader
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Channel Members
     * Add members to automatically assign their documents to this sales team. You can only be member of one team.
     *
     * @var null|Users[]
     */
    private $member_ids;

    /**
     * Favorite Members
     *
     * @var null|Users[]
     */
    private $favorite_user_ids;

    /**
     * Show on dashboard
     * Favorite teams to display them in the dashboard and access them easily.
     *
     * @var null|bool
     */
    private $is_favorite;

    /**
     * Color Index
     * The color of the channel
     *
     * @var null|int
     */
    private $color;

    /**
     * Dashboard Button
     *
     * @var null|string
     */
    private $dashboard_button_name;

    /**
     * Dashboard Graph Data
     *
     * @var null|string
     */
    private $dashboard_graph_data;

    /**
     * Quotations
     * Check this box if you send quotations to your customers rather than confirming orders straight away.
     *
     * @var null|bool
     */
    private $use_quotations;

    /**
     * Invoiced This Month
     * Invoice revenue for the current month. This is the amount the sales channel has invoiced this month. It is
     * used to compute the progression ratio of the current and target revenue on the kanban view.
     *
     * @var null|int
     */
    private $invoiced;

    /**
     * Invoicing Target
     * Revenue target for the current month (untaxed total of confirmed invoices).
     *
     * @var null|int
     */
    private $invoiced_target;

    /**
     * Number of quotations to invoice
     *
     * @var null|int
     */
    private $quotations_count;

    /**
     * Amount of quotations to invoice
     *
     * @var null|int
     */
    private $quotations_amount;

    /**
     * Number of sales to invoice
     *
     * @var null|int
     */
    private $sales_to_invoice_count;

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
     * @param string $name Sales Team
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return null|int
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
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
     * @return null|Partner[]
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return null|Channel[]
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
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
     * @return null|bool
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
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
     * @return null|int
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @return null|int
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
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
     * @param null|Followers[] $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFavoriteUserIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->favorite_user_ids) {
            return false;
        }

        return in_array($item, $this->favorite_user_ids, $strict);
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|Currency
     */
    public function getCurrencyId(): ?Currency
    {
        return $this->currency_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|Users[] $member_ids
     */
    public function setMemberIds(?array $member_ids): void
    {
        $this->member_ids = $member_ids;
    }

    /**
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMemberIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->member_ids) {
            return false;
        }

        return in_array($item, $this->member_ids, $strict);
    }

    /**
     * @param Users $item
     */
    public function addMemberIds(Users $item): void
    {
        if ($this->hasMemberIds($item)) {
            return;
        }

        if (null === $this->member_ids) {
            $this->member_ids = [];
        }

        $this->member_ids[] = $item;
    }

    /**
     * @param Users $item
     */
    public function removeMemberIds(Users $item): void
    {
        if (null === $this->member_ids) {
            $this->member_ids = [];
        }

        if ($this->hasMemberIds($item)) {
            $index = array_search($item, $this->member_ids);
            unset($this->member_ids[$index]);
        }
    }

    /**
     * @param null|Users[] $favorite_user_ids
     */
    public function setFavoriteUserIds(?array $favorite_user_ids): void
    {
        $this->favorite_user_ids = $favorite_user_ids;
    }

    /**
     * @param Users $item
     */
    public function addFavoriteUserIds(Users $item): void
    {
        if ($this->hasFavoriteUserIds($item)) {
            return;
        }

        if (null === $this->favorite_user_ids) {
            $this->favorite_user_ids = [];
        }

        $this->favorite_user_ids[] = $item;
    }

    /**
     * @return null|bool
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param Users $item
     */
    public function removeFavoriteUserIds(Users $item): void
    {
        if (null === $this->favorite_user_ids) {
            $this->favorite_user_ids = [];
        }

        if ($this->hasFavoriteUserIds($item)) {
            $index = array_search($item, $this->favorite_user_ids);
            unset($this->favorite_user_ids[$index]);
        }
    }

    /**
     * @param null|bool $is_favorite
     */
    public function setIsFavorite(?bool $is_favorite): void
    {
        $this->is_favorite = $is_favorite;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return null|string
     */
    public function getDashboardButtonName(): ?string
    {
        return $this->dashboard_button_name;
    }

    /**
     * @return null|string
     */
    public function getDashboardGraphData(): ?string
    {
        return $this->dashboard_graph_data;
    }

    /**
     * @param null|bool $use_quotations
     */
    public function setUseQuotations(?bool $use_quotations): void
    {
        $this->use_quotations = $use_quotations;
    }

    /**
     * @return null|int
     */
    public function getInvoiced(): ?int
    {
        return $this->invoiced;
    }

    /**
     * @param null|int $invoiced_target
     */
    public function setInvoicedTarget(?int $invoiced_target): void
    {
        $this->invoiced_target = $invoiced_target;
    }

    /**
     * @return null|int
     */
    public function getQuotationsCount(): ?int
    {
        return $this->quotations_count;
    }

    /**
     * @return null|int
     */
    public function getQuotationsAmount(): ?int
    {
        return $this->quotations_amount;
    }

    /**
     * @return null|int
     */
    public function getSalesToInvoiceCount(): ?int
    {
        return $this->sales_to_invoice_count;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
