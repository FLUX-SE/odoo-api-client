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
final class Digest extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Recipients
     *
     * @var Users
     */
    private $user_ids;

    /**
     * Periodicity
     *
     * @var null|array
     */
    private $periodicity;

    /**
     * Next Send Date
     *
     * @var DateTimeInterface
     */
    private $next_run_date;

    /**
     * Email Template
     *
     * @var null|Template
     */
    private $template_id;

    /**
     * Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Available Fields
     *
     * @var string
     */
    private $available_fields;

    /**
     * Is user subscribed
     *
     * @var bool
     */
    private $is_subscribed;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Connected Users
     *
     * @var bool
     */
    private $kpi_res_users_connected;

    /**
     * Kpi Res Users Connected Value
     *
     * @var int
     */
    private $kpi_res_users_connected_value;

    /**
     * Messages
     *
     * @var bool
     */
    private $kpi_mail_message_total;

    /**
     * Kpi Mail Message Total Value
     *
     * @var int
     */
    private $kpi_mail_message_total_value;

    /**
     * Revenue
     *
     * @var bool
     */
    private $kpi_account_total_revenue;

    /**
     * Kpi Account Total Revenue Value
     *
     * @var float
     */
    private $kpi_account_total_revenue_value;

    /**
     * Bank & Cash Moves
     *
     * @var bool
     */
    private $kpi_account_bank_cash;

    /**
     * Kpi Account Bank Cash Value
     *
     * @var float
     */
    private $kpi_account_bank_cash_value;

    /**
     * All Sales
     *
     * @var bool
     */
    private $kpi_all_sale_total;

    /**
     * Kpi All Sale Total Value
     *
     * @var float
     */
    private $kpi_all_sale_total_value;

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
     * @return int
     */
    public function getKpiResUsersConnectedValue(): int
    {
        return $this->kpi_res_users_connected_value;
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
     * @return float
     */
    public function getKpiAllSaleTotalValue(): float
    {
        return $this->kpi_all_sale_total_value;
    }

    /**
     * @param bool $kpi_all_sale_total
     */
    public function setKpiAllSaleTotal(bool $kpi_all_sale_total): void
    {
        $this->kpi_all_sale_total = $kpi_all_sale_total;
    }

    /**
     * @return float
     */
    public function getKpiAccountBankCashValue(): float
    {
        return $this->kpi_account_bank_cash_value;
    }

    /**
     * @param bool $kpi_account_bank_cash
     */
    public function setKpiAccountBankCash(bool $kpi_account_bank_cash): void
    {
        $this->kpi_account_bank_cash = $kpi_account_bank_cash;
    }

    /**
     * @return float
     */
    public function getKpiAccountTotalRevenueValue(): float
    {
        return $this->kpi_account_total_revenue_value;
    }

    /**
     * @param bool $kpi_account_total_revenue
     */
    public function setKpiAccountTotalRevenue(bool $kpi_account_total_revenue): void
    {
        $this->kpi_account_total_revenue = $kpi_account_total_revenue;
    }

    /**
     * @return int
     */
    public function getKpiMailMessageTotalValue(): int
    {
        return $this->kpi_mail_message_total_value;
    }

    /**
     * @param bool $kpi_mail_message_total
     */
    public function setKpiMailMessageTotal(bool $kpi_mail_message_total): void
    {
        $this->kpi_mail_message_total = $kpi_mail_message_total;
    }

    /**
     * @param bool $kpi_res_users_connected
     */
    public function setKpiResUsersConnected(bool $kpi_res_users_connected): void
    {
        $this->kpi_res_users_connected = $kpi_res_users_connected;
    }

    /**
     * @param Users $user_ids
     */
    public function setUserIds(Users $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return bool
     */
    public function isIsSubscribed(): bool
    {
        return $this->is_subscribed;
    }

    /**
     * @return string
     */
    public function getAvailableFields(): string
    {
        return $this->available_fields;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|Template $template_id
     */
    public function setTemplateId(Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param DateTimeInterface $next_run_date
     */
    public function setNextRunDate(DateTimeInterface $next_run_date): void
    {
        $this->next_run_date = $next_run_date;
    }

    /**
     * @param ?array $periodicity
     */
    public function removePeriodicity(?array $periodicity): void
    {
        if ($this->hasPeriodicity($periodicity)) {
            $index = array_search($periodicity, $this->periodicity);
            unset($this->periodicity[$index]);
        }
    }

    /**
     * @param ?array $periodicity
     */
    public function addPeriodicity(?array $periodicity): void
    {
        if ($this->hasPeriodicity($periodicity)) {
            return;
        }

        if (null === $this->periodicity) {
            $this->periodicity = [];
        }

        $this->periodicity[] = $periodicity;
    }

    /**
     * @param ?array $periodicity
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPeriodicity(?array $periodicity, bool $strict = true): bool
    {
        if (null === $this->periodicity) {
            return false;
        }

        return in_array($periodicity, $this->periodicity, $strict);
    }

    /**
     * @param null|array $periodicity
     */
    public function setPeriodicity(?array $periodicity): void
    {
        $this->periodicity = $periodicity;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
