<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Resend;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner as PartnerAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.resend.partner
 * Name : mail.resend.partner
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Partner extends Base
{
    /**
     * Partner
     *
     * @var null|PartnerAlias
     */
    private $partner_id;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Email
     *
     * @var string
     */
    private $email;

    /**
     * Send Again
     *
     * @var bool
     */
    private $resend;

    /**
     * Resend wizard
     *
     * @var Message
     */
    private $resend_wizard_id;

    /**
     * Help message
     *
     * @var string
     */
    private $message;

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
     * @param null|PartnerAlias $partner_id
     */
    public function setPartnerId(PartnerAlias $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param bool $resend
     */
    public function setResend(bool $resend): void
    {
        $this->resend = $resend;
    }

    /**
     * @param Message $resend_wizard_id
     */
    public function setResendWizardId(Message $resend_wizard_id): void
    {
        $this->resend_wizard_id = $resend_wizard_id;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
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
