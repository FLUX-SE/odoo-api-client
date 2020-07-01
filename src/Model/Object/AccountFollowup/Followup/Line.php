<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountFollowup\Followup;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account_followup.followup.line
 * Name : account_followup.followup.line
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
final class Line extends Base
{
    public const ODOO_MODEL_NAME = 'account_followup.followup.line';

    /**
     * Follow-Up Action
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Due Days
     * The number of days after the due date of the invoice to wait before sending the reminder.  Could be negative
     * if you want to send a polite alert beforehand.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $delay;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * SMS Text Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sms_description;

    /**
     * Printed Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Send an Email
     * When processing, it will send an email
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $send_email;

    /**
     * Print a Letter
     * When processing, it will print a PDF
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $print_letter;

    /**
     * Send an SMS Message
     * When processing, it will send an sms text message
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $send_sms;

    /**
     * Join open Invoices
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $join_invoices;

    /**
     * Manual Action
     * When processing, it will set the manual action to be taken for that customer.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $manual_action;

    /**
     * Action To Do
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $manual_action_note;

    /**
     * Manual Action Type
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $manual_action_type_id;

    /**
     * Assign a Responsible
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $manual_action_responsible_id;

    /**
     * Auto Execute
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_execute;

    /**
     * Send a Letter
     * When processing, it will send a letter by Post
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $send_letter;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Follow-Up Action
     *        Searchable : yes
     *        Sortable : yes
     * @param int $delay Due Days
     *        The number of days after the due date of the invoice to wait before sending the reminder.  Could be negative
     *        if you want to send a polite alert beforehand.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, int $delay, OdooRelation $company_id)
    {
        $this->name = $name;
        $this->delay = $delay;
        $this->company_id = $company_id;
    }

    /**
     * @return bool|null
     */
    public function isSendLetter(): ?bool
    {
        return $this->send_letter;
    }

    /**
     * @param string|null $manual_action_note
     */
    public function setManualActionNote(?string $manual_action_note): void
    {
        $this->manual_action_note = $manual_action_note;
    }

    /**
     * @return OdooRelation|null
     */
    public function getManualActionTypeId(): ?OdooRelation
    {
        return $this->manual_action_type_id;
    }

    /**
     * @param OdooRelation|null $manual_action_type_id
     */
    public function setManualActionTypeId(?OdooRelation $manual_action_type_id): void
    {
        $this->manual_action_type_id = $manual_action_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getManualActionResponsibleId(): ?OdooRelation
    {
        return $this->manual_action_responsible_id;
    }

    /**
     * @param OdooRelation|null $manual_action_responsible_id
     */
    public function setManualActionResponsibleId(?OdooRelation $manual_action_responsible_id): void
    {
        $this->manual_action_responsible_id = $manual_action_responsible_id;
    }

    /**
     * @return bool|null
     */
    public function isAutoExecute(): ?bool
    {
        return $this->auto_execute;
    }

    /**
     * @param bool|null $auto_execute
     */
    public function setAutoExecute(?bool $auto_execute): void
    {
        $this->auto_execute = $auto_execute;
    }

    /**
     * @param bool|null $send_letter
     */
    public function setSendLetter(?bool $send_letter): void
    {
        $this->send_letter = $send_letter;
    }

    /**
     * @param bool|null $manual_action
     */
    public function setManualAction(?bool $manual_action): void
    {
        $this->manual_action = $manual_action;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return string|null
     */
    public function getManualActionNote(): ?string
    {
        return $this->manual_action_note;
    }

    /**
     * @return bool|null
     */
    public function isManualAction(): ?bool
    {
        return $this->manual_action;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDelay(): int
    {
        return $this->delay;
    }

    /**
     * @param int $delay
     */
    public function setDelay(int $delay): void
    {
        $this->delay = $delay;
    }

    /**
     * @return OdooRelation
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
     * @return string|null
     */
    public function getSmsDescription(): ?string
    {
        return $this->sms_description;
    }

    /**
     * @param string|null $sms_description
     */
    public function setSmsDescription(?string $sms_description): void
    {
        $this->sms_description = $sms_description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param bool|null $join_invoices
     */
    public function setJoinInvoices(?bool $join_invoices): void
    {
        $this->join_invoices = $join_invoices;
    }

    /**
     * @return bool|null
     */
    public function isSendEmail(): ?bool
    {
        return $this->send_email;
    }

    /**
     * @param bool|null $send_email
     */
    public function setSendEmail(?bool $send_email): void
    {
        $this->send_email = $send_email;
    }

    /**
     * @return bool|null
     */
    public function isPrintLetter(): ?bool
    {
        return $this->print_letter;
    }

    /**
     * @param bool|null $print_letter
     */
    public function setPrintLetter(?bool $print_letter): void
    {
        $this->print_letter = $print_letter;
    }

    /**
     * @return bool|null
     */
    public function isSendSms(): ?bool
    {
        return $this->send_sms;
    }

    /**
     * @param bool|null $send_sms
     */
    public function setSendSms(?bool $send_sms): void
    {
        $this->send_sms = $send_sms;
    }

    /**
     * @return bool|null
     */
    public function isJoinInvoices(): ?bool
    {
        return $this->join_invoices;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
