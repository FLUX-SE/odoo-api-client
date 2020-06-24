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
final class Letter extends Base
{
    /**
     * Sent by
     *
     * @var Users
     */
    private $user_id;

    /**
     * Model
     *
     * @var null|string
     */
    private $model;

    /**
     * Document ID
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Recipient
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Optional report to print and attach
     *
     * @var Report
     */
    private $report_template;

    /**
     * Attachment
     *
     * @var Attachment
     */
    private $attachment_id;

    /**
     * Document
     *
     * @var int
     */
    private $attachment_datas;

    /**
     * Attachment Filename
     *
     * @var string
     */
    private $attachment_fname;

    /**
     * Color
     *
     * @var bool
     */
    private $color;

    /**
     * Cover Page
     *
     * @var bool
     */
    private $cover;

    /**
     * Both side
     *
     * @var bool
     */
    private $duplex;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Error
     *
     * @var array
     */
    private $error_code;

    /**
     * Information
     *
     * @var string
     */
    private $info_msg;

    /**
     * Related Record
     *
     * @var string
     */
    private $reference;

    /**
     * Snailmail Status Message
     *
     * @var Message
     */
    private $message_id;

    /**
     * Street
     *
     * @var string
     */
    private $street;

    /**
     * Street2
     *
     * @var string
     */
    private $street2;

    /**
     * Zip
     *
     * @var string
     */
    private $zip;

    /**
     * City
     *
     * @var string
     */
    private $city;

    /**
     * State
     *
     * @var State
     */
    private $state_id;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

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
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param array $error_code
     */
    public function removeErrorCode(array $error_code): void
    {
        if ($this->hasErrorCode($error_code)) {
            $index = array_search($error_code, $this->error_code);
            unset($this->error_code[$index]);
        }
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
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param State $state_id
     */
    public function setStateId(State $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string $street2
     */
    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param Message $message_id
     */
    public function setMessageId(Message $message_id): void
    {
        $this->message_id = $message_id;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $info_msg
     */
    public function setInfoMsg(string $info_msg): void
    {
        $this->info_msg = $info_msg;
    }

    /**
     * @param array $error_code
     */
    public function addErrorCode(array $error_code): void
    {
        if ($this->hasErrorCode($error_code)) {
            return;
        }

        $this->error_code[] = $error_code;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param array $error_code
     * @param bool $strict
     *
     * @return bool
     */
    public function hasErrorCode(array $error_code, bool $strict = true): bool
    {
        return in_array($error_code, $this->error_code, $strict);
    }

    /**
     * @param array $error_code
     */
    public function setErrorCode(array $error_code): void
    {
        $this->error_code = $error_code;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param bool $duplex
     */
    public function setDuplex(bool $duplex): void
    {
        $this->duplex = $duplex;
    }

    /**
     * @param bool $cover
     */
    public function setCover(bool $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @param bool $color
     */
    public function setColor(bool $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getAttachmentFname(): string
    {
        return $this->attachment_fname;
    }

    /**
     * @return int
     */
    public function getAttachmentDatas(): int
    {
        return $this->attachment_datas;
    }

    /**
     * @param Attachment $attachment_id
     */
    public function setAttachmentId(Attachment $attachment_id): void
    {
        $this->attachment_id = $attachment_id;
    }

    /**
     * @param Report $report_template
     */
    public function setReportTemplate(Report $report_template): void
    {
        $this->report_template = $report_template;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
