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
final class Value extends Base
{
    /**
     * Changed Field
     *
     * @var string
     */
    private $field;

    /**
     * Field Description
     *
     * @var string
     */
    private $field_desc;

    /**
     * Field Type
     *
     * @var null|string
     */
    private $field_type;

    /**
     * Field Groups
     *
     * @var null|string
     */
    private $field_groups;

    /**
     * Old Value Integer
     *
     * @var null|int
     */
    private $old_value_integer;

    /**
     * Old Value Float
     *
     * @var null|float
     */
    private $old_value_float;

    /**
     * Old Value Monetary
     *
     * @var null|float
     */
    private $old_value_monetary;

    /**
     * Old Value Char
     *
     * @var null|string
     */
    private $old_value_char;

    /**
     * Old Value Text
     *
     * @var null|string
     */
    private $old_value_text;

    /**
     * Old Value DateTime
     *
     * @var null|DateTimeInterface
     */
    private $old_value_datetime;

    /**
     * New Value Integer
     *
     * @var null|int
     */
    private $new_value_integer;

    /**
     * New Value Float
     *
     * @var null|float
     */
    private $new_value_float;

    /**
     * New Value Monetary
     *
     * @var null|float
     */
    private $new_value_monetary;

    /**
     * New Value Char
     *
     * @var null|string
     */
    private $new_value_char;

    /**
     * New Value Text
     *
     * @var null|string
     */
    private $new_value_text;

    /**
     * New Value Datetime
     *
     * @var null|DateTimeInterface
     */
    private $new_value_datetime;

    /**
     * Message ID
     *
     * @var Message
     */
    private $mail_message_id;

    /**
     * Tracking field sequence
     *
     * @var null|int
     */
    private $tracking_sequence;

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
     * @param string $field Changed Field
     * @param string $field_desc Field Description
     * @param Message $mail_message_id Message ID
     */
    public function __construct(string $field, string $field_desc, Message $mail_message_id)
    {
        $this->field = $field;
        $this->field_desc = $field_desc;
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return null|float
     */
    public function getNewValueFloat(): ?float
    {
        return $this->new_value_float;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|int
     */
    public function getTrackingSequence(): ?int
    {
        return $this->tracking_sequence;
    }

    /**
     * @param Message $mail_message_id
     */
    public function setMailMessageId(Message $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNewValueDatetime(): ?DateTimeInterface
    {
        return $this->new_value_datetime;
    }

    /**
     * @return null|string
     */
    public function getNewValueText(): ?string
    {
        return $this->new_value_text;
    }

    /**
     * @return null|string
     */
    public function getNewValueChar(): ?string
    {
        return $this->new_value_char;
    }

    /**
     * @return null|float
     */
    public function getNewValueMonetary(): ?float
    {
        return $this->new_value_monetary;
    }

    /**
     * @return null|int
     */
    public function getNewValueInteger(): ?int
    {
        return $this->new_value_integer;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getOldValueDatetime(): ?DateTimeInterface
    {
        return $this->old_value_datetime;
    }

    /**
     * @return null|string
     */
    public function getOldValueText(): ?string
    {
        return $this->old_value_text;
    }

    /**
     * @return null|string
     */
    public function getOldValueChar(): ?string
    {
        return $this->old_value_char;
    }

    /**
     * @return null|float
     */
    public function getOldValueMonetary(): ?float
    {
        return $this->old_value_monetary;
    }

    /**
     * @return null|float
     */
    public function getOldValueFloat(): ?float
    {
        return $this->old_value_float;
    }

    /**
     * @return null|int
     */
    public function getOldValueInteger(): ?int
    {
        return $this->old_value_integer;
    }

    /**
     * @return null|string
     */
    public function getFieldGroups(): ?string
    {
        return $this->field_groups;
    }

    /**
     * @param null|string $field_type
     */
    public function setFieldType(?string $field_type): void
    {
        $this->field_type = $field_type;
    }

    /**
     * @return string
     */
    public function getFieldDesc(): string
    {
        return $this->field_desc;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
