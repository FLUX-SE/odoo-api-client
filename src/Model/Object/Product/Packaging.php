<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : product.packaging
 * Name : product.packaging
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
final class Packaging extends Base
{
    /**
     * Package Type
     *
     * @var string
     */
    private $name;

    /**
     * Sequence
     * The first in the sequence is the default one.
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Contained Quantity
     * Quantity of products contained in the packaging.
     *
     * @var null|float
     */
    private $qty;

    /**
     * Barcode
     * Barcode used for packaging identification. Scan this packaging barcode from a transfer in the Barcode app to
     * move all the contained units
     *
     * @var null|string
     */
    private $barcode;

    /**
     * Unit of Measure
     * Default unit of measure used for all stock operations.
     *
     * @var null|Uom
     */
    private $product_uom_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

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
     * @param string $name Package Type
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Product $product_id
     */
    public function setProductId(?Product $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @param null|float $qty
     */
    public function setQty(?float $qty): void
    {
        $this->qty = $qty;
    }

    /**
     * @param null|string $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    /**
     * @return null|Uom
     */
    public function getProductUomId(): ?Uom
    {
        return $this->product_uom_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
