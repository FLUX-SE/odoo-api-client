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
     * Tag Name
     *
     * @var string
     */
    private $name;

    /**
     * Applicability
     *
     * @var array
     */
    private $applicability;

    /**
     * Color Index
     *
     * @var null|int
     */
    private $color;

    /**
     * Active
     * Set active to false to hide the Account Tag without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Tax Report Lines
     * The tax report lines using this tag
     *
     * @var null|Line[]
     */
    private $tax_report_line_ids;

    /**
     * Negate Tax Balance
     * Check this box to negate the absolute value of the balance of the lines associated with this tag in tax report
     * computation.
     *
     * @var null|bool
     */
    private $tax_negate;

    /**
     * Country
     * Country for which this tag is available, when applied on taxes.
     *
     * @var null|Country
     */
    private $country_id;

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
     * @param string $name Tag Name
     * @param array $applicability Applicability
     */
    public function __construct(string $name, array $applicability)
    {
        $this->name = $name;
        $this->applicability = $applicability;
    }

    /**
     * @param Line $item
     */
    public function addTaxReportLineIds(Line $item): void
    {
        if ($this->hasTaxReportLineIds($item)) {
            return;
        }

        if (null === $this->tax_report_line_ids) {
            $this->tax_report_line_ids = [];
        }

        $this->tax_report_line_ids[] = $item;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|bool $tax_negate
     */
    public function setTaxNegate(?bool $tax_negate): void
    {
        $this->tax_negate = $tax_negate;
    }

    /**
     * @param Line $item
     */
    public function removeTaxReportLineIds(Line $item): void
    {
        if (null === $this->tax_report_line_ids) {
            $this->tax_report_line_ids = [];
        }

        if ($this->hasTaxReportLineIds($item)) {
            $index = array_search($item, $this->tax_report_line_ids);
            unset($this->tax_report_line_ids[$index]);
        }
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxReportLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->tax_report_line_ids) {
            return false;
        }

        return in_array($item, $this->tax_report_line_ids, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Line[] $tax_report_line_ids
     */
    public function setTaxReportLineIds(?array $tax_report_line_ids): void
    {
        $this->tax_report_line_ids = $tax_report_line_ids;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|int $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @param mixed $item
     */
    public function removeApplicability($item): void
    {
        if ($this->hasApplicability($item)) {
            $index = array_search($item, $this->applicability);
            unset($this->applicability[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addApplicability($item): void
    {
        if ($this->hasApplicability($item)) {
            return;
        }

        $this->applicability[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasApplicability($item, bool $strict = true): bool
    {
        return in_array($item, $this->applicability, $strict);
    }

    /**
     * @param array $applicability
     */
    public function setApplicability(array $applicability): void
    {
        $this->applicability = $applicability;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
