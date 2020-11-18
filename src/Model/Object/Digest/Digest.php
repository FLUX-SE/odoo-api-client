<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Digest;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : digest.digest
 * ---
 * Name : digest.digest
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
final class Digest extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Recipients
     * ---
     * Relation : many2many (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $user_ids;

    /**
     * Periodicity
     * ---
     * Selection :
     *     -> weekly (Weekly)
     *     -> monthly (Monthly)
     *     -> quarterly (Quarterly)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $periodicity;

    /**
     * Next Send Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $next_run_date;

    /**
     * Email Template
     * ---
     * Relation : many2one (mail.template)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $template_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

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
     * Available Fields
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $available_fields;

    /**
     * Is user subscribed
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_subscribed;

    /**
     * Status
     * ---
     * Selection :
     *     -> activated (Activated)
     *     -> deactivated (Deactivated)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Connected Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $kpi_res_users_connected;

    /**
     * Kpi Res Users Connected Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $kpi_res_users_connected_value;

    /**
     * Messages
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $kpi_mail_message_total;

    /**
     * Kpi Mail Message Total Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $kpi_mail_message_total_value;

    /**
     * Revenue
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $kpi_account_total_revenue;

    /**
     * Kpi Account Total Revenue Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $kpi_account_total_revenue_value;

    /**
     * Bank & Cash Moves
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $kpi_account_bank_cash;

    /**
     * Kpi Account Bank Cash Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $kpi_account_bank_cash_value;

    /**
     * All Sales
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $kpi_all_sale_total;

    /**
     * Kpi All Sale Total Value
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $kpi_all_sale_total_value;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $periodicity Periodicity
     *        ---
     *        Selection :
     *            -> weekly (Weekly)
     *            -> monthly (Monthly)
     *            -> quarterly (Quarterly)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $template_id Email Template
     *        ---
     *        Relation : many2one (mail.template)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $periodicity, OdooRelation $template_id)
    {
        $this->name = $name;
        $this->periodicity = $periodicity;
        $this->template_id = $template_id;
    }

    /**
     * @param float|null $kpi_account_bank_cash_value
     */
    public function setKpiAccountBankCashValue(?float $kpi_account_bank_cash_value): void
    {
        $this->kpi_account_bank_cash_value = $kpi_account_bank_cash_value;
    }

    /**
     * @param bool|null $kpi_mail_message_total
     */
    public function setKpiMailMessageTotal(?bool $kpi_mail_message_total): void
    {
        $this->kpi_mail_message_total = $kpi_mail_message_total;
    }

    /**
     * @return int|null
     *
     * @SerializedName("kpi_mail_message_total_value")
     */
    public function getKpiMailMessageTotalValue(): ?int
    {
        return $this->kpi_mail_message_total_value;
    }

    /**
     * @param int|null $kpi_mail_message_total_value
     */
    public function setKpiMailMessageTotalValue(?int $kpi_mail_message_total_value): void
    {
        $this->kpi_mail_message_total_value = $kpi_mail_message_total_value;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("kpi_account_total_revenue")
     */
    public function isKpiAccountTotalRevenue(): ?bool
    {
        return $this->kpi_account_total_revenue;
    }

    /**
     * @param bool|null $kpi_account_total_revenue
     */
    public function setKpiAccountTotalRevenue(?bool $kpi_account_total_revenue): void
    {
        $this->kpi_account_total_revenue = $kpi_account_total_revenue;
    }

    /**
     * @return float|null
     *
     * @SerializedName("kpi_account_total_revenue_value")
     */
    public function getKpiAccountTotalRevenueValue(): ?float
    {
        return $this->kpi_account_total_revenue_value;
    }

    /**
     * @param float|null $kpi_account_total_revenue_value
     */
    public function setKpiAccountTotalRevenueValue(?float $kpi_account_total_revenue_value): void
    {
        $this->kpi_account_total_revenue_value = $kpi_account_total_revenue_value;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("kpi_account_bank_cash")
     */
    public function isKpiAccountBankCash(): ?bool
    {
        return $this->kpi_account_bank_cash;
    }

    /**
     * @param bool|null $kpi_account_bank_cash
     */
    public function setKpiAccountBankCash(?bool $kpi_account_bank_cash): void
    {
        $this->kpi_account_bank_cash = $kpi_account_bank_cash;
    }

    /**
     * @return float|null
     *
     * @SerializedName("kpi_account_bank_cash_value")
     */
    public function getKpiAccountBankCashValue(): ?float
    {
        return $this->kpi_account_bank_cash_value;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("kpi_all_sale_total")
     */
    public function isKpiAllSaleTotal(): ?bool
    {
        return $this->kpi_all_sale_total;
    }

    /**
     * @param int|null $kpi_res_users_connected_value
     */
    public function setKpiResUsersConnectedValue(?int $kpi_res_users_connected_value): void
    {
        $this->kpi_res_users_connected_value = $kpi_res_users_connected_value;
    }

    /**
     * @param bool|null $kpi_all_sale_total
     */
    public function setKpiAllSaleTotal(?bool $kpi_all_sale_total): void
    {
        $this->kpi_all_sale_total = $kpi_all_sale_total;
    }

    /**
     * @return float|null
     *
     * @SerializedName("kpi_all_sale_total_value")
     */
    public function getKpiAllSaleTotalValue(): ?float
    {
        return $this->kpi_all_sale_total_value;
    }

    /**
     * @param float|null $kpi_all_sale_total_value
     */
    public function setKpiAllSaleTotalValue(?float $kpi_all_sale_total_value): void
    {
        $this->kpi_all_sale_total_value = $kpi_all_sale_total_value;
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
     * @return bool|null
     *
     * @SerializedName("kpi_mail_message_total")
     */
    public function isKpiMailMessageTotal(): ?bool
    {
        return $this->kpi_mail_message_total;
    }

    /**
     * @return int|null
     *
     * @SerializedName("kpi_res_users_connected_value")
     */
    public function getKpiResUsersConnectedValue(): ?int
    {
        return $this->kpi_res_users_connected_value;
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
     * @return OdooRelation
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): OdooRelation
    {
        return $this->template_id;
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
     * @SerializedName("user_ids")
     */
    public function getUserIds(): ?array
    {
        return $this->user_ids;
    }

    /**
     * @param OdooRelation[]|null $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUserIds(OdooRelation $item): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addUserIds(OdooRelation $item): void
    {
        if ($this->hasUserIds($item)) {
            return;
        }

        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        $this->user_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUserIds(OdooRelation $item): void
    {
        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        if ($this->hasUserIds($item)) {
            $index = array_search($item, $this->user_ids);
            unset($this->user_ids[$index]);
        }
    }

    /**
     * @return string
     *
     * @SerializedName("periodicity")
     */
    public function getPeriodicity(): string
    {
        return $this->periodicity;
    }

    /**
     * @param string $periodicity
     */
    public function setPeriodicity(string $periodicity): void
    {
        $this->periodicity = $periodicity;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("next_run_date")
     */
    public function getNextRunDate(): ?DateTimeInterface
    {
        return $this->next_run_date;
    }

    /**
     * @param DateTimeInterface|null $next_run_date
     */
    public function setNextRunDate(?DateTimeInterface $next_run_date): void
    {
        $this->next_run_date = $next_run_date;
    }

    /**
     * @param OdooRelation $template_id
     */
    public function setTemplateId(OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param bool|null $kpi_res_users_connected
     */
    public function setKpiResUsersConnected(?bool $kpi_res_users_connected): void
    {
        $this->kpi_res_users_connected = $kpi_res_users_connected;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
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
     * @return string|null
     *
     * @SerializedName("available_fields")
     */
    public function getAvailableFields(): ?string
    {
        return $this->available_fields;
    }

    /**
     * @param string|null $available_fields
     */
    public function setAvailableFields(?string $available_fields): void
    {
        $this->available_fields = $available_fields;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_subscribed")
     */
    public function isIsSubscribed(): ?bool
    {
        return $this->is_subscribed;
    }

    /**
     * @param bool|null $is_subscribed
     */
    public function setIsSubscribed(?bool $is_subscribed): void
    {
        $this->is_subscribed = $is_subscribed;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("kpi_res_users_connected")
     */
    public function isKpiResUsersConnected(): ?bool
    {
        return $this->kpi_res_users_connected;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'digest.digest';
    }
}
