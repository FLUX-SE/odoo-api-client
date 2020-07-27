<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.report.manager
 * ---
 * Name : account.report.manager
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
final class Manager extends Base
{
    /**
     * Report Name
     * ---
     * name of the model of the report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $report_name;

    /**
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $summary;

    /**
     * Footnotes
     * ---
     * Relation : one2many (account.report.footnote -> manager_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Report\Footnote
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $footnotes_ids;

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
     * Financial Report
     * ---
     * Relation : many2one (account.financial.html.report)
     * @see \Flux\OdooApiClient\Model\Object\Account\Financial\Html\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $financial_report_id;

    /**
     * Partner
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
     * @param string $report_name Report Name
     *        ---
     *        name of the model of the report
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $report_name)
    {
        $this->report_name = $report_name;
    }

    /**
     * @param OdooRelation|null $financial_report_id
     */
    public function setFinancialReportId(?OdooRelation $financial_report_id): void
    {
        $this->financial_report_id = $financial_report_id;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFinancialReportId(): ?OdooRelation
    {
        return $this->financial_report_id;
    }

    /**
     * @return string
     */
    public function getReportName(): string
    {
        return $this->report_name;
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
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFootnotesIds(OdooRelation $item): void
    {
        if (null === $this->footnotes_ids) {
            $this->footnotes_ids = [];
        }

        if ($this->hasFootnotesIds($item)) {
            $index = array_search($item, $this->footnotes_ids);
            unset($this->footnotes_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addFootnotesIds(OdooRelation $item): void
    {
        if ($this->hasFootnotesIds($item)) {
            return;
        }

        if (null === $this->footnotes_ids) {
            $this->footnotes_ids = [];
        }

        $this->footnotes_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFootnotesIds(OdooRelation $item): bool
    {
        if (null === $this->footnotes_ids) {
            return false;
        }

        return in_array($item, $this->footnotes_ids);
    }

    /**
     * @param OdooRelation[]|null $footnotes_ids
     */
    public function setFootnotesIds(?array $footnotes_ids): void
    {
        $this->footnotes_ids = $footnotes_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getFootnotesIds(): ?array
    {
        return $this->footnotes_ids;
    }

    /**
     * @param string|null $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string $report_name
     */
    public function setReportName(string $report_name): void
    {
        $this->report_name = $report_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.report.manager';
    }
}
