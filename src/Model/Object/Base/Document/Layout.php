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
 *
 * Customise the company document layout and display a live preview
 */
final class Layout extends Base
{
    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Company Logo
     *
     * @var int
     */
    private $logo;

    /**
     * Preview logo
     *
     * @var int
     */
    private $preview_logo;

    /**
     * Company Tagline
     *
     * @var string
     */
    private $report_header;

    /**
     * Report Footer
     *
     * @var string
     */
    private $report_footer;

    /**
     * Paper format
     *
     * @var Paperformat
     */
    private $paperformat_id;

    /**
     * Document Template
     *
     * @var View
     */
    private $external_report_layout_id;

    /**
     * Font
     *
     * @var array
     */
    private $font;

    /**
     * Primary Color
     *
     * @var string
     */
    private $primary_color;

    /**
     * Secondary Color
     *
     * @var string
     */
    private $secondary_color;

    /**
     * Custom Colors
     *
     * @var bool
     */
    private $custom_colors;

    /**
     * Logo Primary Color
     *
     * @var string
     */
    private $logo_primary_color;

    /**
     * Logo Secondary Color
     *
     * @var string
     */
    private $logo_secondary_color;

    /**
     * Report Layout
     *
     * @var LayoutAlias
     */
    private $report_layout_id;

    /**
     * Preview
     *
     * @var string
     */
    private $preview;

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
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string $secondary_color
     */
    public function setSecondaryColor(string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getPreview(): string
    {
        return $this->preview;
    }

    /**
     * @param LayoutAlias $report_layout_id
     */
    public function setReportLayoutId(LayoutAlias $report_layout_id): void
    {
        $this->report_layout_id = $report_layout_id;
    }

    /**
     * @return string
     */
    public function getLogoSecondaryColor(): string
    {
        return $this->logo_secondary_color;
    }

    /**
     * @return string
     */
    public function getLogoPrimaryColor(): string
    {
        return $this->logo_primary_color;
    }

    /**
     * @param bool $custom_colors
     */
    public function setCustomColors(bool $custom_colors): void
    {
        $this->custom_colors = $custom_colors;
    }

    /**
     * @param string $primary_color
     */
    public function setPrimaryColor(string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @param int $logo
     */
    public function setLogo(int $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @param array $font
     */
    public function removeFont(array $font): void
    {
        if ($this->hasFont($font)) {
            $index = array_search($font, $this->font);
            unset($this->font[$index]);
        }
    }

    /**
     * @param array $font
     */
    public function addFont(array $font): void
    {
        if ($this->hasFont($font)) {
            return;
        }

        $this->font[] = $font;
    }

    /**
     * @param array $font
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFont(array $font, bool $strict = true): bool
    {
        return in_array($font, $this->font, $strict);
    }

    /**
     * @param array $font
     */
    public function setFont(array $font): void
    {
        $this->font = $font;
    }

    /**
     * @param View $external_report_layout_id
     */
    public function setExternalReportLayoutId(View $external_report_layout_id): void
    {
        $this->external_report_layout_id = $external_report_layout_id;
    }

    /**
     * @param Paperformat $paperformat_id
     */
    public function setPaperformatId(Paperformat $paperformat_id): void
    {
        $this->paperformat_id = $paperformat_id;
    }

    /**
     * @param string $report_footer
     */
    public function setReportFooter(string $report_footer): void
    {
        $this->report_footer = $report_footer;
    }

    /**
     * @param string $report_header
     */
    public function setReportHeader(string $report_header): void
    {
        $this->report_header = $report_header;
    }

    /**
     * @return int
     */
    public function getPreviewLogo(): int
    {
        return $this->preview_logo;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
