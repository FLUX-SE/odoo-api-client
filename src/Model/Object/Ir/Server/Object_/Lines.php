<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Server\Object_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Server;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.server.object.lines
 * Name : ir.server.object.lines
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
final class Lines extends Base
{
    /**
     * Related Server Action
     *
     * @var Server
     */
    private $server_id;

    /**
     * Field
     *
     * @var null|Fields
     */
    private $col1;

    /**
     * Value
     *
     * @var null|string
     */
    private $value;

    /**
     * Evaluation Type
     *
     * @var null|array
     */
    private $evaluation_type;

    /**
     * Record
     *
     * @var mixed
     */
    private $resource_ref;

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
     * @param Server $server_id
     */
    public function setServerId(Server $server_id): void
    {
        $this->server_id = $server_id;
    }

    /**
     * @param null|Fields $col1
     */
    public function setCol1(Fields $col1): void
    {
        $this->col1 = $col1;
    }

    /**
     * @param null|string $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param null|array $evaluation_type
     */
    public function setEvaluationType(?array $evaluation_type): void
    {
        $this->evaluation_type = $evaluation_type;
    }

    /**
     * @param ?array $evaluation_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasEvaluationType(?array $evaluation_type, bool $strict = true): bool
    {
        if (null === $this->evaluation_type) {
            return false;
        }

        return in_array($evaluation_type, $this->evaluation_type, $strict);
    }

    /**
     * @param ?array $evaluation_type
     */
    public function addEvaluationType(?array $evaluation_type): void
    {
        if ($this->hasEvaluationType($evaluation_type)) {
            return;
        }

        if (null === $this->evaluation_type) {
            $this->evaluation_type = [];
        }

        $this->evaluation_type[] = $evaluation_type;
    }

    /**
     * @param ?array $evaluation_type
     */
    public function removeEvaluationType(?array $evaluation_type): void
    {
        if ($this->hasEvaluationType($evaluation_type)) {
            $index = array_search($evaluation_type, $this->evaluation_type);
            unset($this->evaluation_type[$index]);
        }
    }

    /**
     * @param mixed $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
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
