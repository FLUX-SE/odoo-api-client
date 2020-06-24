<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Cash;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.cash.rounding
 * Name : account.cash.rounding
 *
 * In some countries, we need to be able to make appear on an invoice a rounding line, appearing there only
 * because the
 * smallest coinage has been removed from the circulation. For example, in Switzerland invoices have to be
 * rounded to
 * 0.05 CHF because coins of 0.01 CHF and 0.02 CHF aren't used anymore.
 * see https://en.wikipedia.org/wiki/Cash_rounding for more details.
 */
final class Rounding extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Rounding Precision
     *
     * @var null|float
     */
    private $rounding;

    /**
     * Rounding Strategy
     *
     * @var null|array
     */
    private $strategy;

    /**
     * Account
     *
     * @var Account
     */
    private $account_id;

    /**
     * Rounding Method
     *
     * @var null|array
     */
    private $rounding_method;

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
     * @param null|float $rounding
     */
    public function setRounding(?float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @param null|array $strategy
     */
    public function setStrategy(?array $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @param ?array $strategy
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStrategy(?array $strategy, bool $strict = true): bool
    {
        if (null === $this->strategy) {
            return false;
        }

        return in_array($strategy, $this->strategy, $strict);
    }

    /**
     * @param ?array $strategy
     */
    public function addStrategy(?array $strategy): void
    {
        if ($this->hasStrategy($strategy)) {
            return;
        }

        if (null === $this->strategy) {
            $this->strategy = [];
        }

        $this->strategy[] = $strategy;
    }

    /**
     * @param ?array $strategy
     */
    public function removeStrategy(?array $strategy): void
    {
        if ($this->hasStrategy($strategy)) {
            $index = array_search($strategy, $this->strategy);
            unset($this->strategy[$index]);
        }
    }

    /**
     * @param Account $account_id
     */
    public function setAccountId(Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param null|array $rounding_method
     */
    public function setRoundingMethod(?array $rounding_method): void
    {
        $this->rounding_method = $rounding_method;
    }

    /**
     * @param ?array $rounding_method
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRoundingMethod(?array $rounding_method, bool $strict = true): bool
    {
        if (null === $this->rounding_method) {
            return false;
        }

        return in_array($rounding_method, $this->rounding_method, $strict);
    }

    /**
     * @param ?array $rounding_method
     */
    public function addRoundingMethod(?array $rounding_method): void
    {
        if ($this->hasRoundingMethod($rounding_method)) {
            return;
        }

        if (null === $this->rounding_method) {
            $this->rounding_method = [];
        }

        $this->rounding_method[] = $rounding_method;
    }

    /**
     * @param ?array $rounding_method
     */
    public function removeRoundingMethod(?array $rounding_method): void
    {
        if ($this->hasRoundingMethod($rounding_method)) {
            $index = array_search($rounding_method, $this->rounding_method);
            unset($this->rounding_method[$index]);
        }
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
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
