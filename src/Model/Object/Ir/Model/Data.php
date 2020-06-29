<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.data
 * Name : ir.model.data
 * Info :
 * Holds external identifier keys for records in the database.
 * This has two main uses:
 *
 * * allows easy data integration with third-party systems,
 * making import/export/sync of data possible, as records
 * can be uniquely identified across multiple systems
 * * allows tracking the origin of data installed by Odoo
 * modules themselves, thus making it possible to later
 * update them seamlessly.
 */
final class Data extends Base
{
    /**
     * External Identifier
     * External Key/Identifier that can be used for data integration with third-party systems
     *
     * @var string
     */
    private $name;

    /**
     * Complete ID
     *
     * @var null|string
     */
    private $complete_name;

    /**
     * Model Name
     *
     * @var string
     */
    private $model;

    /**
     * Module
     *
     * @var string
     */
    private $module;

    /**
     * Record ID
     * ID of the target record in the database
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Non Updatable
     *
     * @var null|bool
     */
    private $noupdate;

    /**
     * Update Date
     *
     * @var null|DateTimeInterface
     */
    private $date_update;

    /**
     * Init Date
     *
     * @var null|DateTimeInterface
     */
    private $date_init;

    /**
     * Reference
     *
     * @var null|string
     */
    private $reference;

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
     * @param string $name External Identifier
     *        External Key/Identifier that can be used for data integration with third-party systems
     * @param string $model Model Name
     * @param string $module Module
     */
    public function __construct(string $name, string $model, string $module)
    {
        $this->name = $name;
        $this->model = $model;
        $this->module = $module;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param string $module
     */
    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|bool $noupdate
     */
    public function setNoupdate(?bool $noupdate): void
    {
        $this->noupdate = $noupdate;
    }

    /**
     * @param null|DateTimeInterface $date_update
     */
    public function setDateUpdate(?DateTimeInterface $date_update): void
    {
        $this->date_update = $date_update;
    }

    /**
     * @param null|DateTimeInterface $date_init
     */
    public function setDateInit(?DateTimeInterface $date_init): void
    {
        $this->date_init = $date_init;
    }

    /**
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
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
     * @return null|Users
     */
    public function getWriteUid(): ?Users
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
}
