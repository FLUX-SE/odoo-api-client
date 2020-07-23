<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.account.tag
 * Name : account.account.tag
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
final class Tag extends Base
{
    /**
     * Tag Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Applicability
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> accounts (Accounts)
     *     -> taxes (Taxes)
     *
     *
     * @var string
     */
    private $applicability;

    /**
     * Color Index
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Active
     * Set active to false to hide the Account Tag without removing it.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Tax Report Lines
     * The tax report lines using this tag
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_report_line_ids;

    /**
     * Negate Tax Balance
     * Check this box to negate the absolute value of the balance of the lines associated with this tag in tax report
     * computation.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_negate;

    /**
     * Country
     * Country for which this tag is available, when applied on taxes.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Tag Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $applicability Applicability
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> accounts (Accounts)
     *            -> taxes (Taxes)
     *
     */
    public function __construct(string $name, string $applicability)
    {
        $this->name = $name;
        $this->applicability = $applicability;
    }

    /**
     * @return bool|null
     */
    public function isTaxNegate(): ?bool
    {
        return $this->tax_negate;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param bool|null $tax_negate
     */
    public function setTaxNegate(?bool $tax_negate): void
    {
        $this->tax_negate = $tax_negate;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxReportLineIds(OdooRelation $item): void
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxReportLineIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxReportLineIds(OdooRelation $item): bool
    {
        if (null === $this->tax_report_line_ids) {
            return false;
        }

        return in_array($item, $this->tax_report_line_ids);
    }

    /**
     * @param OdooRelation[]|null $tax_report_line_ids
     */
    public function setTaxReportLineIds(?array $tax_report_line_ids): void
    {
        $this->tax_report_line_ids = $tax_report_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxReportLineIds(): ?array
    {
        return $this->tax_report_line_ids;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param string $applicability
     */
    public function setApplicability(string $applicability): void
    {
        $this->applicability = $applicability;
    }

    /**
     * @return string
     */
    public function getApplicability(): string
    {
        return $this->applicability;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.account.tag';
    }
}
