<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Tracking;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.tracking.value
 * Name : mail.tracking.value
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
final class Value extends Base
{
    /**
     * Changed Field
     *
     * @var null|string
     */
    private $field;

    /**
     * Field Description
     *
     * @var null|string
     */
    private $field_desc;

    /**
     * Field Type
     *
     * @var string
     */
    private $field_type;

    /**
     * Field Groups
     *
     * @var string
     */
    private $field_groups;

    /**
     * Old Value Integer
     *
     * @var int
     */
    private $old_value_integer;

    /**
     * Old Value Float
     *
     * @var float
     */
    private $old_value_float;

    /**
     * Old Value Monetary
     *
     * @var float
     */
    private $old_value_monetary;

    /**
     * Old Value Char
     *
     * @var string
     */
    private $old_value_char;

    /**
     * Old Value Text
     *
     * @var string
     */
    private $old_value_text;

    /**
     * Old Value DateTime
     *
     * @var DateTimeInterface
     */
    private $old_value_datetime;

    /**
     * New Value Integer
     *
     * @var int
     */
    private $new_value_integer;

    /**
     * New Value Float
     *
     * @var float
     */
    private $new_value_float;

    /**
     * New Value Monetary
     *
     * @var float
     */
    private $new_value_monetary;

    /**
     * New Value Char
     *
     * @var string
     */
    private $new_value_char;

    /**
     * New Value Text
     *
     * @var string
     */
    private $new_value_text;

    /**
     * New Value Datetime
     *
     * @var DateTimeInterface
     */
    private $new_value_datetime;

    /**
     * Message ID
     *
     * @var null|Message
     */
    private $mail_message_id;

    /**
     * Tracking field sequence
     *
     * @var int
     */
    private $tracking_sequence;

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
     * @return null|string
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @return float
     */
    public function getNewValueMonetary(): float
    {
        return $this->new_value_monetary;
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
     * @return int
     */
    public function getTrackingSequence(): int
    {
        return $this->tracking_sequence;
    }

    /**
     * @param null|Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getNewValueDatetime(): DateTimeInterface
    {
        return $this->new_value_datetime;
    }

    /**
     * @return string
     */
    public function getNewValueText(): string
    {
        return $this->new_value_text;
    }

    /**
     * @return string
     */
    public function getNewValueChar(): string
    {
        return $this->new_value_char;
    }

    /**
     * @return float
     */
    public function getNewValueFloat(): float
    {
        return $this->new_value_float;
    }

    /**
     * @return null|string
     */
    public function getFieldDesc(): ?string
    {
        return $this->field_desc;
    }

    /**
     * @return int
     */
    public function getNewValueInteger(): int
    {
        return $this->new_value_integer;
    }

    /**
     * @return DateTimeInterface
     */
    public function getOldValueDatetime(): DateTimeInterface
    {
        return $this->old_value_datetime;
    }

    /**
     * @return string
     */
    public function getOldValueText(): string
    {
        return $this->old_value_text;
    }

    /**
     * @return string
     */
    public function getOldValueChar(): string
    {
        return $this->old_value_char;
    }

    /**
     * @return float
     */
    public function getOldValueMonetary(): float
    {
        return $this->old_value_monetary;
    }

    /**
     * @return float
     */
    public function getOldValueFloat(): float
    {
        return $this->old_value_float;
    }

    /**
     * @return int
     */
    public function getOldValueInteger(): int
    {
        return $this->old_value_integer;
    }

    /**
     * @return string
     */
    public function getFieldGroups(): string
    {
        return $this->field_groups;
    }

    /**
     * @param string $field_type
     */
    public function setFieldType(string $field_type): void
    {
        $this->field_type = $field_type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
