<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product\Attribute\Custom;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.attribute.custom.value
 * ---
 * Name : product.attribute.custom.value
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
     * Name
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Attribute Value
     * ---
     * Relation : many2one (product.template.attribute.value)
     * @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $custom_product_template_attribute_value_id;

    /**
     * Sales Order Line
     * ---
     * Relation : many2one (sale.order.line)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sale_order_line_id;

    /**
     * Custom Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $custom_value;

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
     * @param OdooRelation $custom_product_template_attribute_value_id Attribute Value
     *        ---
     *        Relation : many2one (product.template.attribute.value)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Template\Attribute\Value
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sale_order_line_id Sales Order Line
     *        ---
     *        Relation : many2one (sale.order.line)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Order\Line
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $custom_product_template_attribute_value_id,
        OdooRelation $sale_order_line_id
    ) {
        $this->custom_product_template_attribute_value_id = $custom_product_template_attribute_value_id;
        $this->sale_order_line_id = $sale_order_line_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param string|null $custom_value
     */
    public function setCustomValue(?string $custom_value): void
    {
        $this->custom_value = $custom_value;
    }

    /**
     * @return string|null
     *
     * @SerializedName("custom_value")
     */
    public function getCustomValue(): ?string
    {
        return $this->custom_value;
    }

    /**
     * @param OdooRelation $sale_order_line_id
     */
    public function setSaleOrderLineId(OdooRelation $sale_order_line_id): void
    {
        $this->sale_order_line_id = $sale_order_line_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sale_order_line_id")
     */
    public function getSaleOrderLineId(): OdooRelation
    {
        return $this->sale_order_line_id;
    }

    /**
     * @param OdooRelation $custom_product_template_attribute_value_id
     */
    public function setCustomProductTemplateAttributeValueId(
        OdooRelation $custom_product_template_attribute_value_id
    ): void {
        $this->custom_product_template_attribute_value_id = $custom_product_template_attribute_value_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("custom_product_template_attribute_value_id")
     */
    public function getCustomProductTemplateAttributeValueId(): OdooRelation
    {
        return $this->custom_product_template_attribute_value_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.attribute.custom.value';
    }
}
