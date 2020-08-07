<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.product
 * ---
 * Name : product.product
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
final class Product extends Template
{
    /**
     * Variant Price Extra
     * ---
     * This is the sum of the extra price of all attributes
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $price_extra;

    /**
     * Reference
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $code;

    /**
     * Customer Ref
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $partner_ref;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     * ---
     * Relation : many2many (product.template.attribute.value)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_template_attribute_value_ids;

    /**
     * Combination Indices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $combination_indices;

    /**
     * Variant Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_variant_128;

    /**
     * Can Variant Image 1024 be zoomed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $can_image_variant_1024_be_zoomed;

    /**
     * @param OdooRelation $product_tmpl_id Product Template
     *        ---
     *        Relation : many2one (product.template)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Product Type
     *        ---
     *        A storable product is a product for which you manage stock. The Inventory app has to be installed.
     *        A consumable product is a product for which stock is not managed.
     *        A service is a non-material product you provide.
     *        ---
     *        Selection :
     *            -> consu (Consumable)
     *            -> service (Service)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $categ_id Product Category
     *        ---
     *        Select category for the current product
     *        ---
     *        Relation : many2one (product.category)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Category
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_id Unit of Measure
     *        ---
     *        Default unit of measure used for all stock operations.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $uom_po_id Purchase Unit of Measure
     *        ---
     *        Default unit of measure used for purchase orders. It must be in the same category as the default unit of
     *        measure.
     *        ---
     *        Relation : many2one (uom.uom)
     *        @see \Flux\OdooApiClient\Model\Object\Uom\Uom
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $product_variant_ids Products
     *        ---
     *        Relation : one2many (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $sale_line_warn Sales Order Line
     *        ---
     *        Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     *        exception with the message and block the flow. The Message has to be written in the next field.
     *        ---
     *        Selection :
     *            -> no-message (No Message)
     *            -> warning (Warning)
     *            -> block (Blocking Message)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
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
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImageVariant256($item): bool
    {
        if (null === $this->image_variant_256) {
            return false;
        }

        return in_array($item, $this->image_variant_256);
    }

    /**
     * @param mixed $item
     */
    public function removeImageVariant1024($item): void
    {
        if (null === $this->image_variant_1024) {
            $this->image_variant_1024 = [];
        }

        if ($this->hasImageVariant1024($item)) {
            $index = array_search($item, $this->image_variant_1024);
            unset($this->image_variant_1024[$index]);
        }
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_variant_512")
     */
    public function getImageVariant512(): ?array
    {
        return $this->image_variant_512;
    }

    /**
     * @param array|null $image_variant_512
     */
    public function setImageVariant512(?array $image_variant_512): void
    {
        $this->image_variant_512 = $image_variant_512;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImageVariant512($item): bool
    {
        if (null === $this->image_variant_512) {
            return false;
        }

        return in_array($item, $this->image_variant_512);
    }

    /**
     * @param mixed $item
     */
    public function addImageVariant512($item): void
    {
        if ($this->hasImageVariant512($item)) {
            return;
        }

        if (null === $this->image_variant_512) {
            $this->image_variant_512 = [];
        }

        $this->image_variant_512[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeImageVariant512($item): void
    {
        if (null === $this->image_variant_512) {
            $this->image_variant_512 = [];
        }

        if ($this->hasImageVariant512($item)) {
            $index = array_search($item, $this->image_variant_512);
            unset($this->image_variant_512[$index]);
        }
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_variant_256")
     */
    public function getImageVariant256(): ?array
    {
        return $this->image_variant_256;
    }

    /**
     * @param array|null $image_variant_256
     */
    public function setImageVariant256(?array $image_variant_256): void
    {
        $this->image_variant_256 = $image_variant_256;
    }

    /**
     * @param mixed $item
     */
    public function addImageVariant256($item): void
    {
        if ($this->hasImageVariant256($item)) {
            return;
        }

        if (null === $this->image_variant_256) {
            $this->image_variant_256 = [];
        }

        $this->image_variant_256[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImageVariant1024($item): bool
    {
        if (null === $this->image_variant_1024) {
            return false;
        }

        return in_array($item, $this->image_variant_1024);
    }

    /**
     * @param mixed $item
     */
    public function removeImageVariant256($item): void
    {
        if (null === $this->image_variant_256) {
            $this->image_variant_256 = [];
        }

        if ($this->hasImageVariant256($item)) {
            $index = array_search($item, $this->image_variant_256);
            unset($this->image_variant_256[$index]);
        }
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_variant_128")
     */
    public function getImageVariant128(): ?array
    {
        return $this->image_variant_128;
    }

    /**
     * @param array|null $image_variant_128
     */
    public function setImageVariant128(?array $image_variant_128): void
    {
        $this->image_variant_128 = $image_variant_128;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImageVariant128($item): bool
    {
        if (null === $this->image_variant_128) {
            return false;
        }

        return in_array($item, $this->image_variant_128);
    }

    /**
     * @param mixed $item
     */
    public function addImageVariant128($item): void
    {
        if ($this->hasImageVariant128($item)) {
            return;
        }

        if (null === $this->image_variant_128) {
            $this->image_variant_128 = [];
        }

        $this->image_variant_128[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeImageVariant128($item): void
    {
        if (null === $this->image_variant_128) {
            $this->image_variant_128 = [];
        }

        if ($this->hasImageVariant128($item)) {
            $index = array_search($item, $this->image_variant_128);
            unset($this->image_variant_128[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("can_image_variant_1024_be_zoomed")
     */
    public function isCanImageVariant1024BeZoomed(): ?bool
    {
        return $this->can_image_variant_1024_be_zoomed;
    }

    /**
     * @param bool|null $can_image_variant_1024_be_zoomed
     */
    public function setCanImageVariant1024BeZoomed(?bool $can_image_variant_1024_be_zoomed): void
    {
        $this->can_image_variant_1024_be_zoomed = $can_image_variant_1024_be_zoomed;
    }

    /**
     * @param mixed $item
     */
    public function addImageVariant1024($item): void
    {
        if ($this->hasImageVariant1024($item)) {
            return;
        }

        if (null === $this->image_variant_1024) {
            $this->image_variant_1024 = [];
        }

        $this->image_variant_1024[] = $item;
    }

    /**
     * @param array|null $image_variant_1024
     */
    public function setImageVariant1024(?array $image_variant_1024): void
    {
        $this->image_variant_1024 = $image_variant_1024;
    }

    /**
     * @return float|null
     *
     * @SerializedName("price_extra")
     */
    public function getPriceExtra(): ?float
    {
        return $this->price_extra;
    }

    /**
     * @param OdooRelation[]|null $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(?array $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @param float|null $price_extra
     */
    public function setPriceExtra(?float $price_extra): void
    {
        $this->price_extra = $price_extra;
    }

    /**
     * @return string|null
     *
     * @SerializedName("code")
     */
    public function getCode(): ?string
    {
        return $this->code;
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
     *
     * @SerializedName("partner_ref")
     */
    public function getPartnerRef(): ?string
    {
        return $this->partner_ref;
    }

    /**
     * @param string|null $partner_ref
     */
    public function setPartnerRef(?string $partner_ref): void
    {
        $this->partner_ref = $partner_ref;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation $product_tmpl_id
     */
    public function setProductTmplId(OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_template_attribute_value_ids")
     */
    public function getProductTemplateAttributeValueIds(): ?array
    {
        return $this->product_template_attribute_value_ids;
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
     * @return array|null
     *
     * @SerializedName("image_variant_1024")
     */
    public function getImageVariant1024(): ?array
    {
        return $this->image_variant_1024;
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
     * @return string|null
     *
     * @SerializedName("combination_indices")
     */
    public function getCombinationIndices(): ?string
    {
        return $this->combination_indices;
    }

    /**
     * @param string|null $combination_indices
     */
    public function setCombinationIndices(?string $combination_indices): void
    {
        $this->combination_indices = $combination_indices;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_variant_1920")
     */
    public function getImageVariant1920(): ?array
    {
        return $this->image_variant_1920;
    }

    /**
     * @param array|null $image_variant_1920
     */
    public function setImageVariant1920(?array $image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImageVariant1920($item): bool
    {
        if (null === $this->image_variant_1920) {
            return false;
        }

        return in_array($item, $this->image_variant_1920);
    }

    /**
     * @param mixed $item
     */
    public function addImageVariant1920($item): void
    {
        if ($this->hasImageVariant1920($item)) {
            return;
        }

        if (null === $this->image_variant_1920) {
            $this->image_variant_1920 = [];
        }

        $this->image_variant_1920[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeImageVariant1920($item): void
    {
        if (null === $this->image_variant_1920) {
            $this->image_variant_1920 = [];
        }

        if ($this->hasImageVariant1920($item)) {
            $index = array_search($item, $this->image_variant_1920);
            unset($this->image_variant_1920[$index]);
        }
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.product';
    }
}
