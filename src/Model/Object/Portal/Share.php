<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : portal.share
 * Name : portal.share
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Share extends Base
{
    /**
     * Related Document Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Related Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Recipients
     *
     * @var Partner[]
     */
    private $partner_ids;

    /**
     * Note
     * Add extra content to display in the email
     *
     * @var null|string
     */
    private $note;

    /**
     * Link
     *
     * @var null|string
     */
    private $share_link;

    /**
     * Access warning
     *
     * @var null|string
     */
    private $access_warning;

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
     * @param string $res_model Related Document Model
     * @param int $res_id Related Document ID
     * @param Partner[] $partner_ids Recipients
     */
    public function __construct(string $res_model, int $res_id, array $partner_ids)
    {
        $this->res_model = $res_model;
        $this->res_id = $res_id;
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param Partner[] $partner_ids
     */
    public function setPartnerIds(array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerIds(Partner $item, bool $strict = true): bool
    {
        return in_array($item, $this->partner_ids, $strict);
    }

    /**
     * @param Partner $item
     */
    public function addPartnerIds(Partner $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param Partner $item
     */
    public function removePartnerIds(Partner $item): void
    {
        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return null|string
     */
    public function getShareLink(): ?string
    {
        return $this->share_link;
    }

    /**
     * @return null|string
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
