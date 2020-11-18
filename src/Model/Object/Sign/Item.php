<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.item
 * ---
 * Name : sign.item
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
final class Item extends Base
{
    /**
     * Document Template
     * ---
     * Relation : many2one (sign.template)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $template_id;

    /**
     * Type
     * ---
     * Relation : many2one (sign.item.type)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $type_id;

    /**
     * Required
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $required;

    /**
     * Responsible
     * ---
     * Relation : many2one (sign.item.role)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item\Role
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $responsible_id;

    /**
     * Selection options
     * ---
     * Relation : many2many (sign.item.option)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item\Option
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $option_ids;

    /**
     * Field Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Document Page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $page;

    /**
     * Position X
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $posX;

    /**
     * Position Y
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $posY;

    /**
     * Width
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $width;

    /**
     * Height
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $height;

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
     * @param OdooRelation $template_id Document Template
     *        ---
     *        Relation : many2one (sign.template)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $type_id Type
     *        ---
     *        Relation : many2one (sign.item.type)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Item\Type
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $page Document Page
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $posX Position X
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $posY Position Y
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $width Width
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $height Height
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $template_id,
        OdooRelation $type_id,
        int $page,
        float $posX,
        float $posY,
        float $width,
        float $height
    ) {
        $this->template_id = $template_id;
        $this->type_id = $type_id;
        $this->page = $page;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->width = $width;
        $this->height = $height;
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
     * @return float
     *
     * @SerializedName("posY")
     */
    public function getPosY(): float
    {
        return $this->posY;
    }

    /**
     * @param float $posY
     */
    public function setPosY(float $posY): void
    {
        $this->posY = $posY;
    }

    /**
     * @return float
     *
     * @SerializedName("width")
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float
     *
     * @SerializedName("height")
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return float
     *
     * @SerializedName("posX")
     */
    public function getPosX(): float
    {
        return $this->posX;
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
     * @param float $posX
     */
    public function setPosX(float $posX): void
    {
        $this->posX = $posX;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @param OdooRelation|null $responsible_id
     */
    public function setResponsibleId(?OdooRelation $responsible_id): void
    {
        $this->responsible_id = $responsible_id;
    }

    /**
     * @param OdooRelation $template_id
     */
    public function setTemplateId(OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("type_id")
     */
    public function getTypeId(): OdooRelation
    {
        return $this->type_id;
    }

    /**
     * @param OdooRelation $type_id
     */
    public function setTypeId(OdooRelation $type_id): void
    {
        $this->type_id = $type_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("required")
     */
    public function isRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * @param bool|null $required
     */
    public function setRequired(?bool $required): void
    {
        $this->required = $required;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("responsible_id")
     */
    public function getResponsibleId(): ?OdooRelation
    {
        return $this->responsible_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("option_ids")
     */
    public function getOptionIds(): ?array
    {
        return $this->option_ids;
    }

    /**
     * @return int
     *
     * @SerializedName("page")
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param OdooRelation[]|null $option_ids
     */
    public function setOptionIds(?array $option_ids): void
    {
        $this->option_ids = $option_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasOptionIds(OdooRelation $item): bool
    {
        if (null === $this->option_ids) {
            return false;
        }

        return in_array($item, $this->option_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addOptionIds(OdooRelation $item): void
    {
        if ($this->hasOptionIds($item)) {
            return;
        }

        if (null === $this->option_ids) {
            $this->option_ids = [];
        }

        $this->option_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeOptionIds(OdooRelation $item): void
    {
        if (null === $this->option_ids) {
            $this->option_ids = [];
        }

        if ($this->hasOptionIds($item)) {
            $index = array_search($item, $this->option_ids);
            unset($this->option_ids[$index]);
        }
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.item';
    }
}
