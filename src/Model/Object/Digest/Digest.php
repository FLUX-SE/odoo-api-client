<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Digest;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Mail\Template;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : digest.digest
 * Name : digest.digest
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
final class Digest extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Recipients
     *
     * @var null|Users[]
     */
    private $user_ids;

    /**
     * Periodicity
     *
     * @var array
     */
    private $periodicity;

    /**
     * Next Send Date
     *
     * @var null|DateTimeInterface
     */
    private $next_run_date;

    /**
     * Email Template
     *
     * @var Template
     */
    private $template_id;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Available Fields
     *
     * @var null|string
     */
    private $available_fields;

    /**
     * Is user subscribed
     *
     * @var null|bool
     */
    private $is_subscribed;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Connected Users
     *
     * @var null|bool
     */
    private $kpi_res_users_connected;

    /**
     * Kpi Res Users Connected Value
     *
     * @var null|int
     */
    private $kpi_res_users_connected_value;

    /**
     * Messages
     *
     * @var null|bool
     */
    private $kpi_mail_message_total;

    /**
     * Kpi Mail Message Total Value
     *
     * @var null|int
     */
    private $kpi_mail_message_total_value;

    /**
     * Revenue
     *
     * @var null|bool
     */
    private $kpi_account_total_revenue;

    /**
     * Kpi Account Total Revenue Value
     *
     * @var null|float
     */
    private $kpi_account_total_revenue_value;

    /**
     * Bank & Cash Moves
     *
     * @var null|bool
     */
    private $kpi_account_bank_cash;

    /**
     * Kpi Account Bank Cash Value
     *
     * @var null|float
     */
    private $kpi_account_bank_cash_value;

    /**
     * All Sales
     *
     * @var null|bool
     */
    private $kpi_all_sale_total;

    /**
     * Kpi All Sale Total Value
     *
     * @var null|float
     */
    private $kpi_all_sale_total_value;

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
     * @param string $name Name
     * @param array $periodicity Periodicity
     * @param Template $template_id Email Template
     */
    public function __construct(string $name, array $periodicity, Template $template_id)
    {
        $this->name = $name;
        $this->periodicity = $periodicity;
        $this->template_id = $template_id;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
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
     * @return null|float
     */
    public function getKpiAllSaleTotalValue(): ?float
    {
        return $this->kpi_all_sale_total_value;
    }

    /**
     * @param null|bool $kpi_all_sale_total
     */
    public function setKpiAllSaleTotal(?bool $kpi_all_sale_total): void
    {
        $this->kpi_all_sale_total = $kpi_all_sale_total;
    }

    /**
     * @return null|float
     */
    public function getKpiAccountBankCashValue(): ?float
    {
        return $this->kpi_account_bank_cash_value;
    }

    /**
     * @param null|bool $kpi_account_bank_cash
     */
    public function setKpiAccountBankCash(?bool $kpi_account_bank_cash): void
    {
        $this->kpi_account_bank_cash = $kpi_account_bank_cash;
    }

    /**
     * @return null|float
     */
    public function getKpiAccountTotalRevenueValue(): ?float
    {
        return $this->kpi_account_total_revenue_value;
    }

    /**
     * @param null|bool $kpi_account_total_revenue
     */
    public function setKpiAccountTotalRevenue(?bool $kpi_account_total_revenue): void
    {
        $this->kpi_account_total_revenue = $kpi_account_total_revenue;
    }

    /**
     * @return null|int
     */
    public function getKpiMailMessageTotalValue(): ?int
    {
        return $this->kpi_mail_message_total_value;
    }

    /**
     * @param null|bool $kpi_mail_message_total
     */
    public function setKpiMailMessageTotal(?bool $kpi_mail_message_total): void
    {
        $this->kpi_mail_message_total = $kpi_mail_message_total;
    }

    /**
     * @return null|int
     */
    public function getKpiResUsersConnectedValue(): ?int
    {
        return $this->kpi_res_users_connected_value;
    }

    /**
     * @param null|bool $kpi_res_users_connected
     */
    public function setKpiResUsersConnected(?bool $kpi_res_users_connected): void
    {
        $this->kpi_res_users_connected = $kpi_res_users_connected;
    }

    /**
     * @return null|bool
     */
    public function isIsSubscribed(): ?bool
    {
        return $this->is_subscribed;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getAvailableFields(): ?string
    {
        return $this->available_fields;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param Template $template_id
     */
    public function setTemplateId(Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param null|DateTimeInterface $next_run_date
     */
    public function setNextRunDate(?DateTimeInterface $next_run_date): void
    {
        $this->next_run_date = $next_run_date;
    }

    /**
     * @param mixed $item
     */
    public function removePeriodicity($item): void
    {
        if ($this->hasPeriodicity($item)) {
            $index = array_search($item, $this->periodicity);
            unset($this->periodicity[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addPeriodicity($item): void
    {
        if ($this->hasPeriodicity($item)) {
            return;
        }

        $this->periodicity[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPeriodicity($item, bool $strict = true): bool
    {
        return in_array($item, $this->periodicity, $strict);
    }

    /**
     * @param array $periodicity
     */
    public function setPeriodicity(array $periodicity): void
    {
        $this->periodicity = $periodicity;
    }

    /**
     * @param Users $item
     */
    public function removeUserIds(Users $item): void
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
     * @param Users $item
     */
    public function addUserIds(Users $item): void
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
     * @param Users $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUserIds(Users $item, bool $strict = true): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids, $strict);
    }

    /**
     * @param null|Users[] $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
