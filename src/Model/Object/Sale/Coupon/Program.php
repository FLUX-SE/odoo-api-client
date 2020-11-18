<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Coupon;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.coupon.program
 * ---
 * Name : sale.coupon.program
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
final class Program extends Reward
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
     * Active
     * ---
     * A program is available for the customers when active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Coupon Rule
     * ---
     * Relation : many2one (sale.coupon.rule)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $rule_id;

    /**
     * Reward
     * ---
     * Relation : many2one (sale.coupon.reward)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Reward
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $reward_id;

    /**
     * Sequence
     * ---
     * Coupon program will be applied based on given sequence if multiple programs are defined on same condition(For
     * minimum amount)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Maximum Use Number
     * ---
     * Maximum number of sales orders in which reward can be provided
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $maximum_use_number;

    /**
     * Program Type
     * ---
     * A promotional program can be either a limited promotional offer without code (applied automatically)
     *                                 or with a code (displayed on a magazine for example) that may generate a
     * discount on the current
     *                                 order or create a coupon for a next order.
     *
     *                                 A coupon program generates coupons with a code that can be used to generate a
     * discount on the current
     *                                 order or create a coupon for a next order.
     * ---
     * Selection :
     *     -> promotion_program (Promotional Program)
     *     -> coupon_program (Coupon Program)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $program_type;

    /**
     * Promo Code Usage
     * ---
     * Automatically Applied - No code is required, if the program rules are met, the reward is applied (Except the
     * global discount or the free shipping rewards which are not cumulative)
     * Use a code - If the program rules are met, a valid code is mandatory for the reward to be applied
     *
     * ---
     * Selection :
     *     -> no_code_needed (Automatically Applied)
     *     -> code_needed (Use a code)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $promo_code_usage;

    /**
     * Promotion Code
     * ---
     * A promotion code is a code that is associated with a marketing discount. For example, a retailer might tell
     * frequent customers to enter the promotion code 'THX001' to receive a 10%% discount on their whole order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $promo_code;

    /**
     * Applicability
     * ---
     * Selection :
     *     -> on_current_order (Apply On Current Order)
     *     -> on_next_order (Apply On Next Order)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $promo_applicability;

    /**
     * Generated Coupons
     * ---
     * Relation : one2many (sale.coupon -> program_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Coupon
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $coupon_ids;

    /**
     * Coupon Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $coupon_count;

    /**
     * Order Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $order_count;

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
     * Validity Duration
     * ---
     * Validity duration for a coupon after its generation
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $validity_duration;

    /**
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $rule_id Coupon Rule
     *        ---
     *        Relation : many2one (sale.coupon.rule)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Rule
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $reward_id Reward
     *        ---
     *        Relation : many2one (sale.coupon.reward)
     *        @see \Flux\OdooApiClient\Model\Object\Sale\Coupon\Reward
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $rule_id, OdooRelation $reward_id)
    {
        $this->name = $name;
        $this->rule_id = $rule_id;
        $this->reward_id = $reward_id;
    }

    /**
     * @param int|null $coupon_count
     */
    public function setCouponCount(?int $coupon_count): void
    {
        $this->coupon_count = $coupon_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("coupon_ids")
     */
    public function getCouponIds(): ?array
    {
        return $this->coupon_ids;
    }

    /**
     * @param OdooRelation[]|null $coupon_ids
     */
    public function setCouponIds(?array $coupon_ids): void
    {
        $this->coupon_ids = $coupon_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCouponIds(OdooRelation $item): bool
    {
        if (null === $this->coupon_ids) {
            return false;
        }

        return in_array($item, $this->coupon_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addCouponIds(OdooRelation $item): void
    {
        if ($this->hasCouponIds($item)) {
            return;
        }

        if (null === $this->coupon_ids) {
            $this->coupon_ids = [];
        }

        $this->coupon_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCouponIds(OdooRelation $item): void
    {
        if (null === $this->coupon_ids) {
            $this->coupon_ids = [];
        }

        if ($this->hasCouponIds($item)) {
            $index = array_search($item, $this->coupon_ids);
            unset($this->coupon_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("coupon_count")
     */
    public function getCouponCount(): ?int
    {
        return $this->coupon_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("order_count")
     */
    public function getOrderCount(): ?int
    {
        return $this->order_count;
    }

    /**
     * @return string|null
     *
     * @SerializedName("promo_applicability")
     */
    public function getPromoApplicability(): ?string
    {
        return $this->promo_applicability;
    }

    /**
     * @param int|null $order_count
     */
    public function setOrderCount(?int $order_count): void
    {
        $this->order_count = $order_count;
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
     * @return int|null
     *
     * @SerializedName("validity_duration")
     */
    public function getValidityDuration(): ?int
    {
        return $this->validity_duration;
    }

    /**
     * @param int|null $validity_duration
     */
    public function setValidityDuration(?int $validity_duration): void
    {
        $this->validity_duration = $validity_duration;
    }

    /**
     * @param string|null $promo_applicability
     */
    public function setPromoApplicability(?string $promo_applicability): void
    {
        $this->promo_applicability = $promo_applicability;
    }

    /**
     * @param string|null $promo_code
     */
    public function setPromoCode(?string $promo_code): void
    {
        $this->promo_code = $promo_code;
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
     * @param OdooRelation $reward_id
     */
    public function setRewardId(OdooRelation $reward_id): void
    {
        $this->reward_id = $reward_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("rule_id")
     */
    public function getRuleId(): OdooRelation
    {
        return $this->rule_id;
    }

    /**
     * @param OdooRelation $rule_id
     */
    public function setRuleId(OdooRelation $rule_id): void
    {
        $this->rule_id = $rule_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("reward_id")
     */
    public function getRewardId(): OdooRelation
    {
        return $this->reward_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return string|null
     *
     * @SerializedName("promo_code")
     */
    public function getPromoCode(): ?string
    {
        return $this->promo_code;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("maximum_use_number")
     */
    public function getMaximumUseNumber(): ?int
    {
        return $this->maximum_use_number;
    }

    /**
     * @param int|null $maximum_use_number
     */
    public function setMaximumUseNumber(?int $maximum_use_number): void
    {
        $this->maximum_use_number = $maximum_use_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("program_type")
     */
    public function getProgramType(): ?string
    {
        return $this->program_type;
    }

    /**
     * @param string|null $program_type
     */
    public function setProgramType(?string $program_type): void
    {
        $this->program_type = $program_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("promo_code_usage")
     */
    public function getPromoCodeUsage(): ?string
    {
        return $this->promo_code_usage;
    }

    /**
     * @param string|null $promo_code_usage
     */
    public function setPromoCodeUsage(?string $promo_code_usage): void
    {
        $this->promo_code_usage = $promo_code_usage;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.coupon.program';
    }
}
