<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : product.product
 * Name : product.product
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
final class Product extends Template
{
    /**
     * Variant Price Extra
     * This is the sum of the extra price of all attributes
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $price_extra;

    /**
     * Reference
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

    /**
     * Customer Ref
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $partner_ref;

    /**
     * Product Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_template_attribute_value_ids;

    /**
     * Combination Indices
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $combination_indices;

    /**
     * Variant Image
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_variant_128;

    /**
     * Can Variant Image 1024 be zoomed
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $can_image_variant_1024_be_zoomed;

    /**
     * @param OdooRelation $product_tmpl_id Product Template
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Product Type
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> consu (Consumable)
     *            -> service (Service)
     *
     * @param OdooRelation $categ_id Product Category
     *        Select category for the current product
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        Default unit of measure used for all stock operations.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_po_id Purchase Unit of Measure
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $product_variant_ids Products
     *        Searchable : yes
     *        Sortable : no
     * @param string $sale_line_warn Sales Order Line
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> no-message (No Message)
     *            -> warning (Warning)
     *            -> block (Blocking Message)
     *
     */
    public function __construct(
        OdooRelation $product_tmpl_id,
        string $name,
        string $type,
        OdooRelation $categ_id,
        OdooRelation $uom_id,
        OdooRelation $uom_po_id,
        array $product_variant_ids,
        string $sale_line_warn
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
     * @param string|null $combination_indices
     */
    public function setCombinationIndices(?string $combination_indices): void
    {
        $this->combination_indices = $combination_indices;
    }

    /**
     * @param bool|null $can_image_variant_1024_be_zoomed
     */
    public function setCanImageVariant1024BeZoomed(?bool $can_image_variant_1024_be_zoomed): void
    {
        $this->can_image_variant_1024_be_zoomed = $can_image_variant_1024_be_zoomed;
    }

    /**
     * @return bool|null
     */
    public function isCanImageVariant1024BeZoomed(): ?bool
    {
        return $this->can_image_variant_1024_be_zoomed;
    }

    /**
     * @param int|null $image_variant_128
     */
    public function setImageVariant128(?int $image_variant_128): void
    {
        $this->image_variant_128 = $image_variant_128;
    }

    /**
     * @return int|null
     */
    public function getImageVariant128(): ?int
    {
        return $this->image_variant_128;
    }

    /**
     * @param int|null $image_variant_256
     */
    public function setImageVariant256(?int $image_variant_256): void
    {
        $this->image_variant_256 = $image_variant_256;
    }

    /**
     * @return int|null
     */
    public function getImageVariant256(): ?int
    {
        return $this->image_variant_256;
    }

    /**
     * @param int|null $image_variant_512
     */
    public function setImageVariant512(?int $image_variant_512): void
    {
        $this->image_variant_512 = $image_variant_512;
    }

    /**
     * @return int|null
     */
    public function getImageVariant512(): ?int
    {
        return $this->image_variant_512;
    }

    /**
     * @param int|null $image_variant_1024
     */
    public function setImageVariant1024(?int $image_variant_1024): void
    {
        $this->image_variant_1024 = $image_variant_1024;
    }

    /**
     * @return int|null
     */
    public function getImageVariant1024(): ?int
    {
        return $this->image_variant_1024;
    }

    /**
     * @param int|null $image_variant_1920
     */
    public function setImageVariant1920(?int $image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @return int|null
     */
    public function getImageVariant1920(): ?int
    {
        return $this->image_variant_1920;
    }

    /**
     * @return string|null
     */
    public function getCombinationIndices(): ?string
    {
        return $this->combination_indices;
    }

    /**
     * @return float|null
     */
    public function getPriceExtra(): ?float
    {
        return $this->price_extra;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeProductTemplateAttributeValueIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addProductTemplateAttributeValueIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTemplateAttributeValueIds(OdooRelation $item): bool
    {
        if (null === $this->product_template_attribute_value_ids) {
            return false;
        }

        return in_array($item, $this->product_template_attribute_value_ids);
    }

    /**
     * @param OdooRelation[]|null $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(?array $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getProductTemplateAttributeValueIds(): ?array
    {
        return $this->product_template_attribute_value_ids;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param string|null $partner_ref
     */
    public function setPartnerRef(?string $partner_ref): void
    {
        $this->partner_ref = $partner_ref;
    }

    /**
     * @return string|null
     */
    public function getPartnerRef(): ?string
    {
        return $this->partner_ref;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param float|null $price_extra
     */
    public function setPriceExtra(?float $price_extra): void
    {
        $this->price_extra = $price_extra;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.product';
    }
}
