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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Rounding Precision
     * Represent the non-zero value smallest coinage (for example, 0.05).
     *
     * @var float
     */
    private $rounding;

    /**
     * Rounding Strategy
     * Specify which way will be used to round the invoice amount to the rounding precision
     *
     * @var array
     */
    private $strategy;

    /**
     * Account
     *
     * @var null|Account
     */
    private $account_id;

    /**
     * Rounding Method
     * The tie-breaking rule used for float rounding operations
     *
     * @var array
     */
    private $rounding_method;

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
     * @param string $name Name
     * @param float $rounding Rounding Precision
     *        Represent the non-zero value smallest coinage (for example, 0.05).
     * @param array $strategy Rounding Strategy
     *        Specify which way will be used to round the invoice amount to the rounding precision
     * @param array $rounding_method Rounding Method
     *        The tie-breaking rule used for float rounding operations
     */
    public function __construct(string $name, float $rounding, array $strategy, array $rounding_method)
    {
        $this->name = $name;
        $this->rounding = $rounding;
        $this->strategy = $strategy;
        $this->rounding_method = $rounding_method;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRoundingMethod($item, bool $strict = true): bool
    {
        return in_array($item, $this->rounding_method, $strict);
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
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @param mixed $item
     */
    public function removeRoundingMethod($item): void
    {
        if ($this->hasRoundingMethod($item)) {
            $index = array_search($item, $this->rounding_method);
            unset($this->rounding_method[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addRoundingMethod($item): void
    {
        if ($this->hasRoundingMethod($item)) {
            return;
        }

        $this->rounding_method[] = $item;
    }

    /**
     * @param array $rounding_method
     */
    public function setRoundingMethod(array $rounding_method): void
    {
        $this->rounding_method = $rounding_method;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Account $account_id
     */
    public function setAccountId(?Account $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @param mixed $item
     */
    public function removeStrategy($item): void
    {
        if ($this->hasStrategy($item)) {
            $index = array_search($item, $this->strategy);
            unset($this->strategy[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addStrategy($item): void
    {
        if ($this->hasStrategy($item)) {
            return;
        }

        $this->strategy[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStrategy($item, bool $strict = true): bool
    {
        return in_array($item, $this->strategy, $strict);
    }

    /**
     * @param array $strategy
     */
    public function setStrategy(array $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @param float $rounding
     */
    public function setRounding(float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
