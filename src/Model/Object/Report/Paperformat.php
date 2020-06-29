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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Default paper format ?
     *
     * @var null|bool
     */
    private $default;

    /**
     * Paper size
     * Select Proper Paper size
     *
     * @var null|array
     */
    private $format;

    /**
     * Top Margin (mm)
     *
     * @var null|float
     */
    private $margin_top;

    /**
     * Bottom Margin (mm)
     *
     * @var null|float
     */
    private $margin_bottom;

    /**
     * Left Margin (mm)
     *
     * @var null|float
     */
    private $margin_left;

    /**
     * Right Margin (mm)
     *
     * @var null|float
     */
    private $margin_right;

    /**
     * Page height (mm)
     *
     * @var null|int
     */
    private $page_height;

    /**
     * Page width (mm)
     *
     * @var null|int
     */
    private $page_width;

    /**
     * Orientation
     *
     * @var null|array
     */
    private $orientation;

    /**
     * Display a header line
     *
     * @var null|bool
     */
    private $header_line;

    /**
     * Header spacing
     *
     * @var null|int
     */
    private $header_spacing;

    /**
     * Output DPI
     *
     * @var int
     */
    private $dpi;

    /**
     * Associated reports
     * Explicitly associated reports
     *
     * @var null|Report[]
     */
    private $report_ids;

    /**
     * Print page width (mm)
     *
     * @var null|float
     */
    private $print_page_width;

    /**
     * Print page height (mm)
     *
     * @var null|float
     */
    private $print_page_height;

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
     * @param string $name Name
     * @param int $dpi Output DPI
     */
    public function __construct(string $name, int $dpi)
    {
        $this->name = $name;
        $this->dpi = $dpi;
    }

    /**
     * @param mixed $item
     */
    public function removeOrientation($item): void
    {
        if (null === $this->orientation) {
            $this->orientation = [];
        }

        if ($this->hasOrientation($item)) {
            $index = array_search($item, $this->orientation);
            unset($this->orientation[$index]);
        }
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
     * @return null|float
     */
    public function getPrintPageHeight(): ?float
    {
        return $this->print_page_height;
    }

    /**
     * @return null|float
     */
    public function getPrintPageWidth(): ?float
    {
        return $this->print_page_width;
    }

    /**
     * @param Report $item
     */
    public function removeReportIds(Report $item): void
    {
        if (null === $this->report_ids) {
            $this->report_ids = [];
        }

        if ($this->hasReportIds($item)) {
            $index = array_search($item, $this->report_ids);
            unset($this->report_ids[$index]);
        }
    }

    /**
     * @param Report $item
     */
    public function addReportIds(Report $item): void
    {
        if ($this->hasReportIds($item)) {
            return;
        }

        if (null === $this->report_ids) {
            $this->report_ids = [];
        }

        $this->report_ids[] = $item;
    }

    /**
     * @param Report $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasReportIds(Report $item, bool $strict = true): bool
    {
        if (null === $this->report_ids) {
            return false;
        }

        return in_array($item, $this->report_ids, $strict);
    }

    /**
     * @param null|Report[] $report_ids
     */
    public function setReportIds(?array $report_ids): void
    {
        $this->report_ids = $report_ids;
    }

    /**
     * @param int $dpi
     */
    public function setDpi(int $dpi): void
    {
        $this->dpi = $dpi;
    }

    /**
     * @param null|int $header_spacing
     */
    public function setHeaderSpacing(?int $header_spacing): void
    {
        $this->header_spacing = $header_spacing;
    }

    /**
     * @param null|bool $header_line
     */
    public function setHeaderLine(?bool $header_line): void
    {
        $this->header_line = $header_line;
    }

    /**
     * @param mixed $item
     */
    public function addOrientation($item): void
    {
        if ($this->hasOrientation($item)) {
            return;
        }

        if (null === $this->orientation) {
            $this->orientation = [];
        }

        $this->orientation[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasOrientation($item, bool $strict = true): bool
    {
        if (null === $this->orientation) {
            return false;
        }

        return in_array($item, $this->orientation, $strict);
    }

    /**
     * @param null|array $orientation
     */
    public function setOrientation(?array $orientation): void
    {
        $this->orientation = $orientation;
    }

    /**
     * @param null|int $page_width
     */
    public function setPageWidth(?int $page_width): void
    {
        $this->page_width = $page_width;
    }

    /**
     * @param null|int $page_height
     */
    public function setPageHeight(?int $page_height): void
    {
        $this->page_height = $page_height;
    }

    /**
     * @param null|float $margin_right
     */
    public function setMarginRight(?float $margin_right): void
    {
        $this->margin_right = $margin_right;
    }

    /**
     * @param null|float $margin_left
     */
    public function setMarginLeft(?float $margin_left): void
    {
        $this->margin_left = $margin_left;
    }

    /**
     * @param null|float $margin_bottom
     */
    public function setMarginBottom(?float $margin_bottom): void
    {
        $this->margin_bottom = $margin_bottom;
    }

    /**
     * @param null|float $margin_top
     */
    public function setMarginTop(?float $margin_top): void
    {
        $this->margin_top = $margin_top;
    }

    /**
     * @param mixed $item
     */
    public function removeFormat($item): void
    {
        if (null === $this->format) {
            $this->format = [];
        }

        if ($this->hasFormat($item)) {
            $index = array_search($item, $this->format);
            unset($this->format[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addFormat($item): void
    {
        if ($this->hasFormat($item)) {
            return;
        }

        if (null === $this->format) {
            $this->format = [];
        }

        $this->format[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFormat($item, bool $strict = true): bool
    {
        if (null === $this->format) {
            return false;
        }

        return in_array($item, $this->format, $strict);
    }

    /**
     * @param null|array $format
     */
    public function setFormat(?array $format): void
    {
        $this->format = $format;
    }

    /**
     * @param null|bool $default
     */
    public function setDefault(?bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
