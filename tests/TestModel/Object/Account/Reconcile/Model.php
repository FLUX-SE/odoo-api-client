<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Reconcile;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.reconcile.model
 * ---
 * Name : account.reconcile.model
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
final class Model extends Base
{
    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

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
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $sequence;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Type
     * ---
     * Selection :
     *     -> writeoff_button (Manually create a write-off on clicked button)
     *     -> writeoff_suggestion (Suggest counterpart values)
     *     -> invoice_matching (Match existing invoices/bills)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $rule_type;

    /**
     * Auto-validate
     * ---
     * Validate the statement line automatically (reconciliation based on your rule).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_reconcile;

    /**
     * To Check
     * ---
     * This matching rule is used when the user is not certain of all the information of the counterpart.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_check;

    /**
     * Matching Order
     * ---
     * Selection :
     *     -> old_first (Oldest first)
     *     -> new_first (Newest first)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $matching_order;

    /**
     * Match Text Location Label
     * ---
     * Search in the Statement's Label to find the Invoice/Payment's reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_text_location_label;

    /**
     * Match Text Location Note
     * ---
     * Search in the Statement's Note to find the Invoice/Payment's reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_text_location_note;

    /**
     * Match Text Location Reference
     * ---
     * Search in the Statement's Reference to find the Invoice/Payment's reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_text_location_reference;

    /**
     * Journals
     * ---
     * The reconciliation model will only be available from the selected journals.
     * ---
     * Relation : many2many (account.journal)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_journal_ids;

    /**
     * Amount Nature
     * ---
     * The reconciliation model will only be applied to the selected transaction type:
     *                 * Amount Received: Only applied when receiving an amount.
     *                 * Amount Paid: Only applied when paying an amount.
     *                 * Amount Paid/Received: Applied in both cases.
     * ---
     * Selection :
     *     -> amount_received (Amount Received)
     *     -> amount_paid (Amount Paid)
     *     -> both (Amount Paid/Received)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $match_nature;

    /**
     * Amount
     * ---
     * The reconciliation model will only be applied when the amount being lower than, greater than or between
     * specified amount(s).
     * ---
     * Selection :
     *     -> lower (Is Lower Than)
     *     -> greater (Is Greater Than)
     *     -> between (Is Between)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_amount;

    /**
     * Amount Min Parameter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_amount_min;

    /**
     * Amount Max Parameter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_amount_max;

    /**
     * Label
     * ---
     * The reconciliation model will only be applied when the label:
     *                 * Contains: The proposition label must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * ---
     * Selection :
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_label;

    /**
     * Label Parameter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_label_param;

    /**
     * Note
     * ---
     * The reconciliation model will only be applied when the note:
     *                 * Contains: The proposition note must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * ---
     * Selection :
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_note;

    /**
     * Note Parameter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_note_param;

    /**
     * Transaction Type
     * ---
     * The reconciliation model will only be applied when the transaction type:
     *                 * Contains: The proposition transaction type must contains this string (case insensitive).
     *                 * Not Contains: Negation of "Contains".
     *                 * Match Regex: Define your own regular expression.
     * ---
     * Selection :
     *     -> contains (Contains)
     *     -> not_contains (Not Contains)
     *     -> match_regex (Match Regex)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_transaction_type;

    /**
     * Transaction Type Parameter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $match_transaction_type_param;

    /**
     * Same Currency Matching
     * ---
     * Restrict to propositions having the same currency as the statement line.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_same_currency;

    /**
     * Amount Matching
     * ---
     * The sum of total residual amount propositions matches the statement line amount.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_total_amount;

    /**
     * Amount Matching %
     * ---
     * The sum of total residual amount propositions matches the statement line amount under this percentage.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $match_total_amount_param;

    /**
     * Partner Is Set
     * ---
     * The reconciliation model will only be applied when a customer/vendor is set.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $match_partner;

    /**
     * Restrict Partners to
     * ---
     * The reconciliation model will only be applied to the selected customers/vendors.
     * ---
     * Relation : many2many (res.partner)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_partner_ids;

    /**
     * Restrict Partner Categories to
     * ---
     * The reconciliation model will only be applied to the selected customer/vendor categories.
     * ---
     * Relation : many2many (res.partner.category)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $match_partner_category_ids;

    /**
     * Line
     * ---
     * Relation : one2many (account.reconcile.model.line -> model_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Reconcile\Model\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $line_ids;

    /**
     * Partner Mapping Lines
     * ---
     * The mapping uses regular expressions.
     * - To Match the text at the beginning of the line (in label or notes), simply fill in your text.
     * - To Match the text anywhere (in label or notes), put your text between .*
     *     e.g: .*N°48748 abc123.*
     * ---
     * Relation : one2many (account.reconcile.model.partner.mapping -> model_id)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Reconcile\Model\Partner\Mapping
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_mapping_line_ids;

    /**
     * Past Months Limit
     * ---
     * Number of months in the past to consider entries from when applying this model.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $past_months_limit;

    /**
     * Decimal Separator
     * ---
     * Every character that is nor a digit nor this separator will be removed from the matching string
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $decimal_separator;

    /**
     * Show Decimal Separator
     * ---
     * Technical field to decide if we should show the decimal separator for the regex matching field.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $show_decimal_separator;

    /**
     * Number of entries related to this model
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $number_entries;

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
     * @param int $sequence Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $rule_type Type
     *        ---
     *        Selection :
     *            -> writeoff_button (Manually create a write-off on clicked button)
     *            -> writeoff_suggestion (Suggest counterpart values)
     *            -> invoice_matching (Match existing invoices/bills)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $matching_order Matching Order
     *        ---
     *        Selection :
     *            -> old_first (Oldest first)
     *            -> new_first (Newest first)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $match_nature Amount Nature
     *        ---
     *        The reconciliation model will only be applied to the selected transaction type:
     *                        * Amount Received: Only applied when receiving an amount.
     *                        * Amount Paid: Only applied when paying an amount.
     *                        * Amount Paid/Received: Applied in both cases.
     *        ---
     *        Selection :
     *            -> amount_received (Amount Received)
     *            -> amount_paid (Amount Paid)
     *            -> both (Amount Paid/Received)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        int $sequence,
        OdooRelation $company_id,
        string $rule_type,
        string $matching_order,
        string $match_nature
    ) {
        $this->name = $name;
        $this->sequence = $sequence;
        $this->company_id = $company_id;
        $this->rule_type = $rule_type;
        $this->matching_order = $matching_order;
        $this->match_nature = $match_nature;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchPartnerIds(OdooRelation $item): void
    {
        if ($this->hasMatchPartnerIds($item)) {
            return;
        }

        if (null === $this->match_partner_ids) {
            $this->match_partner_ids = [];
        }

        $this->match_partner_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("line_ids")
     */
    public function getLineIds(): ?array
    {
        return $this->line_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchPartnerCategoryIds(OdooRelation $item): void
    {
        if (null === $this->match_partner_category_ids) {
            $this->match_partner_category_ids = [];
        }

        if ($this->hasMatchPartnerCategoryIds($item)) {
            $index = array_search($item, $this->match_partner_category_ids);
            unset($this->match_partner_category_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchPartnerCategoryIds(OdooRelation $item): void
    {
        if ($this->hasMatchPartnerCategoryIds($item)) {
            return;
        }

        if (null === $this->match_partner_category_ids) {
            $this->match_partner_category_ids = [];
        }

        $this->match_partner_category_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchPartnerCategoryIds(OdooRelation $item): bool
    {
        if (null === $this->match_partner_category_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_category_ids);
    }

    /**
     * @param OdooRelation[]|null $match_partner_category_ids
     */
    public function setMatchPartnerCategoryIds(?array $match_partner_category_ids): void
    {
        $this->match_partner_category_ids = $match_partner_category_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("match_partner_category_ids")
     */
    public function getMatchPartnerCategoryIds(): ?array
    {
        return $this->match_partner_category_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchPartnerIds(OdooRelation $item): void
    {
        if (null === $this->match_partner_ids) {
            $this->match_partner_ids = [];
        }

        if ($this->hasMatchPartnerIds($item)) {
            $index = array_search($item, $this->match_partner_ids);
            unset($this->match_partner_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->match_partner_ids) {
            return false;
        }

        return in_array($item, $this->match_partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLineIds(OdooRelation $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $match_partner_ids
     */
    public function setMatchPartnerIds(?array $match_partner_ids): void
    {
        $this->match_partner_ids = $match_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("match_partner_ids")
     */
    public function getMatchPartnerIds(): ?array
    {
        return $this->match_partner_ids;
    }

    /**
     * @param bool|null $match_partner
     */
    public function setMatchPartner(?bool $match_partner): void
    {
        $this->match_partner = $match_partner;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_partner")
     */
    public function isMatchPartner(): ?bool
    {
        return $this->match_partner;
    }

    /**
     * @param float|null $match_total_amount_param
     */
    public function setMatchTotalAmountParam(?float $match_total_amount_param): void
    {
        $this->match_total_amount_param = $match_total_amount_param;
    }

    /**
     * @return float|null
     *
     * @SerializedName("match_total_amount_param")
     */
    public function getMatchTotalAmountParam(): ?float
    {
        return $this->match_total_amount_param;
    }

    /**
     * @param bool|null $match_total_amount
     */
    public function setMatchTotalAmount(?bool $match_total_amount): void
    {
        $this->match_total_amount = $match_total_amount;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_total_amount")
     */
    public function isMatchTotalAmount(): ?bool
    {
        return $this->match_total_amount;
    }

    /**
     * @param bool|null $match_same_currency
     */
    public function setMatchSameCurrency(?bool $match_same_currency): void
    {
        $this->match_same_currency = $match_same_currency;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLineIds(OdooRelation $item): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLineIds(OdooRelation $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param string|null $match_transaction_type_param
     */
    public function setMatchTransactionTypeParam(?string $match_transaction_type_param): void
    {
        $this->match_transaction_type_param = $match_transaction_type_param;
    }

    /**
     * @return int|null
     *
     * @SerializedName("number_entries")
     */
    public function getNumberEntries(): ?int
    {
        return $this->number_entries;
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
     * @param int|null $number_entries
     */
    public function setNumberEntries(?int $number_entries): void
    {
        $this->number_entries = $number_entries;
    }

    /**
     * @param bool|null $show_decimal_separator
     */
    public function setShowDecimalSeparator(?bool $show_decimal_separator): void
    {
        $this->show_decimal_separator = $show_decimal_separator;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_mapping_line_ids")
     */
    public function getPartnerMappingLineIds(): ?array
    {
        return $this->partner_mapping_line_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("show_decimal_separator")
     */
    public function isShowDecimalSeparator(): ?bool
    {
        return $this->show_decimal_separator;
    }

    /**
     * @param string|null $decimal_separator
     */
    public function setDecimalSeparator(?string $decimal_separator): void
    {
        $this->decimal_separator = $decimal_separator;
    }

    /**
     * @return string|null
     *
     * @SerializedName("decimal_separator")
     */
    public function getDecimalSeparator(): ?string
    {
        return $this->decimal_separator;
    }

    /**
     * @param int|null $past_months_limit
     */
    public function setPastMonthsLimit(?int $past_months_limit): void
    {
        $this->past_months_limit = $past_months_limit;
    }

    /**
     * @return int|null
     *
     * @SerializedName("past_months_limit")
     */
    public function getPastMonthsLimit(): ?int
    {
        return $this->past_months_limit;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerMappingLineIds(OdooRelation $item): void
    {
        if (null === $this->partner_mapping_line_ids) {
            $this->partner_mapping_line_ids = [];
        }

        if ($this->hasPartnerMappingLineIds($item)) {
            $index = array_search($item, $this->partner_mapping_line_ids);
            unset($this->partner_mapping_line_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerMappingLineIds(OdooRelation $item): void
    {
        if ($this->hasPartnerMappingLineIds($item)) {
            return;
        }

        if (null === $this->partner_mapping_line_ids) {
            $this->partner_mapping_line_ids = [];
        }

        $this->partner_mapping_line_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerMappingLineIds(OdooRelation $item): bool
    {
        if (null === $this->partner_mapping_line_ids) {
            return false;
        }

        return in_array($item, $this->partner_mapping_line_ids);
    }

    /**
     * @param OdooRelation[]|null $partner_mapping_line_ids
     */
    public function setPartnerMappingLineIds(?array $partner_mapping_line_ids): void
    {
        $this->partner_mapping_line_ids = $partner_mapping_line_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_same_currency")
     */
    public function isMatchSameCurrency(): ?bool
    {
        return $this->match_same_currency;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_transaction_type_param")
     */
    public function getMatchTransactionTypeParam(): ?string
    {
        return $this->match_transaction_type_param;
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
     * @param bool|null $auto_reconcile
     */
    public function setAutoReconcile(?bool $auto_reconcile): void
    {
        $this->auto_reconcile = $auto_reconcile;
    }

    /**
     * @param bool|null $match_text_location_note
     */
    public function setMatchTextLocationNote(?bool $match_text_location_note): void
    {
        $this->match_text_location_note = $match_text_location_note;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_text_location_note")
     */
    public function isMatchTextLocationNote(): ?bool
    {
        return $this->match_text_location_note;
    }

    /**
     * @param bool|null $match_text_location_label
     */
    public function setMatchTextLocationLabel(?bool $match_text_location_label): void
    {
        $this->match_text_location_label = $match_text_location_label;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_text_location_label")
     */
    public function isMatchTextLocationLabel(): ?bool
    {
        return $this->match_text_location_label;
    }

    /**
     * @param string $matching_order
     */
    public function setMatchingOrder(string $matching_order): void
    {
        $this->matching_order = $matching_order;
    }

    /**
     * @return string
     *
     * @SerializedName("matching_order")
     */
    public function getMatchingOrder(): string
    {
        return $this->matching_order;
    }

    /**
     * @param bool|null $to_check
     */
    public function setToCheck(?bool $to_check): void
    {
        $this->to_check = $to_check;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_check")
     */
    public function isToCheck(): ?bool
    {
        return $this->to_check;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_reconcile")
     */
    public function isAutoReconcile(): ?bool
    {
        return $this->auto_reconcile;
    }

    /**
     * @param bool|null $match_text_location_reference
     */
    public function setMatchTextLocationReference(?bool $match_text_location_reference): void
    {
        $this->match_text_location_reference = $match_text_location_reference;
    }

    /**
     * @param string $rule_type
     */
    public function setRuleType(string $rule_type): void
    {
        $this->rule_type = $rule_type;
    }

    /**
     * @return string
     *
     * @SerializedName("rule_type")
     */
    public function getRuleType(): string
    {
        return $this->rule_type;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): int
    {
        return $this->sequence;
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
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("match_text_location_reference")
     */
    public function isMatchTextLocationReference(): ?bool
    {
        return $this->match_text_location_reference;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("match_journal_ids")
     */
    public function getMatchJournalIds(): ?array
    {
        return $this->match_journal_ids;
    }

    /**
     * @param string|null $match_transaction_type
     */
    public function setMatchTransactionType(?string $match_transaction_type): void
    {
        $this->match_transaction_type = $match_transaction_type;
    }

    /**
     * @param float|null $match_amount_max
     */
    public function setMatchAmountMax(?float $match_amount_max): void
    {
        $this->match_amount_max = $match_amount_max;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_transaction_type")
     */
    public function getMatchTransactionType(): ?string
    {
        return $this->match_transaction_type;
    }

    /**
     * @param string|null $match_note_param
     */
    public function setMatchNoteParam(?string $match_note_param): void
    {
        $this->match_note_param = $match_note_param;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_note_param")
     */
    public function getMatchNoteParam(): ?string
    {
        return $this->match_note_param;
    }

    /**
     * @param string|null $match_note
     */
    public function setMatchNote(?string $match_note): void
    {
        $this->match_note = $match_note;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_note")
     */
    public function getMatchNote(): ?string
    {
        return $this->match_note;
    }

    /**
     * @param string|null $match_label_param
     */
    public function setMatchLabelParam(?string $match_label_param): void
    {
        $this->match_label_param = $match_label_param;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_label_param")
     */
    public function getMatchLabelParam(): ?string
    {
        return $this->match_label_param;
    }

    /**
     * @param string|null $match_label
     */
    public function setMatchLabel(?string $match_label): void
    {
        $this->match_label = $match_label;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_label")
     */
    public function getMatchLabel(): ?string
    {
        return $this->match_label;
    }

    /**
     * @return float|null
     *
     * @SerializedName("match_amount_max")
     */
    public function getMatchAmountMax(): ?float
    {
        return $this->match_amount_max;
    }

    /**
     * @param OdooRelation[]|null $match_journal_ids
     */
    public function setMatchJournalIds(?array $match_journal_ids): void
    {
        $this->match_journal_ids = $match_journal_ids;
    }

    /**
     * @param float|null $match_amount_min
     */
    public function setMatchAmountMin(?float $match_amount_min): void
    {
        $this->match_amount_min = $match_amount_min;
    }

    /**
     * @return float|null
     *
     * @SerializedName("match_amount_min")
     */
    public function getMatchAmountMin(): ?float
    {
        return $this->match_amount_min;
    }

    /**
     * @param string|null $match_amount
     */
    public function setMatchAmount(?string $match_amount): void
    {
        $this->match_amount = $match_amount;
    }

    /**
     * @return string|null
     *
     * @SerializedName("match_amount")
     */
    public function getMatchAmount(): ?string
    {
        return $this->match_amount;
    }

    /**
     * @param string $match_nature
     */
    public function setMatchNature(string $match_nature): void
    {
        $this->match_nature = $match_nature;
    }

    /**
     * @return string
     *
     * @SerializedName("match_nature")
     */
    public function getMatchNature(): string
    {
        return $this->match_nature;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMatchJournalIds(OdooRelation $item): void
    {
        if (null === $this->match_journal_ids) {
            $this->match_journal_ids = [];
        }

        if ($this->hasMatchJournalIds($item)) {
            $index = array_search($item, $this->match_journal_ids);
            unset($this->match_journal_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMatchJournalIds(OdooRelation $item): void
    {
        if ($this->hasMatchJournalIds($item)) {
            return;
        }

        if (null === $this->match_journal_ids) {
            $this->match_journal_ids = [];
        }

        $this->match_journal_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMatchJournalIds(OdooRelation $item): bool
    {
        if (null === $this->match_journal_ids) {
            return false;
        }

        return in_array($item, $this->match_journal_ids);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.reconcile.model';
    }
}
