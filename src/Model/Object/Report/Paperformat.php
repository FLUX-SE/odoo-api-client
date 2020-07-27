<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : report.paperformat
 * ---
 * Name : report.paperformat
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
final class Paperformat extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Default paper format ?
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $default;

    /**
     * Paper size
     * ---
     * Select Proper Paper size
     * ---
     * Selection : (default value, usually null)
     *     -> A0 (A0  5   841 x 1189 mm)
     *     -> A1 (A1  6   594 x 841 mm)
     *     -> A2 (A2  7   420 x 594 mm)
     *     -> A3 (A3  8   297 x 420 mm)
     *     -> A4 (A4  0   210 x 297 mm, 8.26 x 11.69 inches)
     *     -> A5 (A5  9   148 x 210 mm)
     *     -> A6 (A6  10  105 x 148 mm)
     *     -> A7 (A7  11  74 x 105 mm)
     *     -> A8 (A8  12  52 x 74 mm)
     *     -> A9 (A9  13  37 x 52 mm)
     *     -> B0 (B0  14  1000 x 1414 mm)
     *     -> B1 (B1  15  707 x 1000 mm)
     *     -> B2 (B2  17  500 x 707 mm)
     *     -> B3 (B3  18  353 x 500 mm)
     *     -> B4 (B4  19  250 x 353 mm)
     *     -> B5 (B5  1   176 x 250 mm, 6.93 x 9.84 inches)
     *     -> B6 (B6  20  125 x 176 mm)
     *     -> B7 (B7  21  88 x 125 mm)
     *     -> B8 (B8  22  62 x 88 mm)
     *     -> B9 (B9  23  33 x 62 mm)
     *     -> B10 (B10    16  31 x 44 mm)
     *     -> C5E (C5E 24  163 x 229 mm)
     *     -> Comm10E (Comm10E 25  105 x 241 mm, U.S. Common 10 Envelope)
     *     -> DLE (DLE 26 110 x 220 mm)
     *     -> Executive (Executive 4   7.5 x 10 inches, 190.5 x 254 mm)
     *     -> Folio (Folio 27  210 x 330 mm)
     *     -> Ledger (Ledger  28  431.8 x 279.4 mm)
     *     -> Legal (Legal    3   8.5 x 14 inches, 215.9 x 355.6 mm)
     *     -> Letter (Letter 2 8.5 x 11 inches, 215.9 x 279.4 mm)
     *     -> Tabloid (Tabloid 29 279.4 x 431.8 mm)
     *     -> custom (Custom)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $format;

    /**
     * Top Margin (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $margin_top;

    /**
     * Bottom Margin (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $margin_bottom;

    /**
     * Left Margin (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $margin_left;

    /**
     * Right Margin (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $margin_right;

    /**
     * Page height (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $page_height;

    /**
     * Page width (mm)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $page_width;

    /**
     * Orientation
     * ---
     * Selection : (default value, usually null)
     *     -> Landscape (Landscape)
     *     -> Portrait (Portrait)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $orientation;

    /**
     * Display a header line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $header_line;

    /**
     * Header spacing
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $header_spacing;

    /**
     * Output DPI
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $dpi;

    /**
     * Associated reports
     * ---
     * Explicitly associated reports
     * ---
     * Relation : one2many (ir.actions.report -> paperformat_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Report
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $report_ids;

    /**
     * Print page width (mm)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $print_page_width;

    /**
     * Print page height (mm)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $print_page_height;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $dpi Output DPI
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, int $dpi)
    {
        $this->name = $name;
        $this->dpi = $dpi;
    }

    /**
     * @param float|null $print_page_width
     */
    public function setPrintPageWidth(?float $print_page_width): void
    {
        $this->print_page_width = $print_page_width;
    }

    /**
     * @return int
     */
    public function getDpi(): int
    {
        return $this->dpi;
    }

    /**
     * @param int $dpi
     */
    public function setDpi(int $dpi): void
    {
        $this->dpi = $dpi;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getReportIds(): ?array
    {
        return $this->report_ids;
    }

    /**
     * @param OdooRelation[]|null $report_ids
     */
    public function setReportIds(?array $report_ids): void
    {
        $this->report_ids = $report_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasReportIds(OdooRelation $item): bool
    {
        if (null === $this->report_ids) {
            return false;
        }

        return in_array($item, $this->report_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addReportIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeReportIds(OdooRelation $item): void
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
     * @return float|null
     */
    public function getPrintPageWidth(): ?float
    {
        return $this->print_page_width;
    }

    /**
     * @return float|null
     */
    public function getPrintPageHeight(): ?float
    {
        return $this->print_page_height;
    }

    /**
     * @return int|null
     */
    public function getHeaderSpacing(): ?int
    {
        return $this->header_spacing;
    }

    /**
     * @param float|null $print_page_height
     */
    public function setPrintPageHeight(?float $print_page_height): void
    {
        $this->print_page_height = $print_page_height;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param int|null $header_spacing
     */
    public function setHeaderSpacing(?int $header_spacing): void
    {
        $this->header_spacing = $header_spacing;
    }

    /**
     * @param bool|null $header_line
     */
    public function setHeaderLine(?bool $header_line): void
    {
        $this->header_line = $header_line;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float|null $margin_bottom
     */
    public function setMarginBottom(?float $margin_bottom): void
    {
        $this->margin_bottom = $margin_bottom;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     */
    public function isDefault(): ?bool
    {
        return $this->default;
    }

    /**
     * @param bool|null $default
     */
    public function setDefault(?bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string|null $format
     */
    public function setFormat(?string $format): void
    {
        $this->format = $format;
    }

    /**
     * @return float|null
     */
    public function getMarginTop(): ?float
    {
        return $this->margin_top;
    }

    /**
     * @param float|null $margin_top
     */
    public function setMarginTop(?float $margin_top): void
    {
        $this->margin_top = $margin_top;
    }

    /**
     * @return float|null
     */
    public function getMarginBottom(): ?float
    {
        return $this->margin_bottom;
    }

    /**
     * @return float|null
     */
    public function getMarginLeft(): ?float
    {
        return $this->margin_left;
    }

    /**
     * @return bool|null
     */
    public function isHeaderLine(): ?bool
    {
        return $this->header_line;
    }

    /**
     * @param float|null $margin_left
     */
    public function setMarginLeft(?float $margin_left): void
    {
        $this->margin_left = $margin_left;
    }

    /**
     * @return float|null
     */
    public function getMarginRight(): ?float
    {
        return $this->margin_right;
    }

    /**
     * @param float|null $margin_right
     */
    public function setMarginRight(?float $margin_right): void
    {
        $this->margin_right = $margin_right;
    }

    /**
     * @return int|null
     */
    public function getPageHeight(): ?int
    {
        return $this->page_height;
    }

    /**
     * @param int|null $page_height
     */
    public function setPageHeight(?int $page_height): void
    {
        $this->page_height = $page_height;
    }

    /**
     * @return int|null
     */
    public function getPageWidth(): ?int
    {
        return $this->page_width;
    }

    /**
     * @param int|null $page_width
     */
    public function setPageWidth(?int $page_width): void
    {
        $this->page_width = $page_width;
    }

    /**
     * @return string|null
     */
    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    /**
     * @param string|null $orientation
     */
    public function setOrientation(?string $orientation): void
    {
        $this->orientation = $orientation;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.paperformat';
    }
}
