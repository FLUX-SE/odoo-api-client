<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use Flux\OdooApiClient\Model\Object\Product\Product as ProductAlias;
use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value;
use Flux\OdooApiClient\Model\Object\Uom\Uom;

/**
 * Odoo model : product.product
 * Name : product.product
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
final class Product extends Template
{
    /**
     * Variant Price Extra
     * This is the sum of the extra price of all attributes
     *
     * @var null|float
     */
    private $price_extra;

    /**
     * Reference
     *
     * @var null|string
     */
    private $code;

    /**
     * Customer Ref
     *
     * @var null|string
     */
    private $partner_ref;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     *
     * @var null|Value[]
     */
    private $product_template_attribute_value_ids;

    /**
     * Combination Indices
     *
     * @var null|string
     */
    private $combination_indices;

    /**
     * Variant Image
     *
     * @var null|int
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     *
     * @var null|int
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     *
     * @var null|int
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     *
     * @var null|int
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     *
     * @var null|int
     */
    private $image_variant_128;

    /**
     * Can Variant Image 1024 be zoomed
     *
     * @var null|bool
     */
    private $can_image_variant_1024_be_zoomed;

    /**
     * @param Template $product_tmpl_id Product Template
     * @param string $name Name
     * @param array $type Product Type
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     * @param Category $categ_id Product Category
     *        Select category for the current product
     * @param Uom $uom_id Unit of Measure
     *        Default unit of measure used for all stock operations.
     * @param Uom $uom_po_id Purchase Unit of Measure
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     * @param ProductAlias[] $product_variant_ids Products
     * @param array $sale_line_warn Sales Order Line
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     */
    public function __construct(
        Template $product_tmpl_id,
        string $name,
        array $type,
        Category $categ_id,
        Uom $uom_id,
        Uom $uom_po_id,
        array $product_variant_ids,
        array $sale_line_warn
    ) {
        $this->product_tmpl_id = $product_tmpl_id;
        parent::__construct(
            $name, 
            $type, 
            $categ_id, 
            $uom_id, 
            $uom_po_id, 
            $product_variant_ids, 
            $sale_line_warn
        );
    }

    /**
     * @return null|float
     */
    public function getPriceExtra(): ?float
    {
        return $this->price_extra;
    }

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return null|string
     */
    public function getPartnerRef(): ?string
    {
        return $this->partner_ref;
    }

    /**
     * @param Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param null|Value[] $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(?array $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @param Value $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProductTemplateAttributeValueIds(Value $item, bool $strict = true): bool
    {
        if (null === $this->product_template_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_template_attribute_value_ids, $strict);
    }

    /**
     * @param Value $item
     */
    public function addProductTemplateAttributeValueIds(Value $item): void
    {
        if ($this->hasProductTemplateAttributeValueIds($item)) {
            return;
        }

        if (null === $this->product_template_attribute_value_ids) {
            $this->product_template_attribute_value_ids = [];
        }

        $this->product_template_attribute_value_ids[] = $item;
    }

    /**
     * @param Value $item
     */
    public function removeProductTemplateAttributeValueIds(Value $item): void
    {
        if (null === $this->product_template_attribute_value_ids) {
            $this->product_template_attribute_value_ids = [];
        }

        if ($this->hasProductTemplateAttributeValueIds($item)) {
            $index = array_search($item, $this->product_template_attribute_value_ids);
            unset($this->product_template_attribute_value_ids[$index]);
        }
    }

    /**
     * @return null|string
     */
    public function getCombinationIndices(): ?string
    {
        return $this->combination_indices;
    }

    /**
     * @param null|int $image_variant_1920
     */
    public function setImageVariant1920(?int $image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @return null|int
     */
    public function getImageVariant1024(): ?int
    {
        return $this->image_variant_1024;
    }

    /**
     * @return null|int
     */
    public function getImageVariant512(): ?int
    {
        return $this->image_variant_512;
    }

    /**
     * @return null|int
     */
    public function getImageVariant256(): ?int
    {
        return $this->image_variant_256;
    }

    /**
     * @return null|int
     */
    public function getImageVariant128(): ?int
    {
        return $this->image_variant_128;
    }

    /**
     * @return null|bool
     */
    public function isCanImageVariant1024BeZoomed(): ?bool
    {
        return $this->can_image_variant_1024_be_zoomed;
    }
}
