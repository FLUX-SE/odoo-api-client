<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.logging
 * Name : ir.logging
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
final class Logging extends Base
{
    /**
     * Created by
     *
     * @var int
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
     * @var int
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Database Name
     *
     * @var string
     */
    private $dbname;

    /**
     * Level
     *
     * @var string
     */
    private $level;

    /**
     * Message
     *
     * @var null|string
     */
    private $message;

    /**
     * Path
     *
     * @var null|string
     */
    private $path;

    /**
     * Function
     *
     * @var null|string
     */
    private $func;

    /**
     * Line
     *
     * @var null|string
     */
    private $line;

    /**
     * @return int
     */
    public function getCreateUid(): int
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return int
     */
    public function getWriteUid(): int
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param ?array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(?array $type, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($type, $this->type, $strict);
    }

    /**
     * @param ?array $type
     */
    public function addType(?array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $type;
    }

    /**
     * @param ?array $type
     */
    public function removeType(?array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param string $dbname
     */
    public function setDbname(string $dbname): void
    {
        $this->dbname = $dbname;
    }

    /**
     * @param string $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     * @param null|string $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param null|string $path
     */
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    /**
     * @param null|string $func
     */
    public function setFunc(?string $func): void
    {
        $this->func = $func;
    }

    /**
     * @param null|string $line
     */
    public function setLine(?string $line): void
    {
        $this->line = $line;
    }
}
