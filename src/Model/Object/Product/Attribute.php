<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.attribute
 * ---
 * Name : product.attribute
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
final class Attribute extends Base
{
    /**
     * Attribute
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Values
     * ---
     * Relation : one2many (product.attribute.value -> attribute_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $value_ids;

    /**
     * Sequence
     * ---
     * Determine the display order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Lines
     * ---
     * Relation : one2many (product.template.attribute.line -> attribute_id)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attribute_line_ids;

    /**
     * Variants Creation Mode
     * ---
     * - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     *                 - Dynamically: Each variant is created only when its corresponding attributes and values are
     * added to a sales order.
     *                 - Never: Variants are never created for the attribute.
     *                 Note: the variants creation mode cannot be changed once the attribute is used on at least one
     * product.
     * ---
     * Selection :
     *     -> always (Instantly)
     *     -> dynamic (Dynamically)
     *     -> no_variant (Never)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $create_variant;

    /**
     * Used on Products
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_used_on_products;

    /**
     * Related Products
     * ---
     * Relation : many2many (product.template)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $product_tmpl_ids;

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
     * @param string $name Attribute
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $create_variant Variants Creation Mode
     *        ---
     *        - Instantly: All possible variants are created as soon as the attribute and its values are added to a product.
     *                        - Dynamically: Each variant is created only when its corresponding attributes and values are
     *        added to a sales order.
     *                        - Never: Variants are never created for the attribute.
     *                        Note: the variants creation mode cannot be changed once the attribute is used on at least one
     *        product.
     *        ---
     *        Selection :
     *            -> always (Instantly)
     *            -> dynamic (Dynamically)
     *            -> no_variant (Never)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $create_variant)
    {
        $this->name = $name;
        $this->create_variant = $create_variant;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_used_on_products")
     */
    public function isIsUsedOnProducts(): ?bool
    {
        return $this->is_used_on_products;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param OdooRelation $item
     */
    public function removeProductTmplIds(OdooRelation $item): void
    {
        if (null === $this->product_tmpl_ids) {
            $this->product_tmpl_ids = [];
        }

        if ($this->hasProductTmplIds($item)) {
            $index = array_search($item, $this->product_tmpl_ids);
            unset($this->product_tmpl_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addProductTmplIds(OdooRelation $item): void
    {
        if ($this->hasProductTmplIds($item)) {
            return;
        }

        if (null === $this->product_tmpl_ids) {
            $this->product_tmpl_ids = [];
        }

        $this->product_tmpl_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasProductTmplIds(OdooRelation $item): bool
    {
        if (null === $this->product_tmpl_ids) {
            return false;
        }

        return in_array($item, $this->product_tmpl_ids);
    }

    /**
     * @param OdooRelation[]|null $product_tmpl_ids
     */
    public function setProductTmplIds(?array $product_tmpl_ids): void
    {
        $this->product_tmpl_ids = $product_tmpl_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("product_tmpl_ids")
     */
    public function getProductTmplIds(): ?array
    {
        return $this->product_tmpl_ids;
    }

    /**
     * @param bool|null $is_used_on_products
     */
    public function setIsUsedOnProducts(?bool $is_used_on_products): void
    {
        $this->is_used_on_products = $is_used_on_products;
    }

    /**
     * @param string $create_variant
     */
    public function setCreateVariant(string $create_variant): void
    {
        $this->create_variant = $create_variant;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     *
     * @SerializedName("create_variant")
     */
    public function getCreateVariant(): string
    {
        return $this->create_variant;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttributeLineIds(OdooRelation $item): void
    {
        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        if ($this->hasAttributeLineIds($item)) {
            $index = array_search($item, $this->attribute_line_ids);
            unset($this->attribute_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttributeLineIds(OdooRelation $item): void
    {
        if ($this->hasAttributeLineIds($item)) {
            return;
        }

        if (null === $this->attribute_line_ids) {
            $this->attribute_line_ids = [];
        }

        $this->attribute_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttributeLineIds(OdooRelation $item): bool
    {
        if (null === $this->attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->attribute_line_ids);
    }

    /**
     * @param OdooRelation[]|null $attribute_line_ids
     */
    public function setAttributeLineIds(?array $attribute_line_ids): void
    {
        $this->attribute_line_ids = $attribute_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("attribute_line_ids")
     */
    public function getAttributeLineIds(): ?array
    {
        return $this->attribute_line_ids;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeValueIds(OdooRelation $item): void
    {
        if (null === $this->value_ids) {
            $this->value_ids = [];
        }

        if ($this->hasValueIds($item)) {
            $index = array_search($item, $this->value_ids);
            unset($this->value_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addValueIds(OdooRelation $item): void
    {
        if ($this->hasValueIds($item)) {
            return;
        }

        if (null === $this->value_ids) {
            $this->value_ids = [];
        }

        $this->value_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasValueIds(OdooRelation $item): bool
    {
        if (null === $this->value_ids) {
            return false;
        }

        return in_array($item, $this->value_ids);
    }

    /**
     * @param OdooRelation[]|null $value_ids
     */
    public function setValueIds(?array $value_ids): void
    {
        $this->value_ids = $value_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("value_ids")
     */
    public function getValueIds(): ?array
    {
        return $this->value_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.attribute';
    }
}
