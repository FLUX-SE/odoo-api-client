<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Tax\Report\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.account.tag
 * Name : account.account.tag
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
final class Tag extends Base
{
    /**
     * Tag Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Applicability
     *
     * @var null|array
     */
    private $applicability;

    /**
     * Color Index
     *
     * @var int
     */
    private $color;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Tax Report Lines
     *
     * @var Line
     */
    private $tax_report_line_ids;

    /**
     * Negate Tax Balance
     *
     * @var bool
     */
    private $tax_negate;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

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
     * @param null|array $applicability
     */
    public function setApplicability(?array $applicability): void
    {
        $this->applicability = $applicability;
    }

    /**
     * @param ?array $applicability
     * @param bool $strict
     *
     * @return bool
     */
    public function hasApplicability(?array $applicability, bool $strict = true): bool
    {
        if (null === $this->applicability) {
            return false;
        }

        return in_array($applicability, $this->applicability, $strict);
    }

    /**
     * @param ?array $applicability
     */
    public function addApplicability(?array $applicability): void
    {
        if ($this->hasApplicability($applicability)) {
            return;
        }

        if (null === $this->applicability) {
            $this->applicability = [];
        }

        $this->applicability[] = $applicability;
    }

    /**
     * @param ?array $applicability
     */
    public function removeApplicability(?array $applicability): void
    {
        if ($this->hasApplicability($applicability)) {
            $index = array_search($applicability, $this->applicability);
            unset($this->applicability[$index]);
        }
    }

    /**
     * @param int $color
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Line $tax_report_line_ids
     */
    public function setTaxReportLineIds(Line $tax_report_line_ids): void
    {
        $this->tax_report_line_ids = $tax_report_line_ids;
    }

    /**
     * @param bool $tax_negate
     */
    public function setTaxNegate(bool $tax_negate): void
    {
        $this->tax_negate = $tax_negate;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
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
