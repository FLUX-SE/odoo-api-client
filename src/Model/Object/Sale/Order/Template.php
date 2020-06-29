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
final class Template extends Base
{
    /**
     * Quotation Template
     *
     * @var string
     */
    private $name;

    /**
     * Lines
     *
     * @var null|Line[]
     */
    private $sale_order_template_line_ids;

    /**
     * Terms and conditions
     *
     * @var null|string
     */
    private $note;

    /**
     * Optional Products
     *
     * @var null|Option[]
     */
    private $sale_order_template_option_ids;

    /**
     * Quotation Duration
     * Number of days for the validity date computation of the quotation
     *
     * @var null|int
     */
    private $number_of_days;

    /**
     * Online Signature
     * Request a online signature to the customer in order to confirm orders automatically.
     *
     * @var null|bool
     */
    private $require_signature;

    /**
     * Online Payment
     * Request an online payment to the customer in order to confirm orders automatically.
     *
     * @var null|bool
     */
    private $require_payment;

    /**
     * Confirmation Mail
     * This e-mail template will be sent on confirmation. Leave empty to send nothing.
     *
     * @var null|TemplateAlias
     */
    private $mail_template_id;

    /**
     * Active
     * If unchecked, it will allow you to hide the quotation template without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

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
     * @param string $name Quotation Template
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param null|int $number_of_days
     */
    public function setNumberOfDays(?int $number_of_days): void
    {
        $this->number_of_days = $number_of_days;
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
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|TemplateAlias $mail_template_id
     */
    public function setMailTemplateId(?TemplateAlias $mail_template_id): void
    {
        $this->mail_template_id = $mail_template_id;
    }

    /**
     * @param null|bool $require_payment
     */
    public function setRequirePayment(?bool $require_payment): void
    {
        $this->require_payment = $require_payment;
    }

    /**
     * @param null|bool $require_signature
     */
    public function setRequireSignature(?bool $require_signature): void
    {
        $this->require_signature = $require_signature;
    }

    /**
     * @param Option $item
     */
    public function removeSaleOrderTemplateOptionIds(Option $item): void
    {
        if (null === $this->sale_order_template_option_ids) {
            $this->sale_order_template_option_ids = [];
        }

        if ($this->hasSaleOrderTemplateOptionIds($item)) {
            $index = array_search($item, $this->sale_order_template_option_ids);
            unset($this->sale_order_template_option_ids[$index]);
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Option $item
     */
    public function addSaleOrderTemplateOptionIds(Option $item): void
    {
        if ($this->hasSaleOrderTemplateOptionIds($item)) {
            return;
        }

        if (null === $this->sale_order_template_option_ids) {
            $this->sale_order_template_option_ids = [];
        }

        $this->sale_order_template_option_ids[] = $item;
    }

    /**
     * @param Option $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOrderTemplateOptionIds(Option $item, bool $strict = true): bool
    {
        if (null === $this->sale_order_template_option_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_template_option_ids, $strict);
    }

    /**
     * @param null|Option[] $sale_order_template_option_ids
     */
    public function setSaleOrderTemplateOptionIds(?array $sale_order_template_option_ids): void
    {
        $this->sale_order_template_option_ids = $sale_order_template_option_ids;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Line $item
     */
    public function removeSaleOrderTemplateLineIds(Line $item): void
    {
        if (null === $this->sale_order_template_line_ids) {
            $this->sale_order_template_line_ids = [];
        }

        if ($this->hasSaleOrderTemplateLineIds($item)) {
            $index = array_search($item, $this->sale_order_template_line_ids);
            unset($this->sale_order_template_line_ids[$index]);
        }
    }

    /**
     * @param Line $item
     */
    public function addSaleOrderTemplateLineIds(Line $item): void
    {
        if ($this->hasSaleOrderTemplateLineIds($item)) {
            return;
        }

        if (null === $this->sale_order_template_line_ids) {
            $this->sale_order_template_line_ids = [];
        }

        $this->sale_order_template_line_ids[] = $item;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaleOrderTemplateLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->sale_order_template_line_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_template_line_ids, $strict);
    }

    /**
     * @param null|Line[] $sale_order_template_line_ids
     */
    public function setSaleOrderTemplateLineIds(?array $sale_order_template_line_ids): void
    {
        $this->sale_order_template_line_ids = $sale_order_template_line_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
