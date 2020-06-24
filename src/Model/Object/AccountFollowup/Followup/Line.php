<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountFollowup\Followup;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account_followup.followup.line
 * Name : account_followup.followup.line
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
final class Line extends Base
{
    /**
     * Follow-Up Action
     *
     * @var null|string
     */
    private $name;

    /**
     * Due Days
     *
     * @var null|int
     */
    private $delay;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * SMS Text Message
     *
     * @var string
     */
    private $sms_description;

    /**
     * Printed Message
     *
     * @var string
     */
    private $description;

    /**
     * Send an Email
     *
     * @var bool
     */
    private $send_email;

    /**
     * Print a Letter
     *
     * @var bool
     */
    private $print_letter;

    /**
     * Send an SMS Message
     *
     * @var bool
     */
    private $send_sms;

    /**
     * Join open Invoices
     *
     * @var bool
     */
    private $join_invoices;

    /**
     * Manual Action
     *
     * @var bool
     */
    private $manual_action;

    /**
     * Action To Do
     *
     * @var string
     */
    private $manual_action_note;

    /**
     * Manual Action Type
     *
     * @var Type
     */
    private $manual_action_type_id;

    /**
     * Assign a Responsible
     *
     * @var Users
     */
    private $manual_action_responsible_id;

    /**
     * Auto Execute
     *
     * @var bool
     */
    private $auto_execute;

    /**
     * Send a Letter
     *
     * @var bool
     */
    private $send_letter;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $manual_action_note
     */
    public function setManualActionNote(string $manual_action_note): void
    {
        $this->manual_action_note = $manual_action_note;
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
     * @param bool $send_letter
     */
    public function setSendLetter(bool $send_letter): void
    {
        $this->send_letter = $send_letter;
    }

    /**
     * @param bool $auto_execute
     */
    public function setAutoExecute(bool $auto_execute): void
    {
        $this->auto_execute = $auto_execute;
    }

    /**
     * @param Users $manual_action_responsible_id
     */
    public function setManualActionResponsibleId(Users $manual_action_responsible_id): void
    {
        $this->manual_action_responsible_id = $manual_action_responsible_id;
    }

    /**
     * @param Type $manual_action_type_id
     */
    public function setManualActionTypeId(Type $manual_action_type_id): void
    {
        $this->manual_action_type_id = $manual_action_type_id;
    }

    /**
     * @param bool $manual_action
     */
    public function setManualAction(bool $manual_action): void
    {
        $this->manual_action = $manual_action;
    }

    /**
     * @param null|int $delay
     */
    public function setDelay(?int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @param bool $join_invoices
     */
    public function setJoinInvoices(bool $join_invoices): void
    {
        $this->join_invoices = $join_invoices;
    }

    /**
     * @param bool $send_sms
     */
    public function setSendSms(bool $send_sms): void
    {
        $this->send_sms = $send_sms;
    }

    /**
     * @param bool $print_letter
     */
    public function setPrintLetter(bool $print_letter): void
    {
        $this->print_letter = $print_letter;
    }

    /**
     * @param bool $send_email
     */
    public function setSendEmail(bool $send_email): void
    {
        $this->send_email = $send_email;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $sms_description
     */
    public function setSmsDescription(string $sms_description): void
    {
        $this->sms_description = $sms_description;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
