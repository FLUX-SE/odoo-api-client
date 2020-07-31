<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Cash;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.cash.rounding
 * ---
 * Name : account.cash.rounding
 * ---
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
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Rounding Precision
     * ---
     * Represent the non-zero value smallest coinage (for example, 0.05).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $rounding;

    /**
     * Rounding Strategy
     * ---
     * Specify which way will be used to round the invoice amount to the rounding precision
     * ---
     * Selection :
     *     -> biggest_tax (Modify tax amount)
     *     -> add_invoice_line (Add a rounding line)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $strategy;

    /**
     * Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_id;

    /**
     * Rounding Method
     * ---
     * The tie-breaking rule used for float rounding operations
     * ---
     * Selection :
     *     -> UP (UP)
     *     -> DOWN (DOWN)
     *     -> HALF-UP (HALF-UP)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $rounding_method;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $rounding Rounding Precision
     *        ---
     *        Represent the non-zero value smallest coinage (for example, 0.05).
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $strategy Rounding Strategy
     *        ---
     *        Specify which way will be used to round the invoice amount to the rounding precision
     *        ---
     *        Selection :
     *            -> biggest_tax (Modify tax amount)
     *            -> add_invoice_line (Add a rounding line)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $rounding_method Rounding Method
     *        ---
     *        The tie-breaking rule used for float rounding operations
     *        ---
     *        Selection :
     *            -> UP (UP)
     *            -> DOWN (DOWN)
     *            -> HALF-UP (HALF-UP)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
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
     * @param string $rounding_method
     */
    public function setRoundingMethod(string $rounding_method): void
    {
        $this->rounding_method = $rounding_method;
    }

    /**
     * @return string
     *
     * @SerializedName("rounding_method")
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
     *
     * @SerializedName("account_id")
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
     *
     * @SerializedName("strategy")
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
     *
     * @SerializedName("rounding")
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
