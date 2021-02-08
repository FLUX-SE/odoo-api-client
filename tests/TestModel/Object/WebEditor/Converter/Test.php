<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\WebEditor\Converter;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : web_editor.converter.test
 * ---
 * Name : web_editor.converter.test
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
final class Test extends Base
{
    /**
     * Char
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $char;

    /**
     * Integer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $integer;

    /**
     * Float
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $float;

    /**
     * Numeric
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $numeric;

    /**
     * Many2One
     * ---
     * Relation : many2one (web_editor.converter.test.sub)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\WebEditor\Converter\Test\Sub
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $many2one;

    /**
     * Binary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $binary;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Datetime
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $datetime;

    /**
     * Lorsqu'un pancake prend l'avion à destination de Toronto et qu'il fait une escale technique à St Claude, on
     * dit:
     * ---
     * Selection :
     *     -> A (Qu'il n'est pas arrivé à Toronto)
     *     -> B (Qu'il était supposé arriver à Toronto)
     *     -> C (Qu'est-ce qu'il fout ce maudit pancake, tabernacle ?)
     *     -> D (La réponse D)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $selection_str;

    /**
     * Html
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $html;

    /**
     * Text
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $text;

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
     * @return string|null
     *
     * @SerializedName("char")
     */
    public function getChar(): ?string
    {
        return $this->char;
    }

    /**
     * @return string|null
     *
     * @SerializedName("selection_str")
     */
    public function getSelectionStr(): ?string
    {
        return $this->selection_str;
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
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     *
     * @SerializedName("text")
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $html
     */
    public function setHtml(?string $html): void
    {
        $this->html = $html;
    }

    /**
     * @return string|null
     *
     * @SerializedName("html")
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * @param string|null $selection_str
     */
    public function setSelectionStr(?string $selection_str): void
    {
        $this->selection_str = $selection_str;
    }

    /**
     * @param DateTimeInterface|null $datetime
     */
    public function setDatetime(?DateTimeInterface $datetime): void
    {
        $this->datetime = $datetime;
    }

    /**
     * @param string|null $char
     */
    public function setChar(?string $char): void
    {
        $this->char = $char;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("datetime")
     */
    public function getDatetime(): ?DateTimeInterface
    {
        return $this->datetime;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param mixed|null $binary
     */
    public function setBinary($binary): void
    {
        $this->binary = $binary;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("binary")
     */
    public function getBinary()
    {
        return $this->binary;
    }

    /**
     * @param OdooRelation|null $many2one
     */
    public function setMany2one(?OdooRelation $many2one): void
    {
        $this->many2one = $many2one;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("many2one")
     */
    public function getMany2one(): ?OdooRelation
    {
        return $this->many2one;
    }

    /**
     * @param float|null $numeric
     */
    public function setNumeric(?float $numeric): void
    {
        $this->numeric = $numeric;
    }

    /**
     * @return float|null
     *
     * @SerializedName("numeric")
     */
    public function getNumeric(): ?float
    {
        return $this->numeric;
    }

    /**
     * @param float|null $float
     */
    public function setFloat(?float $float): void
    {
        $this->float = $float;
    }

    /**
     * @return float|null
     *
     * @SerializedName("float")
     */
    public function getFloat(): ?float
    {
        return $this->float;
    }

    /**
     * @param int|null $integer
     */
    public function setInteger(?int $integer): void
    {
        $this->integer = $integer;
    }

    /**
     * @return int|null
     *
     * @SerializedName("integer")
     */
    public function getInteger(): ?int
    {
        return $this->integer;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'web_editor.converter.test';
    }
}
