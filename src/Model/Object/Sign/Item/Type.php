<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign\Item;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.item.type
 * ---
 * Name : sign.item.type
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
final class Type extends Base
{
    /**
     * Field Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Type
     * ---
     * Selection :
     *     -> signature (Signature)
     *     -> initial (Initial)
     *     -> text (Text)
     *     -> textarea (Multiline Text)
     *     -> checkbox (Checkbox)
     *     -> selection (Selection)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $item_type;

    /**
     * Tip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $tip;

    /**
     * Placeholder
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $placeholder;

    /**
     * Default Width
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $default_width;

    /**
     * Default Height
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $default_height;

    /**
     * Automatic Partner Field
     * ---
     * Partner field to use to auto-complete the fields of this type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $auto_field;

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
     * @param string $name Field Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $item_type Type
     *        ---
     *        Selection :
     *            -> signature (Signature)
     *            -> initial (Initial)
     *            -> text (Text)
     *            -> textarea (Multiline Text)
     *            -> checkbox (Checkbox)
     *            -> selection (Selection)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $tip Tip
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $default_width Default Width
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $default_height Default Height
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $item_type,
        string $tip,
        float $default_width,
        float $default_height
    ) {
        $this->name = $name;
        $this->item_type = $item_type;
        $this->tip = $tip;
        $this->default_width = $default_width;
        $this->default_height = $default_height;
    }

    /**
     * @return string|null
     *
     * @SerializedName("auto_field")
     */
    public function getAutoField(): ?string
    {
        return $this->auto_field;
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
     * @param string|null $auto_field
     */
    public function setAutoField(?string $auto_field): void
    {
        $this->auto_field = $auto_field;
    }

    /**
     * @param float $default_height
     */
    public function setDefaultHeight(float $default_height): void
    {
        $this->default_height = $default_height;
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
     * @return float
     *
     * @SerializedName("default_height")
     */
    public function getDefaultHeight(): float
    {
        return $this->default_height;
    }

    /**
     * @param float $default_width
     */
    public function setDefaultWidth(float $default_width): void
    {
        $this->default_width = $default_width;
    }

    /**
     * @return float
     *
     * @SerializedName("default_width")
     */
    public function getDefaultWidth(): float
    {
        return $this->default_width;
    }

    /**
     * @param string|null $placeholder
     */
    public function setPlaceholder(?string $placeholder): void
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @return string|null
     *
     * @SerializedName("placeholder")
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string $tip
     */
    public function setTip(string $tip): void
    {
        $this->tip = $tip;
    }

    /**
     * @return string
     *
     * @SerializedName("tip")
     */
    public function getTip(): string
    {
        return $this->tip;
    }

    /**
     * @param string $item_type
     */
    public function setItemType(string $item_type): void
    {
        $this->item_type = $item_type;
    }

    /**
     * @return string
     *
     * @SerializedName("item_type")
     */
    public function getItemType(): string
    {
        return $this->item_type;
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
        return 'sign.item.type';
    }
}
