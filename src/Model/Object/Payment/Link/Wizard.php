<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment\Link;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.link.wizard
 * Name : payment.link.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Related Document Model
     *
     * @var string
     */
    private $res_model;

    /**
     * Related Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Amount
     *
     * @var float
     */
    private $amount;

    /**
     * Amount Max
     *
     * @var null|float
     */
    private $amount_max;

    /**
     * Currency
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Email
     *
     * @var null|string
     */
    private $partner_email;

    /**
     * Payment Link
     *
     * @var null|string
     */
    private $link;

    /**
     * Payment Ref
     *
     * @var null|string
     */
    private $description;

    /**
     * Access Token
     *
     * @var null|string
     */
    private $access_token;

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
     * @param string $res_model Related Document Model
     * @param int $res_id Related Document ID
     * @param float $amount Amount
     */
    public function __construct(string $res_model, int $res_id, float $amount)
    {
        $this->res_model = $res_model;
        $this->res_id = $res_id;
        $this->amount = $amount;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param null|float $amount_max
     */
    public function setAmountMax(?float $amount_max): void
    {
        $this->amount_max = $amount_max;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|Partner $partner_id
     */
    public function setPartnerId(?Partner $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return null|string
     */
    public function getPartnerEmail(): ?string
    {
        return $this->partner_email;
    }

    /**
     * @return null|string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
