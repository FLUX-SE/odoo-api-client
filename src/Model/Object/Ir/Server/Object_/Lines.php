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
final class Lines extends Base
{
    /**
     * Related Server Action
     *
     * @var null|Server
     */
    private $server_id;

    /**
     * Field
     *
     * @var Fields
     */
    private $col1;

    /**
     * Value
     * Expression containing a value specification. 
     * When Formula type is selected, this field may be a Python expression  that can use the same values as for the
     * code field on the server action.
     * If Value type is selected, the value will be used directly without evaluation.
     *
     * @var string
     */
    private $value;

    /**
     * Evaluation Type
     *
     * @var array
     */
    private $evaluation_type;

    /**
     * Record
     *
     * @var null|mixed
     */
    private $resource_ref;

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
     * @param Fields $col1 Field
     * @param string $value Value
     *        Expression containing a value specification. 
     *        When Formula type is selected, this field may be a Python expression  that can use the same values as for the
     *        code field on the server action.
     *        If Value type is selected, the value will be used directly without evaluation.
     * @param array $evaluation_type Evaluation Type
     */
    public function __construct(Fields $col1, string $value, array $evaluation_type)
    {
        $this->col1 = $col1;
        $this->value = $value;
        $this->evaluation_type = $evaluation_type;
    }

    /**
     * @param null|Server $server_id
     */
    public function setServerId(?Server $server_id): void
    {
        $this->server_id = $server_id;
    }

    /**
     * @param Fields $col1
     */
    public function setCol1(Fields $col1): void
    {
        $this->col1 = $col1;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param array $evaluation_type
     */
    public function setEvaluationType(array $evaluation_type): void
    {
        $this->evaluation_type = $evaluation_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasEvaluationType($item, bool $strict = true): bool
    {
        return in_array($item, $this->evaluation_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addEvaluationType($item): void
    {
        if ($this->hasEvaluationType($item)) {
            return;
        }

        $this->evaluation_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeEvaluationType($item): void
    {
        if ($this->hasEvaluationType($item)) {
            $index = array_search($item, $this->evaluation_type);
            unset($this->evaluation_type[$index]);
        }
    }

    /**
     * @param null|mixed $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
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
