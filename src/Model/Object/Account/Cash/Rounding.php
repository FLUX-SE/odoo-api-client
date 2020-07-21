<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Cash;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.cash.rounding
 * Name : account.cash.rounding
 * Info :
 * In some countries, we need to be able to make appear on an invoice a rounding line, appearing there only
 * because the
 *         smallest coinage has been removed from the circulation. For example, in Switzerland invoices have to
 * be rounded to
 *         0.05 CHF because coins of 0.01 CHF and 0.02 CHF aren't used anymore.
 *         see https://en.wikipedia.org/wiki/Cash_rounding for more details.
 */
final class Rounding extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Rounding Precision
     * Represent the non-zero value smallest coinage (for example, 0.05).
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $rounding;

    /**
     * Rounding Strategy
     * Specify which way will be used to round the invoice amount to the rounding precision
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> biggest_tax (Modify tax amount)
     *     -> add_invoice_line (Add a rounding line)
     *
     *
     * @var string
     */
    private $strategy;

    /**
     * Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Rounding Method
     * The tie-breaking rule used for float rounding operations
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> UP (UP)
     *     -> DOWN (DOWN)
     *     -> HALF-UP (HALF-UP)
     *
     *
     * @var string
     */
    private $rounding_method;

    /**
     * Company
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param float $rounding Rounding Precision
     *        Represent the non-zero value smallest coinage (for example, 0.05).
     *        Searchable : yes
     *        Sortable : yes
     * @param string $strategy Rounding Strategy
     *        Specify which way will be used to round the invoice amount to the rounding precision
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> biggest_tax (Modify tax amount)
     *            -> add_invoice_line (Add a rounding line)
     *       
     * @param string $rounding_method Rounding Method
     *        The tie-breaking rule used for float rounding operations
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> UP (UP)
     *            -> DOWN (DOWN)
     *            -> HALF-UP (HALF-UP)
     *       
     */
    public function __construct(string $name, float $rounding, string $strategy, string $rounding_method)
    {
        $this->name = $name;
        $this->rounding = $rounding;
        $this->strategy = $strategy;
        $this->rounding_method = $rounding_method;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $rounding_method
     */
    public function setRoundingMethod(string $rounding_method): void
    {
        $this->rounding_method = $rounding_method;
    }

    /**
     * @return string
     */
    public function getRoundingMethod(): string
    {
        return $this->rounding_method;
    }

    /**
     * @param OdooRelation|null $account_id
     */
    public function setAccountId(?OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountId(): ?OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param string $strategy
     */
    public function setStrategy(string $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @return string
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * @param float $rounding
     */
    public function setRounding(float $rounding): void
    {
        $this->rounding = $rounding;
    }

    /**
     * @return float
     */
    public function getRounding(): float
    {
        return $this->rounding;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.cash.rounding';
    }
}
