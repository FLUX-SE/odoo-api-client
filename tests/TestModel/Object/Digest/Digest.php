<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Digest;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     *     -> daily (Daily)
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
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Currency
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
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
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     *            -> daily (Daily)
     *            -> weekly (Weekly)
     *            -> monthly (Monthly)
     *            -> quarterly (Quarterly)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $periodicity)
    {
        $this->name = $name;
        $this->periodicity = $periodicity;
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
     * @return int|null
     *
     * @SerializedName("kpi_res_users_connected_value")
     */
    public function getKpiResUsersConnectedValue(): ?int
    {
        return $this->kpi_res_users_connected_value;
    }

    /**
     * @param int|null $kpi_res_users_connected_value
     */
    public function setKpiResUsersConnectedValue(?int $kpi_res_users_connected_value): void
    {
        $this->kpi_res_users_connected_value = $kpi_res_users_connected_value;
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
     * @param float|null $kpi_account_total_revenue_value
     */
    public function setKpiAccountTotalRevenueValue(?float $kpi_account_total_revenue_value): void
    {
        $this->kpi_account_total_revenue_value = $kpi_account_total_revenue_value;
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
     * @param bool|null $kpi_res_users_connected
     */
    public function setKpiResUsersConnected(?bool $kpi_res_users_connected): void
    {
        $this->kpi_res_users_connected = $kpi_res_users_connected;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("next_run_date")
     */
    public function getNextRunDate(): ?DateTimeInterface
    {
        return $this->next_run_date;
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
     * @param DateTimeInterface|null $next_run_date
     */
    public function setNextRunDate(?DateTimeInterface $next_run_date): void
    {
        $this->next_run_date = $next_run_date;
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'digest.digest';
    }
}
