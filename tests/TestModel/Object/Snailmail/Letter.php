<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Snailmail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : snailmail.letter
 * ---
 * Name : snailmail.letter
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
final class Letter extends Base
{
    /**
     * Sent by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $res_id;

    /**
     * Recipient
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Optional report to print and attach
     * ---
     * Relation : many2one (ir.actions.report)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Actions\Report
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $report_template;

    /**
     * Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $attachment_id;

    /**
     * Document
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $attachment_datas;

    /**
     * Attachment Filename
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $attachment_fname;

    /**
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $color;

    /**
     * Cover Page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $cover;

    /**
     * Both side
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $duplex;

    /**
     * Status
     * ---
     * When a letter is created, the status is 'Pending'.
     * If the letter is correctly sent, the status goes in 'Sent',
     * If not, it will got in state 'Error' and the error message will be displayed in the field 'Error Message'.
     * ---
     * Selection :
     *     -> pending (In Queue)
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
     * Error
     * ---
     * Selection :
     *     -> MISSING_REQUIRED_FIELDS (MISSING_REQUIRED_FIELDS)
     *     -> CREDIT_ERROR (CREDIT_ERROR)
     *     -> TRIAL_ERROR (TRIAL_ERROR)
     *     -> NO_PRICE_AVAILABLE (NO_PRICE_AVAILABLE)
     *     -> FORMAT_ERROR (FORMAT_ERROR)
     *     -> UNKNOWN_ERROR (UNKNOWN_ERROR)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $error_code;

    /**
     * Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $info_msg;

    /**
     * Related Record
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $reference;

    /**
     * Snailmail Status Message
     * ---
     * Relation : many2one (mail.message)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $message_id;

    /**
     * Notifications
     * ---
     * Relation : one2many (mail.notification -> letter_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Notification
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $notification_ids;

    /**
     * Street
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $street;

    /**
     * Street2
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $street2;

    /**
     * Zip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $zip;

    /**
     * City
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $city;

    /**
     * State
     * ---
     * Relation : many2one (res.country.state)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country\State
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $state_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $model Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $res_id Document ID
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Recipient
     *        ---
     *        Relation : many2one (res.partner)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state Status
     *        ---
     *        When a letter is created, the status is 'Pending'.
     *        If the letter is correctly sent, the status goes in 'Sent',
     *        If not, it will got in state 'Error' and the error message will be displayed in the field 'Error Message'.
     *        ---
     *        Selection :
     *            -> pending (In Queue)
     *            -> sent (Sent)
     *            -> error (Error)
     *            -> canceled (Canceled)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $model,
        int $res_id,
        OdooRelation $partner_id,
        OdooRelation $company_id,
        string $state
    ) {
        $this->model = $model;
        $this->res_id = $res_id;
        $this->partner_id = $partner_id;
        $this->company_id = $company_id;
        $this->state = $state;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("message_id")
     */
    public function getMessageId(): ?OdooRelation
    {
        return $this->message_id;
    }

    /**
     * @param OdooRelation|null $message_id
     */
    public function setMessageId(?OdooRelation $message_id): void
    {
        $this->message_id = $message_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("notification_ids")
     */
    public function getNotificationIds(): ?array
    {
        return $this->notification_ids;
    }

    /**
     * @param OdooRelation[]|null $notification_ids
     */
    public function setNotificationIds(?array $notification_ids): void
    {
        $this->notification_ids = $notification_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasNotificationIds(OdooRelation $item): bool
    {
        if (null === $this->notification_ids) {
            return false;
        }

        return in_array($item, $this->notification_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addNotificationIds(OdooRelation $item): void
    {
        if ($this->hasNotificationIds($item)) {
            return;
        }

        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        $this->notification_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeNotificationIds(OdooRelation $item): void
    {
        if (null === $this->notification_ids) {
            $this->notification_ids = [];
        }

        if ($this->hasNotificationIds($item)) {
            $index = array_search($item, $this->notification_ids);
            unset($this->notification_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("street")
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     *
     * @SerializedName("street2")
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @return string|null
     *
     * @SerializedName("zip")
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return string|null
     *
     * @SerializedName("city")
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reference")
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("state_id")
     */
    public function getStateId(): ?OdooRelation
    {
        return $this->state_id;
    }

    /**
     * @param OdooRelation|null $state_id
     */
    public function setStateId(?OdooRelation $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
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
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param string|null $info_msg
     */
    public function setInfoMsg(?string $info_msg): void
    {
        $this->info_msg = $info_msg;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation|null $attachment_id
     */
    public function setAttachmentId(?OdooRelation $attachment_id): void
    {
        $this->attachment_id = $attachment_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     *
     * @SerializedName("model")
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     *
     * @SerializedName("res_id")
     */
    public function getResId(): int
    {
        return $this->res_id;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("report_template")
     */
    public function getReportTemplate(): ?OdooRelation
    {
        return $this->report_template;
    }

    /**
     * @param OdooRelation|null $report_template
     */
    public function setReportTemplate(?OdooRelation $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("attachment_id")
     */
    public function getAttachmentId(): ?OdooRelation
    {
        return $this->attachment_id;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("attachment_datas")
     */
    public function getAttachmentDatas()
    {
        return $this->attachment_datas;
    }

    /**
     * @return string|null
     *
     * @SerializedName("info_msg")
     */
    public function getInfoMsg(): ?string
    {
        return $this->info_msg;
    }

    /**
     * @param mixed|null $attachment_datas
     */
    public function setAttachmentDatas($attachment_datas): void
    {
        $this->attachment_datas = $attachment_datas;
    }

    /**
     * @return string|null
     *
     * @SerializedName("attachment_fname")
     */
    public function getAttachmentFname(): ?string
    {
        return $this->attachment_fname;
    }

    /**
     * @param string|null $attachment_fname
     */
    public function setAttachmentFname(?string $attachment_fname): void
    {
        $this->attachment_fname = $attachment_fname;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("color")
     */
    public function isColor(): ?bool
    {
        return $this->color;
    }

    /**
     * @param bool|null $color
     */
    public function setColor(?bool $color): void
    {
        $this->color = $color;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("cover")
     */
    public function isCover(): ?bool
    {
        return $this->cover;
    }

    /**
     * @param bool|null $cover
     */
    public function setCover(?bool $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("duplex")
     */
    public function isDuplex(): ?bool
    {
        return $this->duplex;
    }

    /**
     * @param bool|null $duplex
     */
    public function setDuplex(?bool $duplex): void
    {
        $this->duplex = $duplex;
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
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
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
     * @param string|null $error_code
     */
    public function setErrorCode(?string $error_code): void
    {
        $this->error_code = $error_code;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'snailmail.letter';
    }
}
