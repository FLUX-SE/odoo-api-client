<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.logging
 * Name : ir.logging
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
final class Logging extends Base
{
    /**
     * Created by
     *
     * @var null|int
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
     * @var null|int
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Type
     *
     * @var array
     */
    private $type;

    /**
     * Database Name
     *
     * @var null|string
     */
    private $dbname;

    /**
     * Level
     *
     * @var null|string
     */
    private $level;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * Path
     *
     * @var string
     */
    private $path;

    /**
     * Function
     *
     * @var string
     */
    private $func;

    /**
     * Line
     *
     * @var string
     */
    private $line;

    /**
     * @param string $name Name
     * @param array $type Type
     * @param string $message Message
     * @param string $path Path
     * @param string $func Function
     * @param string $line Line
     */
    public function __construct(
        string $name,
        array $type,
        string $message,
        string $path,
        string $func,
        string $line
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->message = $message;
        $this->path = $path;
        $this->func = $func;
        $this->line = $line;
    }

    /**
     * @return null|int
     */
    public function getCreateUid(): ?int
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|int
     */
    public function getWriteUid(): ?int
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        return in_array($item, $this->type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        $this->type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param null|string $dbname
     */
    public function setDbname(?string $dbname): void
    {
        $this->dbname = $dbname;
    }

    /**
     * @param null|string $level
     */
    public function setLevel(?string $level): void
    {
        $this->level = $level;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @param string $func
     */
    public function setFunc(string $func): void
    {
        $this->func = $func;
    }

    /**
     * @param string $line
     */
    public function setLine(string $line): void
    {
        $this->line = $line;
    }
}
