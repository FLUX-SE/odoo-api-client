<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Coupon;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : coupon.rule
 * ---
 * Name : coupon.rule
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
class Rule extends Base
{
    /**
     * Start Date
     * ---
     * Coupon program start date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $rule_date_from;

    /**
     * End Date
     * ---
     * Coupon program end date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $rule_date_to;

    /**
     * Based on Customers
     * ---
     * Coupon program will work for selected customers only
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $rule_partners_domain;

    /**
     * Based on Products
     * ---
     * On Purchase of selected product, reward will be given
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $rule_products_domain;

    /**
     * Minimum Quantity
     * ---
     * Minimum required product quantity to get the reward
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $rule_min_quantity;

    /**
     * Rule Minimum Amount
     * ---
     * Minimum required amount to get the reward
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $rule_minimum_amount;

    /**
     * Rule Minimum Amount Tax Inclusion
     * ---
     * Selection :
     *     -> tax_included (Tax Included)
     *     -> tax_excluded (Tax Excluded)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $rule_minimum_amount_tax_inclusion;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("rule_date_from")
     */
    public function getRuleDateFrom(): ?DateTimeInterface
    {
        return $this->rule_date_from;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rule_minimum_amount_tax_inclusion")
     */
    public function getRuleMinimumAmountTaxInclusion(): ?string
    {
        return $this->rule_minimum_amount_tax_inclusion;
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
     * @param string|null $rule_minimum_amount_tax_inclusion
     */
    public function setRuleMinimumAmountTaxInclusion(?string $rule_minimum_amount_tax_inclusion): void
    {
        $this->rule_minimum_amount_tax_inclusion = $rule_minimum_amount_tax_inclusion;
    }

    /**
     * @param float|null $rule_minimum_amount
     */
    public function setRuleMinimumAmount(?float $rule_minimum_amount): void
    {
        $this->rule_minimum_amount = $rule_minimum_amount;
    }

    /**
     * @param DateTimeInterface|null $rule_date_from
     */
    public function setRuleDateFrom(?DateTimeInterface $rule_date_from): void
    {
        $this->rule_date_from = $rule_date_from;
    }

    /**
     * @return float|null
     *
     * @SerializedName("rule_minimum_amount")
     */
    public function getRuleMinimumAmount(): ?float
    {
        return $this->rule_minimum_amount;
    }

    /**
     * @param int|null $rule_min_quantity
     */
    public function setRuleMinQuantity(?int $rule_min_quantity): void
    {
        $this->rule_min_quantity = $rule_min_quantity;
    }

    /**
     * @return int|null
     *
     * @SerializedName("rule_min_quantity")
     */
    public function getRuleMinQuantity(): ?int
    {
        return $this->rule_min_quantity;
    }

    /**
     * @param string|null $rule_products_domain
     */
    public function setRuleProductsDomain(?string $rule_products_domain): void
    {
        $this->rule_products_domain = $rule_products_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rule_products_domain")
     */
    public function getRuleProductsDomain(): ?string
    {
        return $this->rule_products_domain;
    }

    /**
     * @param string|null $rule_partners_domain
     */
    public function setRulePartnersDomain(?string $rule_partners_domain): void
    {
        $this->rule_partners_domain = $rule_partners_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rule_partners_domain")
     */
    public function getRulePartnersDomain(): ?string
    {
        return $this->rule_partners_domain;
    }

    /**
     * @param DateTimeInterface|null $rule_date_to
     */
    public function setRuleDateTo(?DateTimeInterface $rule_date_to): void
    {
        $this->rule_date_to = $rule_date_to;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("rule_date_to")
     */
    public function getRuleDateTo(): ?DateTimeInterface
    {
        return $this->rule_date_to;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'coupon.rule';
    }
}
