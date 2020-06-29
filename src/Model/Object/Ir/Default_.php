<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.default
 * Name : ir.default
 * Info :
 * User-defined default values for fields.
 */
final class Default_ extends Base
{
    /**
     * Field
     *
     * @var Fields
     */
    private $field_id;

    /**
     * User
     * If set, action binding only applies for this user.
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Company
     * If set, action binding only applies for this company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Condition
     * If set, applies the default upon condition.
     *
     * @var null|string
     */
    private $condition;

    /**
     * Default Value (JSON format)
     *
     * @var string
     */
    private $json_value;

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
     * @param Fields $field_id Field
     * @param string $json_value Default Value (JSON format)
     */
    public function __construct(Fields $field_id, string $json_value)
    {
        $this->field_id = $field_id;
        $this->json_value = $json_value;
    }

    /**
     * @param Fields $field_id
     */
    public function setFieldId(Fields $field_id): void
    {
        $this->field_id = $field_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|string $condition
     */
    public function setCondition(?string $condition): void
    {
        $this->condition = $condition;
    }

    /**
     * @param string $json_value
     */
    public function setJsonValue(string $json_value): void
    {
        $this->json_value = $json_value;
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
