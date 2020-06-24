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
final class Team extends Base
{
    /**
     * Sales Team
     *
     * @var null|string
     */
    private $name;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Team Leader
     *
     * @var Users
     */
    private $user_id;

    /**
     * Channel Members
     *
     * @var Users
     */
    private $member_ids;

    /**
     * Favorite Members
     *
     * @var Users
     */
    private $favorite_user_ids;

    /**
     * Show on dashboard
     *
     * @var bool
     */
    private $is_favorite;

    /**
     * Color Index
     *
     * @var int
     */
    private $color;

    /**
     * Dashboard Button
     *
     * @var string
     */
    private $dashboard_button_name;

    /**
     * Dashboard Graph Data
     *
     * @var string
     */
    private $dashboard_graph_data;

    /**
     * Quotations
     *
     * @var bool
     */
    private $use_quotations;

    /**
     * Invoiced This Month
     *
     * @var int
     */
    private $invoiced;

    /**
     * Invoicing Target
     *
     * @var int
     */
    private $invoiced_target;

    /**
     * Number of quotations to invoice
     *
     * @var int
     */
    private $quotations_count;

    /**
     * Amount of quotations to invoice
     *
     * @var int
     */
    private $quotations_amount;

    /**
     * Number of sales to invoice
     *
     * @var int
     */
    private $sales_to_invoice_count;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isMessageHasError(): bool
    {
        return $this->message_has_error;
    }

    /**
     * @return Channel
     */
    public function getMessageChannelIds(): Channel
    {
        return $this->message_channel_ids;
    }

    /**
     * @param Message $message_ids
     */
    public function setMessageIds(Message $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     * @return int
     */
    public function getMessageHasErrorCounter(): int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param Followers $message_follower_ids
     */
    public function setMessageFollowerIds(Followers $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
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
     * @return bool
     */
    public function isMessageHasSmsError(): bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return Partner
     */
    public function getMessagePartnerIds(): Partner
    {
        return $this->message_partner_ids;
    }

    /**
     * @return bool
     */
    public function isMessageIsFollower(): bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param bool $is_favorite
     */
    public function setIsFavorite(bool $is_favorite): void
    {
        $this->is_favorite = $is_favorite;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return Currency
     */
    public function getCurrencyId(): Currency
    {
        return $this->currency_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param Users $member_ids
     */
    public function setMemberIds(Users $member_ids): void
    {
        $this->member_ids = $member_ids;
    }

    /**
     * @param Users $favorite_user_ids
     */
    public function setFavoriteUserIds(Users $favorite_user_ids): void
    {
        $this->favorite_user_ids = $favorite_user_ids;
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getSalesToInvoiceCount(): int
    {
        return $this->sales_to_invoice_count;
    }

    /**
     * @return string
     */
    public function getDashboardButtonName(): string
    {
        return $this->dashboard_button_name;
    }

    /**
     * @return string
     */
    public function getDashboardGraphData(): string
    {
        return $this->dashboard_graph_data;
    }

    /**
     * @param bool $use_quotations
     */
    public function setUseQuotations(bool $use_quotations): void
    {
        $this->use_quotations = $use_quotations;
    }

    /**
     * @return int
     */
    public function getInvoiced(): int
    {
        return $this->invoiced;
    }

    /**
     * @param int $invoiced_target
     */
    public function setInvoicedTarget(int $invoiced_target): void
    {
        $this->invoiced_target = $invoiced_target;
    }

    /**
     * @return int
     */
    public function getQuotationsCount(): int
    {
        return $this->quotations_count;
    }

    /**
     * @return int
     */
    public function getQuotationsAmount(): int
    {
        return $this->quotations_amount;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
