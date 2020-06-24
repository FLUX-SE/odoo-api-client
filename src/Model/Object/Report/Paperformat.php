<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Report;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : report.paperformat
 * Name : report.paperformat
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Paperformat extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Default paper format ?
     *
     * @var bool
     */
    private $default;

    /**
     * Paper size
     *
     * @var array
     */
    private $format;

    /**
     * Top Margin (mm)
     *
     * @var float
     */
    private $margin_top;

    /**
     * Bottom Margin (mm)
     *
     * @var float
     */
    private $margin_bottom;

    /**
     * Left Margin (mm)
     *
     * @var float
     */
    private $margin_left;

    /**
     * Right Margin (mm)
     *
     * @var float
     */
    private $margin_right;

    /**
     * Page height (mm)
     *
     * @var int
     */
    private $page_height;

    /**
     * Page width (mm)
     *
     * @var int
     */
    private $page_width;

    /**
     * Orientation
     *
     * @var array
     */
    private $orientation;

    /**
     * Display a header line
     *
     * @var bool
     */
    private $header_line;

    /**
     * Header spacing
     *
     * @var int
     */
    private $header_spacing;

    /**
     * Output DPI
     *
     * @var null|int
     */
    private $dpi;

    /**
     * Associated reports
     *
     * @var Report
     */
    private $report_ids;

    /**
     * Print page width (mm)
     *
     * @var float
     */
    private $print_page_width;

    /**
     * Print page height (mm)
     *
     * @var float
     */
    private $print_page_height;

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
     * @param array $orientation
     */
    public function addOrientation(array $orientation): void
    {
        if ($this->hasOrientation($orientation)) {
            return;
        }

        $this->orientation[] = $orientation;
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
     * @return float
     */
    public function getPrintPageHeight(): float
    {
        return $this->print_page_height;
    }

    /**
     * @return float
     */
    public function getPrintPageWidth(): float
    {
        return $this->print_page_width;
    }

    /**
     * @param Report $report_ids
     */
    public function setReportIds(Report $report_ids): void
    {
        $this->report_ids = $report_ids;
    }

    /**
     * @param null|int $dpi
     */
    public function setDpi(?int $dpi): void
    {
        $this->dpi = $dpi;
    }

    /**
     * @param int $header_spacing
     */
    public function setHeaderSpacing(int $header_spacing): void
    {
        $this->header_spacing = $header_spacing;
    }

    /**
     * @param bool $header_line
     */
    public function setHeaderLine(bool $header_line): void
    {
        $this->header_line = $header_line;
    }

    /**
     * @param array $orientation
     */
    public function removeOrientation(array $orientation): void
    {
        if ($this->hasOrientation($orientation)) {
            $index = array_search($orientation, $this->orientation);
            unset($this->orientation[$index]);
        }
    }

    /**
     * @param array $orientation
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOrientation(array $orientation, bool $strict = true): bool
    {
        return in_array($orientation, $this->orientation, $strict);
    }

    /**
     * @param bool $default
     */
    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @param array $orientation
     */
    public function setOrientation(array $orientation): void
    {
        $this->orientation = $orientation;
    }

    /**
     * @param int $page_width
     */
    public function setPageWidth(int $page_width): void
    {
        $this->page_width = $page_width;
    }

    /**
     * @param int $page_height
     */
    public function setPageHeight(int $page_height): void
    {
        $this->page_height = $page_height;
    }

    /**
     * @param float $margin_right
     */
    public function setMarginRight(float $margin_right): void
    {
        $this->margin_right = $margin_right;
    }

    /**
     * @param float $margin_left
     */
    public function setMarginLeft(float $margin_left): void
    {
        $this->margin_left = $margin_left;
    }

    /**
     * @param float $margin_bottom
     */
    public function setMarginBottom(float $margin_bottom): void
    {
        $this->margin_bottom = $margin_bottom;
    }

    /**
     * @param float $margin_top
     */
    public function setMarginTop(float $margin_top): void
    {
        $this->margin_top = $margin_top;
    }

    /**
     * @param array $format
     */
    public function removeFormat(array $format): void
    {
        if ($this->hasFormat($format)) {
            $index = array_search($format, $this->format);
            unset($this->format[$index]);
        }
    }

    /**
     * @param array $format
     */
    public function addFormat(array $format): void
    {
        if ($this->hasFormat($format)) {
            return;
        }

        $this->format[] = $format;
    }

    /**
     * @param array $format
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFormat(array $format, bool $strict = true): bool
    {
        return in_array($format, $this->format, $strict);
    }

    /**
     * @param array $format
     */
    public function setFormat(array $format): void
    {
        $this->format = $format;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
