<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Followup;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : followup.send
 * Name : followup.send
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Send extends Base
{
    /**
     * Stamp(s)
     *
     * @var float
     */
    private $snailmail_cost;

    /**
     * Number of letters
     *
     * @var int
     */
    private $letters_qty;

    /**
     * Recipients
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Invalid Addresses Count
     *
     * @var int
     */
    private $invalid_addresses;

    /**
     * Invalid Addresses
     *
     * @var Partner
     */
    private $invalid_partner_ids;

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
     * @return float
     */
    public function getSnailmailCost(): float
    {
        return $this->snailmail_cost;
    }

    /**
     * @return int
     */
    public function getLettersQty(): int
    {
        return $this->letters_qty;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @return int
     */
    public function getInvalidAddresses(): int
    {
        return $this->invalid_addresses;
    }

    /**
     * @return Partner
     */
    public function getInvalidPartnerIds(): Partner
    {
        return $this->invalid_partner_ids;
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
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
