<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.model.data
 * Name : ir.model.data
 * Info :
 * Holds external identifier keys for records in the database.
 *               This has two main uses:
 *
 *                       * allows easy data integration with third-party systems,
 *                           making import/export/sync of data possible, as records
 *                           can be uniquely identified across multiple systems
 *                       * allows tracking the origin of data installed by Odoo
 *                           modules themselves, thus making it possible to later
 *                           update them seamlessly.
 */
final class Data extends Base
{
    /**
     * External Identifier
     * External Key/Identifier that can be used for data integration with third-party systems
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Complete ID
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Model Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Module
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $module;

    /**
     * Record ID
     * ID of the target record in the database
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Non Updatable
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $noupdate;

    /**
     * Update Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_update;

    /**
     * Init Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_init;

    /**
     * Reference
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $reference;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
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
     * @var OdooRelation|null
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
     * @param string $name External Identifier
     *        External Key/Identifier that can be used for data integration with third-party systems
     *        Searchable : yes
     *        Sortable : yes
     * @param string $model Model Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $module Module
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $model, string $module)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateInit(): ?DateTimeInterface
    {
        return $this->date_init;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param DateTimeInterface|null $date_init
     */
    public function setDateInit(?DateTimeInterface $date_init): void
    {
        $this->date_init = $date_init;
    }

    /**
     * @param DateTimeInterface|null $date_update
     */
    public function setDateUpdate(?DateTimeInterface $date_update): void
    {
        $this->date_update = $date_update;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateUpdate(): ?DateTimeInterface
    {
        return $this->date_update;
    }

    /**
     * @param bool|null $noupdate
     */
    public function setNoupdate(?bool $noupdate): void
    {
        $this->noupdate = $noupdate;
    }

    /**
     * @return bool|null
     */
    public function isNoupdate(): ?bool
    {
        return $this->noupdate;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return int|null
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param string $module
     */
    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @return string|null
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
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
        return 'ir.model.data';
    }
}
