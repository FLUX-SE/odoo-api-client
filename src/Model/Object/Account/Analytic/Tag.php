<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.analytic.tag
 * Name : account.analytic.tag
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
final class Tag extends Base
{
    /**
     * Analytic Tag
     *
     * @var string
     */
    private $name;

    /**
     * Color Index
     *
     * @var null|int
     */
    private $color;

    /**
     * Active
     * Set active to false to hide the Analytic Tag without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Analytic Distribution
     *
     * @var null|bool
     */
    private $active_analytic_distribution;

    /**
     * Analytic Accounts
     *
     * @var null|Distribution[]
     */
    private $analytic_distribution_ids;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

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
     * @param string $name Analytic Tag
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|int
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @return null|bool
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return null|bool
     */
    public function isActiveAnalyticDistribution(): ?bool
    {
        return $this->active_analytic_distribution;
    }

    /**
     * @return null|Distribution[]
     */
    public function getAnalyticDistributionIds(): ?array
    {
        return $this->analytic_distribution_ids;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
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
