<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.analytic.distribution
 * Name : account.analytic.distribution
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
final class Distribution extends Base
{
    /**
     * Analytic Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Percentage
     *
     * @var float
     */
    private $percentage;

    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Parent tag
     *
     * @var Tag
     */
    private $tag_id;

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
     * @param Account $account_id Analytic Account
     * @param float $percentage Percentage
     * @param Tag $tag_id Parent tag
     */
    public function __construct(Account $account_id, float $percentage, Tag $tag_id)
    {
        $this->account_id = $account_id;
        $this->percentage = $percentage;
        $this->tag_id = $tag_id;
    }

    /**
     * @return Account
     */
    public function getAccountId(): Account
    {
        return $this->account_id;
    }

    /**
     * @return float
     */
    public function getPercentage(): float
    {
        return $this->percentage;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Tag
     */
    public function getTagId(): Tag
    {
        return $this->tag_id;
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
