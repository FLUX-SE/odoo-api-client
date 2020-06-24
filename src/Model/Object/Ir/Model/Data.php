<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model.data
 * Name : ir.model.data
 *
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
     *
     * @var null|string
     */
    private $name;

    /**
     * Complete ID
     *
     * @var string
     */
    private $complete_name;

    /**
     * Model Name
     *
     * @var null|string
     */
    private $model;

    /**
     * Module
     *
     * @var null|string
     */
    private $module;

    /**
     * Record ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Non Updatable
     *
     * @var bool
     */
    private $noupdate;

    /**
     * Update Date
     *
     * @var DateTimeInterface
     */
    private $date_update;

    /**
     * Init Date
     *
     * @var DateTimeInterface
     */
    private $date_init;

    /**
     * Reference
     *
     * @var string
     */
    private $reference;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCompleteName(): string
    {
        return $this->complete_name;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param null|string $module
     */
    public function setModule(?string $module): void
    {
        $this->module = $module;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param bool $noupdate
     */
    public function setNoupdate(bool $noupdate): void
    {
        $this->noupdate = $noupdate;
    }

    /**
     * @param DateTimeInterface $date_update
     */
    public function setDateUpdate(DateTimeInterface $date_update): void
    {
        $this->date_update = $date_update;
    }

    /**
     * @param DateTimeInterface $date_init
     */
    public function setDateInit(DateTimeInterface $date_init): void
    {
        $this->date_init = $date_init;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
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
     * @return Users
     */
    public function getWriteUid(): Users
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
}
