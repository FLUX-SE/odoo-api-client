<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value;

/**
 * Odoo model : product.product
 * Name : product.product
 *
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
     *
     * @var float
     */
    private $price_extra;

    /**
     * Reference
     *
     * @var string
     */
    private $code;

    /**
     * Customer Ref
     *
     * @var string
     */
    private $partner_ref;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Attribute Values
     *
     * @var Value
     */
    private $product_template_attribute_value_ids;

    /**
     * Combination Indices
     *
     * @var string
     */
    private $combination_indices;

    /**
     * Variant Image
     *
     * @var int
     */
    private $image_variant_1920;

    /**
     * Variant Image 1024
     *
     * @var int
     */
    private $image_variant_1024;

    /**
     * Variant Image 512
     *
     * @var int
     */
    private $image_variant_512;

    /**
     * Variant Image 256
     *
     * @var int
     */
    private $image_variant_256;

    /**
     * Variant Image 128
     *
     * @var int
     */
    private $image_variant_128;

    /**
     * Can Variant Image 1024 be zoomed
     *
     * @var bool
     */
    private $can_image_variant_1024_be_zoomed;

    /**
     * @return float
     */
    public function getPriceExtra(): float
    {
        return $this->price_extra;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getPartnerRef(): string
    {
        return $this->partner_ref;
    }

    /**
     * @param null|Template $product_tmpl_id
     */
    public function setProductTmplId(Template $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @param Value $product_template_attribute_value_ids
     */
    public function setProductTemplateAttributeValueIds(Value $product_template_attribute_value_ids): void
    {
        $this->product_template_attribute_value_ids = $product_template_attribute_value_ids;
    }

    /**
     * @return string
     */
    public function getCombinationIndices(): string
    {
        return $this->combination_indices;
    }

    /**
     * @param int $image_variant_1920
     */
    public function setImageVariant1920(int $image_variant_1920): void
    {
        $this->image_variant_1920 = $image_variant_1920;
    }

    /**
     * @return int
     */
    public function getImageVariant1024(): int
    {
        return $this->image_variant_1024;
    }

    /**
     * @return int
     */
    public function getImageVariant512(): int
    {
        return $this->image_variant_512;
    }

    /**
     * @return int
     */
    public function getImageVariant256(): int
    {
        return $this->image_variant_256;
    }

    /**
     * @return int
     */
    public function getImageVariant128(): int
    {
        return $this->image_variant_128;
    }

    /**
     * @return bool
     */
    public function isCanImageVariant1024BeZoomed(): bool
    {
        return $this->can_image_variant_1024_be_zoomed;
    }
}
