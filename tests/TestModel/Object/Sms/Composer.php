<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Sms;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sms.composer
 * ---
 * Name : sms.composer
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Composer extends Base
{
    /**
     * Composition Mode
     * ---
     * Selection :
     *     -> numbers (Send to numbers)
     *     -> comment (Post on a document)
     *     -> mass (Send SMS in batch)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $composition_mode;

    /**
     * Document Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Document IDs
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_ids;

    /**
     * Visible records count
     * ---
     * Number of recipients that will receive the SMS if sent in mass mode, without applying the Active Domain value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $res_ids_count;

    /**
     * Use active domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_active_domain;

    /**
     * Active domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $active_domain;

    /**
     * Active records count
     * ---
     * Number of records found when searching with the value in Active Domain
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $active_domain_count;

    /**
     * Single Mode
     * ---
     * Indicates if the SMS composer targets a single specific recipient
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $comment_single_recipient;

    /**
     * Keep a note on document
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_keep_log;

    /**
     * Send directly
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_force_send;

    /**
     * Use blacklist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_use_blacklist;

    /**
     * # Valid recipients
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $recipient_valid_count;

    /**
     * # Invalid recipients
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $recipient_invalid_count;

    /**
     * Recipients (Partners)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $recipient_single_description;

    /**
     * Stored Recipient Number
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $recipient_single_number;

    /**
     * Recipient Number
     * ---
     * UX field allowing to edit the recipient number. If changed it will be stored onto the recipient.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $recipient_single_number_itf;

    /**
     * Is valid
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $recipient_single_valid;

    /**
     * Number Field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $number_field_name;

    /**
     * Recipients (Numbers)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $numbers;

    /**
     * Sanitized Number
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sanitized_numbers;

    /**
     * Use Template
     * ---
     * Relation : many2one (sms.template)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Sms\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $template_id;

    /**
     * Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $body;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $composition_mode Composition Mode
     *        ---
     *        Selection :
     *            -> numbers (Send to numbers)
     *            -> comment (Post on a document)
     *            -> mass (Send SMS in batch)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $body Message
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $composition_mode, string $body)
    {
        $this->composition_mode = $composition_mode;
        $this->body = $body;
    }

    /**
     * @param string|null $sanitized_numbers
     */
    public function setSanitizedNumbers(?string $sanitized_numbers): void
    {
        $this->sanitized_numbers = $sanitized_numbers;
    }

    /**
     * @return string|null
     *
     * @SerializedName("recipient_single_number")
     */
    public function getRecipientSingleNumber(): ?string
    {
        return $this->recipient_single_number;
    }

    /**
     * @param string|null $recipient_single_number
     */
    public function setRecipientSingleNumber(?string $recipient_single_number): void
    {
        $this->recipient_single_number = $recipient_single_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("recipient_single_number_itf")
     */
    public function getRecipientSingleNumberItf(): ?string
    {
        return $this->recipient_single_number_itf;
    }

    /**
     * @param string|null $recipient_single_number_itf
     */
    public function setRecipientSingleNumberItf(?string $recipient_single_number_itf): void
    {
        $this->recipient_single_number_itf = $recipient_single_number_itf;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("recipient_single_valid")
     */
    public function isRecipientSingleValid(): ?bool
    {
        return $this->recipient_single_valid;
    }

    /**
     * @param bool|null $recipient_single_valid
     */
    public function setRecipientSingleValid(?bool $recipient_single_valid): void
    {
        $this->recipient_single_valid = $recipient_single_valid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("number_field_name")
     */
    public function getNumberFieldName(): ?string
    {
        return $this->number_field_name;
    }

    /**
     * @param string|null $number_field_name
     */
    public function setNumberFieldName(?string $number_field_name): void
    {
        $this->number_field_name = $number_field_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("numbers")
     */
    public function getNumbers(): ?string
    {
        return $this->numbers;
    }

    /**
     * @param string|null $numbers
     */
    public function setNumbers(?string $numbers): void
    {
        $this->numbers = $numbers;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sanitized_numbers")
     */
    public function getSanitizedNumbers(): ?string
    {
        return $this->sanitized_numbers;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("recipient_single_description")
     */
    public function getRecipientSingleDescription(): ?string
    {
        return $this->recipient_single_description;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return string
     *
     * @SerializedName("body")
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param string|null $recipient_single_description
     */
    public function setRecipientSingleDescription(?string $recipient_single_description): void
    {
        $this->recipient_single_description = $recipient_single_description;
    }

    /**
     * @param int|null $recipient_invalid_count
     */
    public function setRecipientInvalidCount(?int $recipient_invalid_count): void
    {
        $this->recipient_invalid_count = $recipient_invalid_count;
    }

    /**
     * @return string
     *
     * @SerializedName("composition_mode")
     */
    public function getCompositionMode(): string
    {
        return $this->composition_mode;
    }

    /**
     * @return string|null
     *
     * @SerializedName("active_domain")
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @param string $composition_mode
     */
    public function setCompositionMode(string $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_ids")
     */
    public function getResIds(): ?string
    {
        return $this->res_ids;
    }

    /**
     * @param string|null $res_ids
     */
    public function setResIds(?string $res_ids): void
    {
        $this->res_ids = $res_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_ids_count")
     */
    public function getResIdsCount(): ?int
    {
        return $this->res_ids_count;
    }

    /**
     * @param int|null $res_ids_count
     */
    public function setResIdsCount(?int $res_ids_count): void
    {
        $this->res_ids_count = $res_ids_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("use_active_domain")
     */
    public function isUseActiveDomain(): ?bool
    {
        return $this->use_active_domain;
    }

    /**
     * @param bool|null $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @param string|null $active_domain
     */
    public function setActiveDomain(?string $active_domain): void
    {
        $this->active_domain = $active_domain;
    }

    /**
     * @return int|null
     *
     * @SerializedName("recipient_invalid_count")
     */
    public function getRecipientInvalidCount(): ?int
    {
        return $this->recipient_invalid_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("active_domain_count")
     */
    public function getActiveDomainCount(): ?int
    {
        return $this->active_domain_count;
    }

    /**
     * @param int|null $active_domain_count
     */
    public function setActiveDomainCount(?int $active_domain_count): void
    {
        $this->active_domain_count = $active_domain_count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("comment_single_recipient")
     */
    public function isCommentSingleRecipient(): ?bool
    {
        return $this->comment_single_recipient;
    }

    /**
     * @param bool|null $comment_single_recipient
     */
    public function setCommentSingleRecipient(?bool $comment_single_recipient): void
    {
        $this->comment_single_recipient = $comment_single_recipient;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mass_keep_log")
     */
    public function isMassKeepLog(): ?bool
    {
        return $this->mass_keep_log;
    }

    /**
     * @param bool|null $mass_keep_log
     */
    public function setMassKeepLog(?bool $mass_keep_log): void
    {
        $this->mass_keep_log = $mass_keep_log;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mass_force_send")
     */
    public function isMassForceSend(): ?bool
    {
        return $this->mass_force_send;
    }

    /**
     * @param bool|null $mass_force_send
     */
    public function setMassForceSend(?bool $mass_force_send): void
    {
        $this->mass_force_send = $mass_force_send;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mass_use_blacklist")
     */
    public function isMassUseBlacklist(): ?bool
    {
        return $this->mass_use_blacklist;
    }

    /**
     * @param bool|null $mass_use_blacklist
     */
    public function setMassUseBlacklist(?bool $mass_use_blacklist): void
    {
        $this->mass_use_blacklist = $mass_use_blacklist;
    }

    /**
     * @return int|null
     *
     * @SerializedName("recipient_valid_count")
     */
    public function getRecipientValidCount(): ?int
    {
        return $this->recipient_valid_count;
    }

    /**
     * @param int|null $recipient_valid_count
     */
    public function setRecipientValidCount(?int $recipient_valid_count): void
    {
        $this->recipient_valid_count = $recipient_valid_count;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.composer';
    }
}