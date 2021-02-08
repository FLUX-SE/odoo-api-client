<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Product\Attribute;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.attribute.value
 * ---
 * Name : product.attribute.value
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
final class Value extends Base
{
    /**
     * Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

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
     * Attribute
     * ---
     * The attribute cannot be changed once the value is used on at least one product.
     * ---
     * Relation : many2one (product.attribute)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Attribute
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $attribute_id;

    /**
     * Lines
     * ---
     * Relation : many2many (product.template.attribute.line)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Template\Attribute\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $pav_attribute_line_ids;

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
     * Is custom value
     * ---
     * Allow users to input custom values for this attribute value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_custom;

    /**
     * Color
     * ---
     * Here you can set a specific HTML color index (e.g. #ff0000) to display the color if the attribute type is
     * 'Color'.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $html_color;

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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $name Value
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $attribute_id Attribute
     *        ---
     *        The attribute cannot be changed once the value is used on at least one product.
     *        ---
     *        Relation : many2one (product.attribute)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Attribute
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $attribute_id)
    {
        $this->name = $name;
        $this->attribute_id = $attribute_id;
    }

    /**
     * @param bool|null $is_custom
     */
    public function setIsCustom(?bool $is_custom): void
    {
        $this->is_custom = $is_custom;
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
     * @param string|null $display_type
     */
    public function setDisplayType(?string $display_type): void
    {
        $this->display_type = $display_type;
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
     * @param string|null $html_color
     */
    public function setHtmlColor(?string $html_color): void
    {
        $this->html_color = $html_color;
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
     * @return bool|null
     *
     * @SerializedName("is_custom")
     */
    public function isIsCustom(): ?bool
    {
        return $this->is_custom;
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
     * @param bool|null $is_used_on_products
     */
    public function setIsUsedOnProducts(?bool $is_used_on_products): void
    {
        $this->is_used_on_products = $is_used_on_products;
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
     * @param OdooRelation $item
     */
    public function removePavAttributeLineIds(OdooRelation $item): void
    {
        if (null === $this->pav_attribute_line_ids) {
            $this->pav_attribute_line_ids = [];
        }

        if ($this->hasPavAttributeLineIds($item)) {
            $index = array_search($item, $this->pav_attribute_line_ids);
            unset($this->pav_attribute_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPavAttributeLineIds(OdooRelation $item): void
    {
        if ($this->hasPavAttributeLineIds($item)) {
            return;
        }

        if (null === $this->pav_attribute_line_ids) {
            $this->pav_attribute_line_ids = [];
        }

        $this->pav_attribute_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPavAttributeLineIds(OdooRelation $item): bool
    {
        if (null === $this->pav_attribute_line_ids) {
            return false;
        }

        return in_array($item, $this->pav_attribute_line_ids);
    }

    /**
     * @param OdooRelation[]|null $pav_attribute_line_ids
     */
    public function setPavAttributeLineIds(?array $pav_attribute_line_ids): void
    {
        $this->pav_attribute_line_ids = $pav_attribute_line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("pav_attribute_line_ids")
     */
    public function getPavAttributeLineIds(): ?array
    {
        return $this->pav_attribute_line_ids;
    }

    /**
     * @param OdooRelation $attribute_id
     */
    public function setAttributeId(OdooRelation $attribute_id): void
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("attribute_id")
     */
    public function getAttributeId(): OdooRelation
    {
        return $this->attribute_id;
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
        return 'product.attribute.value';
    }
}
