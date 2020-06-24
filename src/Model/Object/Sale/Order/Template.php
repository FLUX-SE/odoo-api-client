<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;
use Flux\OdooApiClient\Model\Object\Sale\Order\Template\Line;
use Flux\OdooApiClient\Model\Object\Sale\Order\Template\Option;

/**
 * Odoo model : sale.order.template
 * Name : sale.order.template
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
final class Template extends Base
{
    /**
     * Quotation Template
     *
     * @var null|string
     */
    private $name;

    /**
     * Lines
     *
     * @var Line
     */
    private $sale_order_template_line_ids;

    /**
     * Terms and conditions
     *
     * @var string
     */
    private $note;

    /**
     * Optional Products
     *
     * @var Option
     */
    private $sale_order_template_option_ids;

    /**
     * Quotation Duration
     *
     * @var int
     */
    private $number_of_days;

    /**
     * Online Signature
     *
     * @var bool
     */
    private $require_signature;

    /**
     * Online Payment
     *
     * @var bool
     */
    private $require_payment;

    /**
     * Confirmation Mail
     *
     * @var TemplateAlias
     */
    private $mail_template_id;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

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
     * @param Line $sale_order_template_line_ids
     */
    public function setSaleOrderTemplateLineIds(Line $sale_order_template_line_ids): void
    {
        $this->sale_order_template_line_ids = $sale_order_template_line_ids;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Option $sale_order_template_option_ids
     */
    public function setSaleOrderTemplateOptionIds(Option $sale_order_template_option_ids): void
    {
        $this->sale_order_template_option_ids = $sale_order_template_option_ids;
    }

    /**
     * @param int $number_of_days
     */
    public function setNumberOfDays(int $number_of_days): void
    {
        $this->number_of_days = $number_of_days;
    }

    /**
     * @param bool $require_signature
     */
    public function setRequireSignature(bool $require_signature): void
    {
        $this->require_signature = $require_signature;
    }

    /**
     * @param bool $require_payment
     */
    public function setRequirePayment(bool $require_payment): void
    {
        $this->require_payment = $require_payment;
    }

    /**
     * @param TemplateAlias $mail_template_id
     */
    public function setMailTemplateId(TemplateAlias $mail_template_id): void
    {
        $this->mail_template_id = $mail_template_id;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
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
