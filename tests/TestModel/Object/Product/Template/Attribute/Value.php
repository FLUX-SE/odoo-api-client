<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.template.attribute.value
 * ---
 * Name : product.template.attribute.value
 * ---
 * Info :
 * Materialized relationship between attribute values
 *         and product template generated by the product.template.attribute.line
 */
final class Value extends Base
{
    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $ptav_active;

    /**
     * Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Attribute Value
     * ---
     * Relation : many2one (product.attribute.value)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $product_attribute_value_id;

    /**
     * Attribute Line
     * ---
     * Relation : many2one (product.template.attribute.line)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $attribute_line_id;

    /**
     * Value Price Extra
     * ---
     * Extra price for the variant with this attribute value on sale price. eg. 200 price extra, 1000 + 200 = 1200.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_extra;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Exclude for
     * ---
     * Make this attribute value not compatible with other values of the product or some attribute values of optional
     * and accessory products.
     * ---
     * Relation : one2many (product.template.attribute.exclusion -> product_template_attribute_value_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute\Exclusion
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $exclude_for;

    /**
     * Product Template
     * ---
     * Relation : many2one (product.template)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_tmpl_id;

    /**
     * Attribute
     * ---
     * Relation : many2one (product.attribute)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Attribute
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $attribute_id;

    /**
     * Related Variants
     * ---
     * Relation : many2many (product.product)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $ptav_product_variant_ids;

    /**
     * HTML Color Index
     * ---
     * Here you can set a specific HTML color index (e.g. #ff0000) to display the color if the attribute type is
     * 'Color'.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $html_color;

    /**
     * Is custom value
     * ---
     * Allow users to input custom values for this attribute value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_custom;

    /**
     * Display Type
     * ---
     * The display type used in the Product Configurator.
     * ---
     * Selection :
     *     -> radio (Radio)
     *     -> select (Select)
     *     -> color (Color)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $display_type;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $product_attribute_value_id Attribute Value
     *        ---
     *        Relation : many2one (product.attribute.value)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Attribute\Value
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $attribute_line_id Attribute Line
     *        ---
     *        Relation : many2one (product.template.attribute.line)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Product\Template\Attribute\Line
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $product_attribute_value_id, OdooRelation $attribute_line_id)
    {
        $this->product_attribute_value_id = $product_attribute_value_id;
        $this->attribute_line_id = $attribute_line_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_type")
     */
    public function getDisplayType(): ?string
    {
        return $this->display_type;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPtavProductVariantIds(OdooRelation $item): bool
    {
        if (null === $this->ptav_product_variant_ids) {
            return false;
        }

        return in_array($item, $this->ptav_product_variant_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPtavProductVariantIds(OdooRelation $item): void
    {
        if ($this->hasPtavProductVariantIds($item)) {
            return;
        }

        if (null === $this->ptav_product_variant_ids) {
            $this->ptav_product_variant_ids = [];
        }

        $this->ptav_product_variant_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePtavProductVariantIds(OdooRelation $item): void
    {
        if (null === $this->ptav_product_variant_ids) {
            $this->ptav_product_variant_ids = [];
        }

        if ($this->hasPtavProductVariantIds($item)) {
            $index = array_search($item, $this->ptav_product_variant_ids);
            unset($this->ptav_product_variant_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("html_color")
     */
    public function getHtmlColor(): ?string
    {
        return $this->html_color;
    }

    /**
     * @param string|null $html_color
     */
    public function setHtmlColor(?string $html_color): void
    {
        $this->html_color = $html_color;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_custom")
     */
    public function isIsCustom(): ?bool
    {
        return $this->is_custom;
    }

    /**
     * @param bool|null $is_custom
     */
    public function setIsCustom(?bool $is_custom): void
    {
        $this->is_custom = $is_custom;
    }

    /**
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("ptav_product_variant_ids")
     */
    public function getPtavProductVariantIds(): ?array
    {
        return $this->ptav_product_variant_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
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
     * @param OdooRelation[]|null $ptav_product_variant_ids
     */
    public function setPtavProductVariantIds(?array $ptav_product_variant_ids): void
    {
        $this->ptav_product_variant_ids = $ptav_product_variant_ids;
    }

    /**
     * @param OdooRelation|null $attribute_id
     */
    public function setAttributeId(?OdooRelation $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("ptav_active")
     */
    public function isPtavActive(): ?bool
    {
        return $this->ptav_active;
    }

    /**
     * @param float|null $price_extra
     */
    public function setPriceExtra(?float $price_extra): void
    {
        $this->price_extra = $price_extra;
    }

    /**
     * @param bool|null $ptav_active
     */
    public function setPtavActive(?bool $ptav_active): void
    {
        $this->ptav_active = $ptav_active;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("product_attribute_value_id")
     */
    public function getProductAttributeValueId(): OdooRelation
    {
        return $this->product_attribute_value_id;
    }

    /**
     * @param OdooRelation $product_attribute_value_id
     */
    public function setProductAttributeValueId(OdooRelation $product_attribute_value_id): void
    {
        $this->product_attribute_value_id = $product_attribute_value_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("attribute_line_id")
     */
    public function getAttributeLineId(): OdooRelation
    {
        return $this->attribute_line_id;
    }

    /**
     * @param OdooRelation $attribute_line_id
     */
    public function setAttributeLineId(OdooRelation $attribute_line_id): void
    {
        $this->attribute_line_id = $attribute_line_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("attribute_id")
     */
    public function getAttributeId(): ?OdooRelation
    {
        return $this->attribute_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("exclude_for")
     */
    public function getExcludeFor(): ?array
    {
        return $this->exclude_for;
    }

    /**
     * @param OdooRelation[]|null $exclude_for
     */
    public function setExcludeFor(?array $exclude_for): void
    {
        $this->exclude_for = $exclude_for;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExcludeFor(OdooRelation $item): bool
    {
        if (null === $this->exclude_for) {
            return false;
        }

        return in_array($item, $this->exclude_for);
    }

    /**
     * @param OdooRelation $item
     */
    public function addExcludeFor(OdooRelation $item): void
    {
        if ($this->hasExcludeFor($item)) {
            return;
        }

        if (null === $this->exclude_for) {
            $this->exclude_for = [];
        }

        $this->exclude_for[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExcludeFor(OdooRelation $item): void
    {
        if (null === $this->exclude_for) {
            $this->exclude_for = [];
        }

        if ($this->hasExcludeFor($item)) {
            $index = array_search($item, $this->exclude_for);
            unset($this->exclude_for[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("product_tmpl_id")
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.template.attribute.value';
    }
}