<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Snailmail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\Report;
use Flux\OdooApiClient\Model\Object\Ir\Attachment;
use Flux\OdooApiClient\Model\Object\Mail\Message;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : snailmail.letter
 * Name : snailmail.letter
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
final class Letter extends Base
{
    /**
     * Sent by
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Model
     *
     * @var string
     */
    private $model;

    /**
     * Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Recipient
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Optional report to print and attach
     *
     * @var null|Report
     */
    private $report_template;

    /**
     * Attachment
     *
     * @var null|Attachment
     */
    private $attachment_id;

    /**
     * Document
     *
     * @var null|int
     */
    private $attachment_datas;

    /**
     * Attachment Filename
     *
     * @var null|string
     */
    private $attachment_fname;

    /**
     * Color
     *
     * @var null|bool
     */
    private $color;

    /**
     * Cover Page
     *
     * @var null|bool
     */
    private $cover;

    /**
     * Both side
     *
     * @var null|bool
     */
    private $duplex;

    /**
     * Status
     * When a letter is created, the status is 'Pending'.
     * If the letter is correctly sent, the status goes in 'Sent',
     * If not, it will got in state 'Error' and the error message will be displayed in the field 'Error Message'.
     *
     * @var array
     */
    private $state;

    /**
     * Error
     *
     * @var null|array
     */
    private $error_code;

    /**
     * Information
     *
     * @var null|string
     */
    private $info_msg;

    /**
     * Related Record
     *
     * @var null|string
     */
    private $reference;

    /**
     * Snailmail Status Message
     *
     * @var null|Message
     */
    private $message_id;

    /**
     * Street
     *
     * @var null|string
     */
    private $street;

    /**
     * Street2
     *
     * @var null|string
     */
    private $street2;

    /**
     * Zip
     *
     * @var null|string
     */
    private $zip;

    /**
     * City
     *
     * @var null|string
     */
    private $city;

    /**
     * State
     *
     * @var null|State
     */
    private $state_id;

    /**
     * Country
     *
     * @var null|Country
     */
    private $country_id;

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
     * @param string $model Model
     * @param int $res_id Document ID
     * @param Partner $partner_id Recipient
     * @param Company $company_id Company
     * @param array $state Status
     *        When a letter is created, the status is 'Pending'.
     *        If the letter is correctly sent, the status goes in 'Sent',
     *        If not, it will got in state 'Error' and the error message will be displayed in the field 'Error Message'.
     */
    public function __construct(
        string $model,
        int $res_id,
        Partner $partner_id,
        Company $company_id,
        array $state
    ) {
        $this->model = $model;
        $this->res_id = $res_id;
        $this->partner_id = $partner_id;
        $this->company_id = $company_id;
        $this->state = $state;
    }

    /**
     * @param mixed $item
     */
    public function addErrorCode($item): void
    {
        if ($this->hasErrorCode($item)) {
            return;
        }

        if (null === $this->error_code) {
            $this->error_code = [];
        }

        $this->error_code[] = $item;
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
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|State $state_id
     */
    public function setStateId(?State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param null|string $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param null|Message $message_id
     */
    public function setMessageId(?Message $message_id): void
    {
        $this->message_id = $message_id;
    }

    /**
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param null|string $info_msg
     */
    public function setInfoMsg(?string $info_msg): void
    {
        $this->info_msg = $info_msg;
    }

    /**
     * @param mixed $item
     */
    public function removeErrorCode($item): void
    {
        if (null === $this->error_code) {
            $this->error_code = [];
        }

        if ($this->hasErrorCode($item)) {
            $index = array_search($item, $this->error_code);
            unset($this->error_code[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasErrorCode($item, bool $strict = true): bool
    {
        if (null === $this->error_code) {
            return false;
        }

        return in_array($item, $this->error_code, $strict);
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|array $error_code
     */
    public function setErrorCode(?array $error_code): void
    {
        $this->error_code = $error_code;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param null|bool $duplex
     */
    public function setDuplex(?bool $duplex): void
    {
        $this->duplex = $duplex;
    }

    /**
     * @param null|bool $cover
     */
    public function setCover(?bool $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @param null|bool $color
     */
    public function setColor(?bool $color): void
    {
        $this->color = $color;
    }

    /**
     * @return null|string
     */
    public function getAttachmentFname(): ?string
    {
        return $this->attachment_fname;
    }

    /**
     * @return null|int
     */
    public function getAttachmentDatas(): ?int
    {
        return $this->attachment_datas;
    }

    /**
     * @param null|Attachment $attachment_id
     */
    public function setAttachmentId(?Attachment $attachment_id): void
    {
        $this->attachment_id = $attachment_id;
    }

    /**
     * @param null|Report $report_template
     */
    public function setReportTemplate(?Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
