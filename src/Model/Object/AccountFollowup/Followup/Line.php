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
final class Line extends Base
{
    /**
     * Follow-Up Action
     *
     * @var string
     */
    private $name;

    /**
     * Due Days
     * The number of days after the due date of the invoice to wait before sending the reminder.  Could be negative
     * if you want to send a polite alert beforehand.
     *
     * @var int
     */
    private $delay;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * SMS Text Message
     *
     * @var null|string
     */
    private $sms_description;

    /**
     * Printed Message
     *
     * @var null|string
     */
    private $description;

    /**
     * Send an Email
     * When processing, it will send an email
     *
     * @var null|bool
     */
    private $send_email;

    /**
     * Print a Letter
     * When processing, it will print a PDF
     *
     * @var null|bool
     */
    private $print_letter;

    /**
     * Send an SMS Message
     * When processing, it will send an sms text message
     *
     * @var null|bool
     */
    private $send_sms;

    /**
     * Join open Invoices
     *
     * @var null|bool
     */
    private $join_invoices;

    /**
     * Manual Action
     * When processing, it will set the manual action to be taken for that customer.
     *
     * @var null|bool
     */
    private $manual_action;

    /**
     * Action To Do
     *
     * @var null|string
     */
    private $manual_action_note;

    /**
     * Manual Action Type
     *
     * @var null|Type
     */
    private $manual_action_type_id;

    /**
     * Assign a Responsible
     *
     * @var null|Users
     */
    private $manual_action_responsible_id;

    /**
     * Auto Execute
     *
     * @var null|bool
     */
    private $auto_execute;

    /**
     * Send a Letter
     * When processing, it will send a letter by Post
     *
     * @var null|bool
     */
    private $send_letter;

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
     * @param string $name Follow-Up Action
     * @param int $delay Due Days
     *        The number of days after the due date of the invoice to wait before sending the reminder.  Could be negative
     *        if you want to send a polite alert beforehand.
     * @param Company $company_id Company
     */
    public function __construct(string $name, int $delay, Company $company_id)
    {
        $this->name = $name;
        $this->delay = $delay;
        $this->company_id = $company_id;
    }

    /**
     * @param null|string $manual_action_note
     */
    public function setManualActionNote(?string $manual_action_note): void
    {
        $this->manual_action_note = $manual_action_note;
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
     * @param null|bool $send_letter
     */
    public function setSendLetter(?bool $send_letter): void
    {
        $this->send_letter = $send_letter;
    }

    /**
     * @param null|bool $auto_execute
     */
    public function setAutoExecute(?bool $auto_execute): void
    {
        $this->auto_execute = $auto_execute;
    }

    /**
     * @param null|Users $manual_action_responsible_id
     */
    public function setManualActionResponsibleId(?Users $manual_action_responsible_id): void
    {
        $this->manual_action_responsible_id = $manual_action_responsible_id;
    }

    /**
     * @param null|Type $manual_action_type_id
     */
    public function setManualActionTypeId(?Type $manual_action_type_id): void
    {
        $this->manual_action_type_id = $manual_action_type_id;
    }

    /**
     * @param null|bool $manual_action
     */
    public function setManualAction(?bool $manual_action): void
    {
        $this->manual_action = $manual_action;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $join_invoices
     */
    public function setJoinInvoices(?bool $join_invoices): void
    {
        $this->join_invoices = $join_invoices;
    }

    /**
     * @param null|bool $send_sms
     */
    public function setSendSms(?bool $send_sms): void
    {
        $this->send_sms = $send_sms;
    }

    /**
     * @param null|bool $print_letter
     */
    public function setPrintLetter(?bool $print_letter): void
    {
        $this->print_letter = $print_letter;
    }

    /**
     * @param null|bool $send_email
     */
    public function setSendEmail(?bool $send_email): void
    {
        $this->send_email = $send_email;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|string $sms_description
     */
    public function setSmsDescription(?string $sms_description): void
    {
        $this->sms_description = $sms_description;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param int $delay
     */
    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
