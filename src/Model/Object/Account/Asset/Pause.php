<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Asset;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Asset;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.asset.pause
 * Name : account.asset.pause
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Pause extends Base
{
    /**
     * Pause date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Asset
     *
     * @var Asset
     */
    private $asset_id;

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
     * @param DateTimeInterface $date Pause date
     * @param Asset $asset_id Asset
     */
    public function __construct(DateTimeInterface $date, Asset $asset_id)
    {
        $this->date = $date;
        $this->asset_id = $asset_id;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
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
