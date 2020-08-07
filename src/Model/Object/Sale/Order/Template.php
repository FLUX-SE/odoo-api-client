<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Order;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.order.template
 * ---
 * Name : sale.order.template
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
final class Template extends Base
{
    /**
     * Quotation Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Lines
     * ---
     * Relation : one2many (sale.order.template.line -> sale_order_template_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Template\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_template_line_ids;

    /**
     * Terms and conditions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Optional Products
     * ---
     * Relation : one2many (sale.order.template.option -> sale_order_template_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order\Template\Option
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sale_order_template_option_ids;

    /**
     * Quotation Duration
     * ---
     * Number of days for the validity date computation of the quotation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $number_of_days;

    /**
     * Online Signature
     * ---
     * Request a online signature to the customer in order to confirm orders automatically.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_signature;

    /**
     * Online Payment
     * ---
     * Request an online payment to the customer in order to confirm orders automatically.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $require_payment;

    /**
     * Confirmation Mail
     * ---
     * This e-mail template will be sent on confirmation. Leave empty to send nothing.
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $mail_template_id;

    /**
     * Active
     * ---
     * If unchecked, it will allow you to hide the quotation template without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param string $name Quotation Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @return OdooRelation|null
     *
     * @SerializedName("mail_template_id")
     */
    public function getMailTemplateId(): ?OdooRelation
    {
        return $this->mail_template_id;
    }

    /**
     * @param OdooRelation|null $mail_template_id
     */
    public function setMailTemplateId(?OdooRelation $mail_template_id): void
    {
        $this->mail_template_id = $mail_template_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("require_payment")
     */
    public function isRequirePayment(): ?bool
    {
        return $this->require_payment;
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
     * @param bool|null $require_payment
     */
    public function setRequirePayment(?bool $require_payment): void
    {
        $this->require_payment = $require_payment;
    }

    /**
     * @param bool|null $require_signature
     */
    public function setRequireSignature(?bool $require_signature): void
    {
        $this->require_signature = $require_signature;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("note")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sale_order_template_line_ids")
     */
    public function getSaleOrderTemplateLineIds(): ?array
    {
        return $this->sale_order_template_line_ids;
    }

    /**
     * @param OdooRelation[]|null $sale_order_template_line_ids
     */
    public function setSaleOrderTemplateLineIds(?array $sale_order_template_line_ids): void
    {
        $this->sale_order_template_line_ids = $sale_order_template_line_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSaleOrderTemplateLineIds(OdooRelation $item): bool
    {
        if (null === $this->sale_order_template_line_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_template_line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSaleOrderTemplateLineIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeSaleOrderTemplateLineIds(OdooRelation $item): void
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
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("require_signature")
     */
    public function isRequireSignature(): ?bool
    {
        return $this->require_signature;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sale_order_template_option_ids")
     */
    public function getSaleOrderTemplateOptionIds(): ?array
    {
        return $this->sale_order_template_option_ids;
    }

    /**
     * @param OdooRelation[]|null $sale_order_template_option_ids
     */
    public function setSaleOrderTemplateOptionIds(?array $sale_order_template_option_ids): void
    {
        $this->sale_order_template_option_ids = $sale_order_template_option_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSaleOrderTemplateOptionIds(OdooRelation $item): bool
    {
        if (null === $this->sale_order_template_option_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_template_option_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSaleOrderTemplateOptionIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeSaleOrderTemplateOptionIds(OdooRelation $item): void
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
     * @return int|null
     *
     * @SerializedName("number_of_days")
     */
    public function getNumberOfDays(): ?int
    {
        return $this->number_of_days;
    }

    /**
     * @param int|null $number_of_days
     */
    public function setNumberOfDays(?int $number_of_days): void
    {
        $this->number_of_days = $number_of_days;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.order.template';
    }
}
