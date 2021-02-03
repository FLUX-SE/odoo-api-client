<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sms.sms
 * ---
 * Name : sms.sms
 * ---
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
final class Sms extends Base
{
    /**
     * Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $number;

    /**
     * Body
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $body;

    /**
     * Customer
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Mail Message
     * ---
     * Relation : many2one (mail.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_message_id;

    /**
     * SMS Status
     * ---
     * Selection :
     *     -> outgoing (In Queue)
     *     -> sent (Sent)
     *     -> error (Error)
     *     -> canceled (Canceled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * Error Code
     * ---
     * Selection :
     *     -> sms_number_missing (Missing Number)
     *     -> sms_number_format (Wrong Number Format)
     *     -> sms_credit (Insufficient Credit)
     *     -> sms_server (Server Error)
     *     -> sms_acc (Unregistered Account)
     *     -> sms_blacklist (Blacklisted)
     *     -> sms_duplicate (Duplicate)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $error_code;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $state SMS Status
     *        ---
     *        Selection :
     *            -> outgoing (In Queue)
     *            -> sent (Sent)
     *            -> error (Error)
     *            -> canceled (Canceled)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $state)
    {
        $this->state = $state;
    }

    /**
     * @param string|null $error_code
     */
    public function setErrorCode(?string $error_code): void
    {
        $this->error_code = $error_code;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("error_code")
     */
    public function getErrorCode(): ?string
    {
        return $this->error_code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("number")
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     *
     * @SerializedName("state")
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation|null $mail_message_id
     */
    public function setMailMessageId(?OdooRelation $mail_message_id): void
    {
        $this->mail_message_id = $mail_message_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("mail_message_id")
     */
    public function getMailMessageId(): ?OdooRelation
    {
        return $this->mail_message_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string|null
     *
     * @SerializedName("body")
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.sms';
    }
}
