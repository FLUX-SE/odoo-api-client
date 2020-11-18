<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Barcodes;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : barcodes.barcode_events_mixin
 * ---
 * Name : barcodes.barcode_events_mixin
 * ---
 * Info :
 * Mixin class for objects reacting when a barcode is scanned in their form views
 *                 which contains `<field name="_barcode_scanned" widget="barcode_handler"/>`.
 *                 Models using this mixin must implement the method on_barcode_scanned. It works
 *                 like an onchange and receives the scanned barcode in parameter.
 */
abstract class BarcodeEventsMixin extends Base
{
    /**
     * Barcode Scanned
     * ---
     * Value of the last barcode scanned.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $_barcode_scanned;

    /**
     * @return string|null
     *
     * @SerializedName("_barcode_scanned")
     */
    public function getBarcodeScanned(): ?string
    {
        return $this->_barcode_scanned;
    }

    /**
     * @param string|null $_barcode_scanned
     */
    public function setBarcodeScanned(?string $_barcode_scanned): void
    {
        $this->_barcode_scanned = $_barcode_scanned;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'barcodes.barcode_events_mixin';
    }
}
