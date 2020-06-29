<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Document;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Report\Layout as LayoutAlias;
use Flux\OdooApiClient\Model\Object\Report\Paperformat;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.document.layout
 * Name : base.document.layout
 * Info :
 * Customise the company document layout and display a live preview
 */
final class Layout extends Base
{
    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Company Logo
     *
     * @var null|int
     */
    private $logo;

    /**
     * Preview logo
     *
     * @var null|int
     */
    private $preview_logo;

    /**
     * Company Tagline
     * Appears by default on the top right corner of your printed documents (report header).
     *
     * @var null|string
     */
    private $report_header;

    /**
     * Report Footer
     * Footer text displayed at the bottom of all reports.
     *
     * @var null|string
     */
    private $report_footer;

    /**
     * Paper format
     *
     * @var null|Paperformat
     */
    private $paperformat_id;

    /**
     * Document Template
     *
     * @var null|View
     */
    private $external_report_layout_id;

    /**
     * Font
     *
     * @var null|array
     */
    private $font;

    /**
     * Primary Color
     *
     * @var null|string
     */
    private $primary_color;

    /**
     * Secondary Color
     *
     * @var null|string
     */
    private $secondary_color;

    /**
     * Custom Colors
     *
     * @var null|bool
     */
    private $custom_colors;

    /**
     * Logo Primary Color
     *
     * @var null|string
     */
    private $logo_primary_color;

    /**
     * Logo Secondary Color
     *
     * @var null|string
     */
    private $logo_secondary_color;

    /**
     * Report Layout
     *
     * @var null|LayoutAlias
     */
    private $report_layout_id;

    /**
     * Preview
     *
     * @var null|string
     */
    private $preview;

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
     * @param Company $company_id Company
     */
    public function __construct(Company $company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|string $primary_color
     */
    public function setPrimaryColor(?string $primary_color): void
    {
        $this->primary_color = $primary_color;
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
     * @return null|string
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * @param null|LayoutAlias $report_layout_id
     */
    public function setReportLayoutId(?LayoutAlias $report_layout_id): void
    {
        $this->report_layout_id = $report_layout_id;
    }

    /**
     * @return null|string
     */
    public function getLogoSecondaryColor(): ?string
    {
        return $this->logo_secondary_color;
    }

    /**
     * @return null|string
     */
    public function getLogoPrimaryColor(): ?string
    {
        return $this->logo_primary_color;
    }

    /**
     * @param null|bool $custom_colors
     */
    public function setCustomColors(?bool $custom_colors): void
    {
        $this->custom_colors = $custom_colors;
    }

    /**
     * @param null|string $secondary_color
     */
    public function setSecondaryColor(?string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @param mixed $item
     */
    public function removeFont($item): void
    {
        if (null === $this->font) {
            $this->font = [];
        }

        if ($this->hasFont($item)) {
            $index = array_search($item, $this->font);
            unset($this->font[$index]);
        }
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param mixed $item
     */
    public function addFont($item): void
    {
        if ($this->hasFont($item)) {
            return;
        }

        if (null === $this->font) {
            $this->font = [];
        }

        $this->font[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFont($item, bool $strict = true): bool
    {
        if (null === $this->font) {
            return false;
        }

        return in_array($item, $this->font, $strict);
    }

    /**
     * @param null|array $font
     */
    public function setFont(?array $font): void
    {
        $this->font = $font;
    }

    /**
     * @param null|View $external_report_layout_id
     */
    public function setExternalReportLayoutId(?View $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param null|Paperformat $paperformat_id
     */
    public function setPaperformatId(?Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param null|string $report_footer
     */
    public function setReportFooter(?string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param null|string $report_header
     */
    public function setReportHeader(?string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @return null|int
     */
    public function getPreviewLogo(): ?int
    {
        return $this->preview_logo;
    }

    /**
     * @param null|int $logo
     */
    public function setLogo(?int $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
