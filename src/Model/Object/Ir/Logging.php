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
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Logging extends Base
{
    public const ODOO_MODEL_NAME = 'ir.logging';

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> client (Client)
     *     -> server (Server)
     *
     *
     * @var string
     */
    private $type;

    /**
     * Database Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $dbname;

    /**
     * Level
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $level;

    /**
     * Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $message;

    /**
     * Path
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $path;

    /**
     * Function
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $func;

    /**
     * Line
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $line;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> client (Client)
     *            -> server (Server)
     *
     * @param string $message Message
     *        Searchable : yes
     *        Sortable : yes
     * @param string $path Path
     *        Searchable : yes
     *        Sortable : yes
     * @param string $func Function
     *        Searchable : yes
     *        Sortable : yes
     * @param string $line Line
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $type,
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
     * @return string|null
     */
    public function getDbname(): ?string
    {
        return $this->dbname;
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @param string $func
     */
    public function setFunc(string $func): void
    {
        $this->func = $func;
    }

    /**
     * @return string
     */
    public function getFunc(): string
    {
        return $this->func;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string|null $level
     */
    public function setLevel(?string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string|null
     */
    public function getLevel(): ?string
    {
        return $this->level;
    }

    /**
     * @param string|null $dbname
     */
    public function setDbname(?string $dbname): void
    {
        $this->dbname = $dbname;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getCreateUid(): ?int
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
    public function getName(): string
    {
        return $this->name;
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
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param int|null $write_uid
     */
    public function setWriteUid(?int $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return int|null
     */
    public function getWriteUid(): ?int
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
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param int|null $create_uid
     */
    public function setCreateUid(?int $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param string $line
     */
    public function setLine(string $line): void
    {
        $this->line = $line;
    }
}
