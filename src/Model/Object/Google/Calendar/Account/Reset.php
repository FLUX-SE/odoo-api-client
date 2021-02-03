<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Google\Calendar\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : google.calendar.account.reset
 * ---
 * Name : google.calendar.account.reset
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Reset extends Base
{
    /**
     * User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $user_id;

    /**
     * User's Existing Events
     * ---
     * This will only affect events for which the user is the owner
     * ---
     * Selection :
     *     -> dont_delete (Leave them untouched)
     *     -> delete_google (Delete from the current Google Calendar account)
     *     -> delete_odoo (Delete from Odoo)
     *     -> delete_both (Delete from both)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $delete_policy;

    /**
     * Next Synchronization
     * ---
     * Selection :
     *     -> new (Synchronize only new events)
     *     -> all (Synchronize all existing events)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $sync_policy;

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
     * @param OdooRelation $user_id User
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $delete_policy User's Existing Events
     *        ---
     *        This will only affect events for which the user is the owner
     *        ---
     *        Selection :
     *            -> dont_delete (Leave them untouched)
     *            -> delete_google (Delete from the current Google Calendar account)
     *            -> delete_odoo (Delete from Odoo)
     *            -> delete_both (Delete from both)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $sync_policy Next Synchronization
     *        ---
     *        Selection :
     *            -> new (Synchronize only new events)
     *            -> all (Synchronize all existing events)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $user_id, string $delete_policy, string $sync_policy)
    {
        $this->user_id = $user_id;
        $this->delete_policy = $delete_policy;
        $this->sync_policy = $sync_policy;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation $user_id
     */
    public function setUserId(OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     *
     * @SerializedName("delete_policy")
     */
    public function getDeletePolicy(): string
    {
        return $this->delete_policy;
    }

    /**
     * @param string $delete_policy
     */
    public function setDeletePolicy(string $delete_policy): void
    {
        $this->delete_policy = $delete_policy;
    }

    /**
     * @return string
     *
     * @SerializedName("sync_policy")
     */
    public function getSyncPolicy(): string
    {
        return $this->sync_policy;
    }

    /**
     * @param string $sync_policy
     */
    public function setSyncPolicy(string $sync_policy): void
    {
        $this->sync_policy = $sync_policy;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'google.calendar.account.reset';
    }
}
