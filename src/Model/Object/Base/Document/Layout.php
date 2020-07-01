<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Document;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.document.layout
 * Name : base.document.layout
 * Info :
 * Customise the company document layout and display a live preview
 */
final class Layout extends Base
{
    public const ODOO_MODEL_NAME = 'base.document.layout';

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Company Logo
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $logo;

    /**
     * Preview logo
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $preview_logo;

    /**
     * Company Tagline
     * Appears by default on the top right corner of your printed documents (report header).
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_header;

    /**
     * Report Footer
     * Footer text displayed at the bottom of all reports.
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $report_footer;

    /**
     * Paper format
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $paperformat_id;

    /**
     * Document Template
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $external_report_layout_id;

    /**
     * Font
     * Searchable : yes
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> Lato (Lato)
     *     -> Roboto (Roboto)
     *     -> Open_Sans (Open Sans)
     *     -> Montserrat (Montserrat)
     *     -> Oswald (Oswald)
     *     -> Raleway (Raleway)
     *
     *
     * @var string|null
     */
    private $font;

    /**
     * Primary Color
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $primary_color;

    /**
     * Secondary Color
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $secondary_color;

    /**
     * Custom Colors
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $custom_colors;

    /**
     * Logo Primary Color
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $logo_primary_color;

    /**
     * Logo Secondary Color
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $logo_secondary_color;

    /**
     * Report Layout
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_layout_id;

    /**
     * Preview
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $preview;

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
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * @param bool|null $custom_colors
     */
    public function setCustomColors(?bool $custom_colors): void
    {
        $this->custom_colors = $custom_colors;
    }

    /**
     * @return string|null
     */
    public function getLogoPrimaryColor(): ?string
    {
        return $this->logo_primary_color;
    }

    /**
     * @param string|null $logo_primary_color
     */
    public function setLogoPrimaryColor(?string $logo_primary_color): void
    {
        $this->logo_primary_color = $logo_primary_color;
    }

    /**
     * @return string|null
     */
    public function getLogoSecondaryColor(): ?string
    {
        return $this->logo_secondary_color;
    }

    /**
     * @param string|null $logo_secondary_color
     */
    public function setLogoSecondaryColor(?string $logo_secondary_color): void
    {
        $this->logo_secondary_color = $logo_secondary_color;
    }

    /**
     * @return OdooRelation|null
     */
    public function getReportLayoutId(): ?OdooRelation
    {
        return $this->report_layout_id;
    }

    /**
     * @param OdooRelation|null $report_layout_id
     */
    public function setReportLayoutId(?OdooRelation $report_layout_id): void
    {
        $this->report_layout_id = $report_layout_id;
    }

    /**
     * @param string|null $preview
     */
    public function setPreview(?string $preview): void
    {
        $this->preview = $preview;
    }

    /**
     * @param string|null $secondary_color
     */
    public function setSecondaryColor(?string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return bool|null
     */
    public function isCustomColors(): ?bool
    {
        return $this->custom_colors;
    }

    /**
     * @return string|null
     */
    public function getSecondaryColor(): ?string
    {
        return $this->secondary_color;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string|null
     */
    public function getReportFooter(): ?string
    {
        return $this->report_footer;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return int|null
     */
    public function getLogo(): ?int
    {
        return $this->logo;
    }

    /**
     * @param int|null $logo
     */
    public function setLogo(?int $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return int|null
     */
    public function getPreviewLogo(): ?int
    {
        return $this->preview_logo;
    }

    /**
     * @param int|null $preview_logo
     */
    public function setPreviewLogo(?int $preview_logo): void
    {
        $this->preview_logo = $preview_logo;
    }

    /**
     * @return string|null
     */
    public function getReportHeader(): ?string
    {
        return $this->report_header;
    }

    /**
     * @param string|null $report_header
     */
    public function setReportHeader(?string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @param string|null $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param string|null $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaperformatId(): ?OdooRelation
    {
        return $this->paperformat_id;
    }

    /**
     * @param OdooRelation|null $paperformat_id
     */
    public function setPaperformatId(?OdooRelation $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getExternalReportLayoutId(): ?OdooRelation
    {
        return $this->external_report_layout_id;
    }

    /**
     * @param OdooRelation|null $external_report_layout_id
     */
    public function setExternalReportLayoutId(?OdooRelation $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @return string|null
     */
    public function getFont(): ?string
    {
        return $this->font;
    }

    /**
     * @param string|null $font
     */
    public function setFont(?string $font): void
    {
        $this->font = $font;
    }

    /**
     * @return string|null
     */
    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
