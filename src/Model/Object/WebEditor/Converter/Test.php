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
final class Test extends Base
{
    /**
     * Char
     *
     * @var string
     */
    private $char;

    /**
     * Integer
     *
     * @var int
     */
    private $integer;

    /**
     * Float
     *
     * @var float
     */
    private $float;

    /**
     * Numeric
     *
     * @var float
     */
    private $numeric;

    /**
     * Many2One
     *
     * @var Sub
     */
    private $many2one;

    /**
     * Binary
     *
     * @var int
     */
    private $binary;

    /**
     * Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Datetime
     *
     * @var DateTimeInterface
     */
    private $datetime;

    /**
     * Lorsqu'un pancake prend l'avion à destination de Toronto et qu'il fait une escale technique à St Claude, on
     * dit:
     *
     * @var array
     */
    private $selection_str;

    /**
     * Html
     *
     * @var string
     */
    private $html;

    /**
     * Text
     *
     * @var string
     */
    private $text;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $char
     */
    public function setChar(string $char): void
    {
        $this->char = $char;
    }

    /**
     * @param array $selection_str
     */
    public function addSelectionStr(array $selection_str): void
    {
        if ($this->hasSelectionStr($selection_str)) {
            return;
        }

        $this->selection_str[] = $selection_str;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html): void
    {
        $this->html = $html;
    }

    /**
     * @param array $selection_str
     */
    public function removeSelectionStr(array $selection_str): void
    {
        if ($this->hasSelectionStr($selection_str)) {
            $index = array_search($selection_str, $this->selection_str);
            unset($this->selection_str[$index]);
        }
    }

    /**
     * @param array $selection_str
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSelectionStr(array $selection_str, bool $strict = true): bool
    {
        return in_array($selection_str, $this->selection_str, $strict);
    }

    /**
     * @param int $integer
     */
    public function setInteger(int $integer): void
    {
        $this->integer = $integer;
    }

    /**
     * @param array $selection_str
     */
    public function setSelectionStr(array $selection_str): void
    {
        $this->selection_str = $selection_str;
    }

    /**
     * @param DateTimeInterface $datetime
     */
    public function setDatetime(DateTimeInterface $datetime): void
    {
        $this->datetime = $datetime;
    }

    /**
     * @param DateTimeInterface $date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @param int $binary
     */
    public function setBinary(int $binary): void
    {
        $this->binary = $binary;
    }

    /**
     * @param Sub $many2one
     */
    public function setMany2one(Sub $many2one): void
    {
        $this->many2one = $many2one;
    }

    /**
     * @param float $numeric
     */
    public function setNumeric(float $numeric): void
    {
        $this->numeric = $numeric;
    }

    /**
     * @param float $float
     */
    public function setFloat(float $float): void
    {
        $this->float = $float;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
