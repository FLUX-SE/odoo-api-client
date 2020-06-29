<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\WebEditor\Converter;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\WebEditor\Converter\Test\Sub;

/**
 * Odoo model : web_editor.converter.test
 * Name : web_editor.converter.test
 * Info :
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
final class Test extends Base
{
    /**
     * Char
     *
     * @var null|string
     */
    private $char;

    /**
     * Integer
     *
     * @var null|int
     */
    private $integer;

    /**
     * Float
     *
     * @var null|float
     */
    private $float;

    /**
     * Numeric
     *
     * @var null|float
     */
    private $numeric;

    /**
     * Many2One
     *
     * @var null|Sub
     */
    private $many2one;

    /**
     * Binary
     *
     * @var null|int
     */
    private $binary;

    /**
     * Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Datetime
     *
     * @var null|DateTimeInterface
     */
    private $datetime;

    /**
     * Lorsqu'un pancake prend l'avion à destination de Toronto et qu'il fait une escale technique à St Claude, on
     * dit:
     *
     * @var null|array
     */
    private $selection_str;

    /**
     * Html
     *
     * @var null|string
     */
    private $html;

    /**
     * Text
     *
     * @var null|string
     */
    private $text;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $char
     */
    public function setChar(?string $char): void
    {
        $this->char = $char;
    }

    /**
     * @param mixed $item
     */
    public function addSelectionStr($item): void
    {
        if ($this->hasSelectionStr($item)) {
            return;
        }

        if (null === $this->selection_str) {
            $this->selection_str = [];
        }

        $this->selection_str[] = $item;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|string $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param null|string $html
     */
    public function setHtml(?string $html): void
    {
        $this->html = $html;
    }

    /**
     * @param mixed $item
     */
    public function removeSelectionStr($item): void
    {
        if (null === $this->selection_str) {
            $this->selection_str = [];
        }

        if ($this->hasSelectionStr($item)) {
            $index = array_search($item, $this->selection_str);
            unset($this->selection_str[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelectionStr($item, bool $strict = true): bool
    {
        if (null === $this->selection_str) {
            return false;
        }

        return in_array($item, $this->selection_str, $strict);
    }

    /**
     * @param null|int $integer
     */
    public function setInteger(?int $integer): void
    {
        $this->integer = $integer;
    }

    /**
     * @param null|array $selection_str
     */
    public function setSelectionStr(?array $selection_str): void
    {
        $this->selection_str = $selection_str;
    }

    /**
     * @param null|DateTimeInterface $datetime
     */
    public function setDatetime(?DateTimeInterface $datetime): void
    {
        $this->datetime = $datetime;
    }

    /**
     * @param null|DateTimeInterface $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param null|int $binary
     */
    public function setBinary(?int $binary): void
    {
        $this->binary = $binary;
    }

    /**
     * @param null|Sub $many2one
     */
    public function setMany2one(?Sub $many2one): void
    {
        $this->many2one = $many2one;
    }

    /**
     * @param null|float $numeric
     */
    public function setNumeric(?float $numeric): void
    {
        $this->numeric = $numeric;
    }

    /**
     * @param null|float $float
     */
    public function setFloat(?float $float): void
    {
        $this->float = $float;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
