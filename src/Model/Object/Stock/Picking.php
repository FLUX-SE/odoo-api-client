<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.picking
 * ---
 * Name : stock.picking
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Picking extends Base
{
    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Source Document
     * ---
     * Reference of the document
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $origin;

    /**
     * Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Back Order of
     * ---
     * If this shipment was split, then this field links to the shipment which contains the already processed part.
     * ---
     * Relation : many2one (stock.picking)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $backorder_id;

    /**
     * Back Orders
     * ---
     * Relation : one2many (stock.picking -> backorder_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $backorder_ids;

    /**
     * Shipping Policy
     * ---
     * It specifies goods to be deliver partially or all at once
     * ---
     * Selection :
     *     -> direct (As soon as possible)
     *     -> one (When all products are ready)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $move_type;

    /**
     * Status
     * ---
     *   * Draft: The transfer is not confirmed yet. Reservation doesn't apply.
     *   * Waiting another operation: This transfer is waiting for another operation before being ready.
     *   * Waiting: The transfer is waiting for the availability of some products.
     * (a) The shipping policy is "As soon as possible": no product could be reserved.
     * (b) The shipping policy is "When all products are ready": not all the products could be reserved.
     *   * Ready: The transfer is ready to be processed.
     * (a) The shipping policy is "As soon as possible": at least one product has been reserved.
     * (b) The shipping policy is "When all products are ready": all product have been reserved.
     *   * Done: The transfer has been processed.
     *   * Cancelled: The transfer has been cancelled.
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> waiting (Waiting Another Operation)
     *     -> confirmed (Waiting)
     *     -> assigned (Ready)
     *     -> done (Done)
     *     -> cancel (Cancelled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Procurement Group
     * ---
     * Relation : many2one (procurement.group)
     * @see \Flux\OdooApiClient\Model\Object\Procurement\Group
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Priority
     * ---
     * Products will be reserved first for the transfers with the highest priorities.
     * ---
     * Selection :
     *     -> 0 (Not urgent)
     *     -> 1 (Normal)
     *     -> 2 (Urgent)
     *     -> 3 (Very Urgent)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $priority;

    /**
     * Scheduled Date
     * ---
     * Scheduled time for the first part of the shipment to be processed. Setting manually a value here would set it
     * as expected date for all the stock moves.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $scheduled_date;

    /**
     * Creation Date
     * ---
     * Creation Date, usually the time of the order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Date of Transfer
     * ---
     * Date at which the transfer has been processed or cancelled.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_done;

    /**
     * Source Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_id;

    /**
     * Destination Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $location_dest_id;

    /**
     * Stock Moves
     * ---
     * Relation : one2many (stock.move -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_lines;

    /**
     * Stock moves not in package
     * ---
     * Relation : one2many (stock.move -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids_without_package;

    /**
     * Has Scrap Moves
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_scrap_move;

    /**
     * Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $picking_type_id;

    /**
     * Type of Operation
     * ---
     * Selection :
     *     -> incoming (Receipt)
     *     -> outgoing (Delivery)
     *     -> internal (Internal Transfer)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $picking_type_code;

    /**
     * Move Entire Packages
     * ---
     * If ticked, you will be able to select entire packages to move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $picking_type_entire_packs;

    /**
     * Contact
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Operations
     * ---
     * Relation : one2many (stock.move.line -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids;

    /**
     * Operations without package
     * ---
     * Relation : one2many (stock.move.line -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_ids_without_package;

    /**
     * Move Line Nosuggest
     * ---
     * Relation : one2many (stock.move.line -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_line_nosuggest_ids;

    /**
     * Has Pack Operations
     * ---
     * Check the existence of pack operation on the picking
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $move_line_exist;

    /**
     * Has Packages
     * ---
     * Check the existence of destination packages on move lines
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_packages;

    /**
     * Show Check Availability
     * ---
     * Technical field used to compute whether the check availability button should be shown.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_check_availability;

    /**
     * Show Mark As Todo
     * ---
     * Technical field used to compute whether the mark as todo button should be shown.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_mark_as_todo;

    /**
     * Show Validate
     * ---
     * Technical field used to compute whether the validate should be shown.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_validate;

    /**
     * Create New Lots/Serial Numbers
     * ---
     * If this is checked only, it will suppose you want to create new Lots/Serial Numbers, so you can provide them
     * in a text field.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $use_create_lots;

    /**
     * Assign Owner
     * ---
     * When validating the transfer, the products will be assigned to this owner.
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $owner_id;

    /**
     * Printed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $printed;

    /**
     * Is Locked
     * ---
     * When the picking is not done this allows changing the initial demand. When the picking is done this allows
     * changing the done quantities.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_locked;

    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Show Operations
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_operations;

    /**
     * Pre-fill Detailed Operations
     * ---
     * If this checkbox is ticked, Odoo will automatically pre-fill the detailed operations with the corresponding
     * products, locations and lot/serial numbers.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_reserved;

    /**
     * Show Lots Text
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_lots_text;

    /**
     * Has Tracking
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_tracking;

    /**
     * Immediate Transfer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $immediate_transfer;

    /**
     * Package Level
     * ---
     * Relation : one2many (stock.package_level -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\PackageLevel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $package_level_ids;

    /**
     * Package Level Ids Details
     * ---
     * Relation : one2many (stock.package_level -> picking_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\PackageLevel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $package_level_ids_details;

    /**
     * Purchase Orders
     * ---
     * Relation : many2one (purchase.order)
     * @see \Flux\OdooApiClient\Model\Object\Purchase\Order
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $purchase_id;

    /**
     * Sales Order
     * ---
     * Relation : many2one (sale.order)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sale_id;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $activity_ids;

    /**
     * Activity State
     * ---
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * ---
     * Selection :
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_state;

    /**
     * Responsible User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_user_id;

    /**
     * Next Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $activity_type_id;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $activity_date_deadline;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_summary;

    /**
     * Activity Exception Decoration
     * ---
     * Type of the exception activity on record.
     * ---
     * Selection :
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_exception_decoration;

    /**
     * Icon
     * ---
     * Icon to indicate an exception activity.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $activity_exception_icon;

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
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $move_type Shipping Policy
     *        ---
     *        It specifies goods to be deliver partially or all at once
     *        ---
     *        Selection :
     *            -> direct (As soon as possible)
     *            -> one (When all products are ready)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_id Source Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $location_dest_id Destination Location
     *        ---
     *        Relation : many2one (stock.location)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Location
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $picking_type_id Operation Type
     *        ---
     *        Relation : many2one (stock.picking.type)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $move_type,
        OdooRelation $location_id,
        OdooRelation $location_dest_id,
        OdooRelation $picking_type_id
    ) {
        $this->move_type = $move_type;
        $this->location_id = $location_id;
        $this->location_dest_id = $location_dest_id;
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_summary")
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeActivityIds(OdooRelation $item): void
    {
        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        if ($this->hasActivityIds($item)) {
            $index = array_search($item, $this->activity_ids);
            unset($this->activity_ids[$index]);
        }
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_icon")
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_is_follower")
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_follower_ids")
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
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
     * @return string|null
     *
     * @SerializedName("activity_state")
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param OdooRelation $item
     */
    public function addActivityIds(OdooRelation $item): void
    {
        if ($this->hasActivityIds($item)) {
            return;
        }

        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        $this->activity_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_partner_ids")
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("package_level_ids_details")
     */
    public function getPackageLevelIdsDetails(): ?array
    {
        return $this->package_level_ids_details;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_tracking")
     */
    public function isHasTracking(): ?bool
    {
        return $this->has_tracking;
    }

    /**
     * @param bool|null $has_tracking
     */
    public function setHasTracking(?bool $has_tracking): void
    {
        $this->has_tracking = $has_tracking;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("immediate_transfer")
     */
    public function isImmediateTransfer(): ?bool
    {
        return $this->immediate_transfer;
    }

    /**
     * @param bool|null $immediate_transfer
     */
    public function setImmediateTransfer(?bool $immediate_transfer): void
    {
        $this->immediate_transfer = $immediate_transfer;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("package_level_ids")
     */
    public function getPackageLevelIds(): ?array
    {
        return $this->package_level_ids;
    }

    /**
     * @param OdooRelation[]|null $package_level_ids
     */
    public function setPackageLevelIds(?array $package_level_ids): void
    {
        $this->package_level_ids = $package_level_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPackageLevelIds(OdooRelation $item): bool
    {
        if (null === $this->package_level_ids) {
            return false;
        }

        return in_array($item, $this->package_level_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPackageLevelIds(OdooRelation $item): void
    {
        if ($this->hasPackageLevelIds($item)) {
            return;
        }

        if (null === $this->package_level_ids) {
            $this->package_level_ids = [];
        }

        $this->package_level_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePackageLevelIds(OdooRelation $item): void
    {
        if (null === $this->package_level_ids) {
            $this->package_level_ids = [];
        }

        if ($this->hasPackageLevelIds($item)) {
            $index = array_search($item, $this->package_level_ids);
            unset($this->package_level_ids[$index]);
        }
    }

    /**
     * @param OdooRelation[]|null $package_level_ids_details
     */
    public function setPackageLevelIdsDetails(?array $package_level_ids_details): void
    {
        $this->package_level_ids_details = $package_level_ids_details;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasActivityIds(OdooRelation $item): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids);
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPackageLevelIdsDetails(OdooRelation $item): bool
    {
        if (null === $this->package_level_ids_details) {
            return false;
        }

        return in_array($item, $this->package_level_ids_details);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPackageLevelIdsDetails(OdooRelation $item): void
    {
        if ($this->hasPackageLevelIdsDetails($item)) {
            return;
        }

        if (null === $this->package_level_ids_details) {
            $this->package_level_ids_details = [];
        }

        $this->package_level_ids_details[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePackageLevelIdsDetails(OdooRelation $item): void
    {
        if (null === $this->package_level_ids_details) {
            $this->package_level_ids_details = [];
        }

        if ($this->hasPackageLevelIdsDetails($item)) {
            $index = array_search($item, $this->package_level_ids_details);
            unset($this->package_level_ids_details[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("purchase_id")
     */
    public function getPurchaseId(): ?OdooRelation
    {
        return $this->purchase_id;
    }

    /**
     * @param OdooRelation|null $purchase_id
     */
    public function setPurchaseId(?OdooRelation $purchase_id): void
    {
        $this->purchase_id = $purchase_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("sale_id")
     */
    public function getSaleId(): ?OdooRelation
    {
        return $this->sale_id;
    }

    /**
     * @param OdooRelation|null $sale_id
     */
    public function setSaleId(?OdooRelation $sale_id): void
    {
        $this->sale_id = $sale_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
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
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_lots_text")
     */
    public function isShowLotsText(): ?bool
    {
        return $this->show_lots_text;
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
     * @return int|null
     *
     * @SerializedName("message_attachment_count")
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("message_main_attachment_id")
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @return bool|null
     *
     * @SerializedName("message_has_sms_error")
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_has_error_counter")
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
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
     *
     * @SerializedName("message_has_error")
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
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
     * @return bool|null
     *
     * @SerializedName("message_unread")
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_needaction")
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @param bool|null $show_lots_text
     */
    public function setShowLotsText(?bool $show_lots_text): void
    {
        $this->show_lots_text = $show_lots_text;
    }

    /**
     * @param bool|null $show_reserved
     */
    public function setShowReserved(?bool $show_reserved): void
    {
        $this->show_reserved = $show_reserved;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLines(OdooRelation $item): bool
    {
        if (null === $this->move_lines) {
            return false;
        }

        return in_array($item, $this->move_lines);
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date_done")
     */
    public function getDateDone(): ?DateTimeInterface
    {
        return $this->date_done;
    }

    /**
     * @param DateTimeInterface|null $date_done
     */
    public function setDateDone(?DateTimeInterface $date_done): void
    {
        $this->date_done = $date_done;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation $location_id
     */
    public function setLocationId(OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("location_dest_id")
     */
    public function getLocationDestId(): OdooRelation
    {
        return $this->location_dest_id;
    }

    /**
     * @param OdooRelation $location_dest_id
     */
    public function setLocationDestId(OdooRelation $location_dest_id): void
    {
        $this->location_dest_id = $location_dest_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_lines")
     */
    public function getMoveLines(): ?array
    {
        return $this->move_lines;
    }

    /**
     * @param OdooRelation[]|null $move_lines
     */
    public function setMoveLines(?array $move_lines): void
    {
        $this->move_lines = $move_lines;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLines(OdooRelation $item): void
    {
        if ($this->hasMoveLines($item)) {
            return;
        }

        if (null === $this->move_lines) {
            $this->move_lines = [];
        }

        $this->move_lines[] = $item;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLines(OdooRelation $item): void
    {
        if (null === $this->move_lines) {
            $this->move_lines = [];
        }

        if ($this->hasMoveLines($item)) {
            $index = array_search($item, $this->move_lines);
            unset($this->move_lines[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_ids_without_package")
     */
    public function getMoveIdsWithoutPackage(): ?array
    {
        return $this->move_ids_without_package;
    }

    /**
     * @param OdooRelation[]|null $move_ids_without_package
     */
    public function setMoveIdsWithoutPackage(?array $move_ids_without_package): void
    {
        $this->move_ids_without_package = $move_ids_without_package;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveIdsWithoutPackage(OdooRelation $item): bool
    {
        if (null === $this->move_ids_without_package) {
            return false;
        }

        return in_array($item, $this->move_ids_without_package);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveIdsWithoutPackage(OdooRelation $item): void
    {
        if ($this->hasMoveIdsWithoutPackage($item)) {
            return;
        }

        if (null === $this->move_ids_without_package) {
            $this->move_ids_without_package = [];
        }

        $this->move_ids_without_package[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveIdsWithoutPackage(OdooRelation $item): void
    {
        if (null === $this->move_ids_without_package) {
            $this->move_ids_without_package = [];
        }

        if ($this->hasMoveIdsWithoutPackage($item)) {
            $index = array_search($item, $this->move_ids_without_package);
            unset($this->move_ids_without_package[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_scrap_move")
     */
    public function isHasScrapMove(): ?bool
    {
        return $this->has_scrap_move;
    }

    /**
     * @param bool|null $has_scrap_move
     */
    public function setHasScrapMove(?bool $has_scrap_move): void
    {
        $this->has_scrap_move = $has_scrap_move;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("picking_type_id")
     */
    public function getPickingTypeId(): OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param DateTimeInterface|null $scheduled_date
     */
    public function setScheduledDate(?DateTimeInterface $scheduled_date): void
    {
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("picking_type_code")
     */
    public function getPickingTypeCode(): ?string
    {
        return $this->picking_type_code;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasBackorderIds(OdooRelation $item): bool
    {
        if (null === $this->backorder_ids) {
            return false;
        }

        return in_array($item, $this->backorder_ids);
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("origin")
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("backorder_id")
     */
    public function getBackorderId(): ?OdooRelation
    {
        return $this->backorder_id;
    }

    /**
     * @param OdooRelation|null $backorder_id
     */
    public function setBackorderId(?OdooRelation $backorder_id): void
    {
        $this->backorder_id = $backorder_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("backorder_ids")
     */
    public function getBackorderIds(): ?array
    {
        return $this->backorder_ids;
    }

    /**
     * @param OdooRelation[]|null $backorder_ids
     */
    public function setBackorderIds(?array $backorder_ids): void
    {
        $this->backorder_ids = $backorder_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addBackorderIds(OdooRelation $item): void
    {
        if ($this->hasBackorderIds($item)) {
            return;
        }

        if (null === $this->backorder_ids) {
            $this->backorder_ids = [];
        }

        $this->backorder_ids[] = $item;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("scheduled_date")
     */
    public function getScheduledDate(): ?DateTimeInterface
    {
        return $this->scheduled_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeBackorderIds(OdooRelation $item): void
    {
        if (null === $this->backorder_ids) {
            $this->backorder_ids = [];
        }

        if ($this->hasBackorderIds($item)) {
            $index = array_search($item, $this->backorder_ids);
            unset($this->backorder_ids[$index]);
        }
    }

    /**
     * @return string
     *
     * @SerializedName("move_type")
     */
    public function getMoveType(): string
    {
        return $this->move_type;
    }

    /**
     * @param string $move_type
     */
    public function setMoveType(string $move_type): void
    {
        $this->move_type = $move_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("group_id")
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("priority")
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param string|null $priority
     */
    public function setPriority(?string $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @param OdooRelation $picking_type_id
     */
    public function setPickingTypeId(OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @param string|null $picking_type_code
     */
    public function setPickingTypeCode(?string $picking_type_code): void
    {
        $this->picking_type_code = $picking_type_code;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_reserved")
     */
    public function isShowReserved(): ?bool
    {
        return $this->show_reserved;
    }

    /**
     * @param bool|null $use_create_lots
     */
    public function setUseCreateLots(?bool $use_create_lots): void
    {
        $this->use_create_lots = $use_create_lots;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_packages")
     */
    public function isHasPackages(): ?bool
    {
        return $this->has_packages;
    }

    /**
     * @param bool|null $has_packages
     */
    public function setHasPackages(?bool $has_packages): void
    {
        $this->has_packages = $has_packages;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_check_availability")
     */
    public function isShowCheckAvailability(): ?bool
    {
        return $this->show_check_availability;
    }

    /**
     * @param bool|null $show_check_availability
     */
    public function setShowCheckAvailability(?bool $show_check_availability): void
    {
        $this->show_check_availability = $show_check_availability;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_mark_as_todo")
     */
    public function isShowMarkAsTodo(): ?bool
    {
        return $this->show_mark_as_todo;
    }

    /**
     * @param bool|null $show_mark_as_todo
     */
    public function setShowMarkAsTodo(?bool $show_mark_as_todo): void
    {
        $this->show_mark_as_todo = $show_mark_as_todo;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_validate")
     */
    public function isShowValidate(): ?bool
    {
        return $this->show_validate;
    }

    /**
     * @param bool|null $show_validate
     */
    public function setShowValidate(?bool $show_validate): void
    {
        $this->show_validate = $show_validate;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_create_lots")
     */
    public function isUseCreateLots(): ?bool
    {
        return $this->use_create_lots;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("owner_id")
     */
    public function getOwnerId(): ?OdooRelation
    {
        return $this->owner_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("move_line_exist")
     */
    public function isMoveLineExist(): ?bool
    {
        return $this->move_line_exist;
    }

    /**
     * @param OdooRelation|null $owner_id
     */
    public function setOwnerId(?OdooRelation $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("printed")
     */
    public function isPrinted(): ?bool
    {
        return $this->printed;
    }

    /**
     * @param bool|null $printed
     */
    public function setPrinted(?bool $printed): void
    {
        $this->printed = $printed;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_locked")
     */
    public function isIsLocked(): ?bool
    {
        return $this->is_locked;
    }

    /**
     * @param bool|null $is_locked
     */
    public function setIsLocked(?bool $is_locked): void
    {
        $this->is_locked = $is_locked;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_id")
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_operations")
     */
    public function isShowOperations(): ?bool
    {
        return $this->show_operations;
    }

    /**
     * @param bool|null $show_operations
     */
    public function setShowOperations(?bool $show_operations): void
    {
        $this->show_operations = $show_operations;
    }

    /**
     * @param bool|null $move_line_exist
     */
    public function setMoveLineExist(?bool $move_line_exist): void
    {
        $this->move_line_exist = $move_line_exist;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineNosuggestIds(OdooRelation $item): void
    {
        if (null === $this->move_line_nosuggest_ids) {
            $this->move_line_nosuggest_ids = [];
        }

        if ($this->hasMoveLineNosuggestIds($item)) {
            $index = array_search($item, $this->move_line_nosuggest_ids);
            unset($this->move_line_nosuggest_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("picking_type_entire_packs")
     */
    public function isPickingTypeEntirePacks(): ?bool
    {
        return $this->picking_type_entire_packs;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_ids) {
            return false;
        }

        return in_array($item, $this->move_line_ids);
    }

    /**
     * @param bool|null $picking_type_entire_packs
     */
    public function setPickingTypeEntirePacks(?bool $picking_type_entire_packs): void
    {
        $this->picking_type_entire_packs = $picking_type_entire_packs;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_ids")
     */
    public function getMoveLineIds(): ?array
    {
        return $this->move_line_ids;
    }

    /**
     * @param OdooRelation[]|null $move_line_ids
     */
    public function setMoveLineIds(?array $move_line_ids): void
    {
        $this->move_line_ids = $move_line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineIds($item)) {
            return;
        }

        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        $this->move_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineNosuggestIds(OdooRelation $item): void
    {
        if ($this->hasMoveLineNosuggestIds($item)) {
            return;
        }

        if (null === $this->move_line_nosuggest_ids) {
            $this->move_line_nosuggest_ids = [];
        }

        $this->move_line_nosuggest_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIds(OdooRelation $item): void
    {
        if (null === $this->move_line_ids) {
            $this->move_line_ids = [];
        }

        if ($this->hasMoveLineIds($item)) {
            $index = array_search($item, $this->move_line_ids);
            unset($this->move_line_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_ids_without_package")
     */
    public function getMoveLineIdsWithoutPackage(): ?array
    {
        return $this->move_line_ids_without_package;
    }

    /**
     * @param OdooRelation[]|null $move_line_ids_without_package
     */
    public function setMoveLineIdsWithoutPackage(?array $move_line_ids_without_package): void
    {
        $this->move_line_ids_without_package = $move_line_ids_without_package;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineIdsWithoutPackage(OdooRelation $item): bool
    {
        if (null === $this->move_line_ids_without_package) {
            return false;
        }

        return in_array($item, $this->move_line_ids_without_package);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveLineIdsWithoutPackage(OdooRelation $item): void
    {
        if ($this->hasMoveLineIdsWithoutPackage($item)) {
            return;
        }

        if (null === $this->move_line_ids_without_package) {
            $this->move_line_ids_without_package = [];
        }

        $this->move_line_ids_without_package[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveLineIdsWithoutPackage(OdooRelation $item): void
    {
        if (null === $this->move_line_ids_without_package) {
            $this->move_line_ids_without_package = [];
        }

        if ($this->hasMoveLineIdsWithoutPackage($item)) {
            $index = array_search($item, $this->move_line_ids_without_package);
            unset($this->move_line_ids_without_package[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_line_nosuggest_ids")
     */
    public function getMoveLineNosuggestIds(): ?array
    {
        return $this->move_line_nosuggest_ids;
    }

    /**
     * @param OdooRelation[]|null $move_line_nosuggest_ids
     */
    public function setMoveLineNosuggestIds(?array $move_line_nosuggest_ids): void
    {
        $this->move_line_nosuggest_ids = $move_line_nosuggest_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveLineNosuggestIds(OdooRelation $item): bool
    {
        if (null === $this->move_line_nosuggest_ids) {
            return false;
        }

        return in_array($item, $this->move_line_nosuggest_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.picking';
    }
}
