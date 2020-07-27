<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : payment.acquirer
 * ---
 * Name : payment.acquirer
 * ---
 * Info :
 * Acquirer Model. Each specific acquirer can extend the model by adding
 *         its own fields, using the acquirer_name as a prefix for the new fields.
 *         Using the required_if_provider='<name>' attribute on fields it is possible
 *         to have required fields that depend on a specific acquirer.
 *
 *         Each acquirer has a link to an ir.ui.view record that is a template of
 *         a button used to display the payment form. See examples in ``payment_ingenico``
 *         and ``payment_paypal`` modules.
 *
 *         Methods that should be added in an acquirer-specific implementation:
 *
 *           - ``<name>_form_generate_values(self, reference, amount, currency,
 *               partner_id=False, partner_values=None, tx_custom_values=None)``:
 *               method that generates the values used to render the form button template.
 *           - ``<name>_get_form_action_url(self):``: method that returns the url of
 *               the button form. It is used for example in ecommerce application if you
 *               want to post some data to the acquirer.
 *           - ``<name>_compute_fees(self, amount, currency_id, country_id)``: computes
 *               the fees of the acquirer, using generic fields defined on the acquirer
 *               model (see fields definition).
 *
 *         Each acquirer should also define controllers to handle communication between
 *         OpenERP and the acquirer. It generally consists in return urls given to the
 *         button form and that the acquirer uses to send the customer back after the
 *         transaction, with transaction details given as a POST request.
 */
final class Acquirer extends Base
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
     * Color
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Displayed as
     * ---
     * How the acquirer is displayed to the customers.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $display_as;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Sequence
     * ---
     * Determine the display order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Form Button Template
     * ---
     * This template renders the acquirer button with all necessary values.
     * It is rendered with qWeb with the following evaluation context:
     * tx_url: transaction URL to post the form
     * acquirer: payment.acquirer browse record
     * user: current user browse record
     * reference: the transaction reference number
     * currency: the transaction currency browse record
     * amount: the transaction amount, a float
     * partner: the buyer partner browse record, not necessarily set
     * partner_values: specific values about the buyer, for example coming from a shipping form
     * tx_values: transaction values
     * context: the current context dictionary
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $view_template_id;

    /**
     * S2S Form Template
     * ---
     * Template for method registration
     * ---
     * Relation : many2one (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $registration_view_template_id;

    /**
     * State
     * ---
     * In test mode, a fake payment is processed through a test
     *                           payment interface. This mode is advised when setting up the
     *                           acquirer. Watch out, test and production modes require
     *                           different credentials.
     * ---
     * Selection : (default value, usually null)
     *     -> disabled (Disabled)
     *     -> enabled (Enabled)
     *     -> test (Test Mode)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $state;

    /**
     * Capture Amount Manually
     * ---
     * Capture the amount from Odoo, when the delivery is completed.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $capture_manually;

    /**
     * Payment Journal
     * ---
     * Journal where the successful transactions will be posted
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $journal_id;

    /**
     * Verify Card Validity
     * ---
     * Trigger a transaction of 1 currency unit and its refund to check the validity of new credit cards entered in
     * the customer portal.
     *                 Without this check, the validity will be verified at the very first transaction.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $check_validity;

    /**
     * Countries
     * ---
     * This payment gateway is available for selected countries. If none is selected it is available for all
     * countries.
     * ---
     * Relation : many2many (res.country)
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $country_ids;

    /**
     * Help Message
     * ---
     * Message displayed to explain and help the payment process.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $pre_msg;

    /**
     * Authorize Message
     * ---
     * Message displayed if payment is authorized.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $auth_msg;

    /**
     * Pending Message
     * ---
     * Message displayed, if order is in pending state after having done the payment process.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $pending_msg;

    /**
     * Done Message
     * ---
     * Message displayed, if order is done successfully after having done the payment process.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $done_msg;

    /**
     * Cancel Message
     * ---
     * Message displayed, if order is cancel during the payment process.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $cancel_msg;

    /**
     * Save Cards
     * ---
     * This option allows customers to save their credit card as a payment token and to reuse it for a later
     * purchase. If you manage subscriptions (recurring invoicing), you need it to automatically charge the customer
     * when you issue an invoice.
     * ---
     * Selection : (default value, usually null)
     *     -> none (Never)
     *     -> ask (Let the customer decide)
     *     -> always (Always)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $save_token;

    /**
     * Saving Card Data supported
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $token_implemented;

    /**
     * Authorize Mechanism Supported
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $authorize_implemented;

    /**
     * Fees Computation Supported
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $fees_implemented;

    /**
     * Add Extra Fees
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $fees_active;

    /**
     * Fixed domestic fees
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees_dom_fixed;

    /**
     * Variable domestic fees (in percents)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees_dom_var;

    /**
     * Fixed international fees
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees_int_fixed;

    /**
     * Variable international fees (in percents)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $fees_int_var;

    /**
     * Use SEPA QR Code
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $qr_code;

    /**
     * Corresponding Module
     * ---
     * Relation : many2one (ir.module.module)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $module_id;

    /**
     * Installation State
     * ---
     * Selection : (default value, usually null)
     *     -> uninstallable (Uninstallable)
     *     -> uninstalled (Not Installed)
     *     -> installed (Installed)
     *     -> to upgrade (To be upgraded)
     *     -> to remove (To be removed)
     *     -> to install (To be installed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $module_state;

    /**
     * Odoo Enterprise Module
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $module_to_buy;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $image_128;

    /**
     * Supported Payment Icons
     * ---
     * Relation : many2many (payment.icon)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Icon
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_icon_ids;

    /**
     * Payment Flow
     * ---
     * Note: Subscriptions does not take this field in account, it uses server to server by default.
     * ---
     * Selection : (default value, usually null)
     *     -> form (Redirection to the acquirer website)
     *     -> s2s (Payment from Odoo)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $payment_flow;

    /**
     * For Incoming Payments
     * ---
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo,you are suggested to reconcile the transaction with the batch
     * deposit. Enable this option from the settings.
     * ---
     * Relation : many2many (account.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $inbound_payment_method_ids;

    /**
     * Provider
     * ---
     * Selection : (default value, usually null)
     *     -> manual (Custom Payment Form)
     *     -> transfer (Manual Payment)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $provider;

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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $state State
     *        ---
     *        In test mode, a fake payment is processed through a test
     *                                  payment interface. This mode is advised when setting up the
     *                                  acquirer. Watch out, test and production modes require
     *                                  different credentials.
     *        ---
     *        Selection : (default value, usually null)
     *            -> disabled (Disabled)
     *            -> enabled (Enabled)
     *            -> test (Test Mode)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $payment_flow Payment Flow
     *        ---
     *        Note: Subscriptions does not take this field in account, it uses server to server by default.
     *        ---
     *        Selection : (default value, usually null)
     *            -> form (Redirection to the acquirer website)
     *            -> s2s (Payment from Odoo)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $provider Provider
     *        ---
     *        Selection : (default value, usually null)
     *            -> manual (Custom Payment Form)
     *            -> transfer (Manual Payment)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        OdooRelation $company_id,
        string $state,
        string $payment_flow,
        string $provider
    ) {
        $this->name = $name;
        $this->company_id = $company_id;
        $this->state = $state;
        $this->payment_flow = $payment_flow;
        $this->provider = $provider;
    }

    /**
     * @return bool|null
     */
    public function isQrCode(): ?bool
    {
        return $this->qr_code;
    }

    /**
     * @return string|null
     */
    public function getImage128(): ?string
    {
        return $this->image_128;
    }

    /**
     * @param bool|null $module_to_buy
     */
    public function setModuleToBuy(?bool $module_to_buy): void
    {
        $this->module_to_buy = $module_to_buy;
    }

    /**
     * @return bool|null
     */
    public function isModuleToBuy(): ?bool
    {
        return $this->module_to_buy;
    }

    /**
     * @param string|null $module_state
     */
    public function setModuleState(?string $module_state): void
    {
        $this->module_state = $module_state;
    }

    /**
     * @return string|null
     */
    public function getModuleState(): ?string
    {
        return $this->module_state;
    }

    /**
     * @param OdooRelation|null $module_id
     */
    public function setModuleId(?OdooRelation $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getModuleId(): ?OdooRelation
    {
        return $this->module_id;
    }

    /**
     * @param bool|null $qr_code
     */
    public function setQrCode(?bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param float|null $fees_int_var
     */
    public function setFeesIntVar(?float $fees_int_var): void
    {
        $this->fees_int_var = $fees_int_var;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPaymentIconIds(): ?array
    {
        return $this->payment_icon_ids;
    }

    /**
     * @return float|null
     */
    public function getFeesIntVar(): ?float
    {
        return $this->fees_int_var;
    }

    /**
     * @param float|null $fees_int_fixed
     */
    public function setFeesIntFixed(?float $fees_int_fixed): void
    {
        $this->fees_int_fixed = $fees_int_fixed;
    }

    /**
     * @return float|null
     */
    public function getFeesIntFixed(): ?float
    {
        return $this->fees_int_fixed;
    }

    /**
     * @param float|null $fees_dom_var
     */
    public function setFeesDomVar(?float $fees_dom_var): void
    {
        $this->fees_dom_var = $fees_dom_var;
    }

    /**
     * @return float|null
     */
    public function getFeesDomVar(): ?float
    {
        return $this->fees_dom_var;
    }

    /**
     * @param float|null $fees_dom_fixed
     */
    public function setFeesDomFixed(?float $fees_dom_fixed): void
    {
        $this->fees_dom_fixed = $fees_dom_fixed;
    }

    /**
     * @return float|null
     */
    public function getFeesDomFixed(): ?float
    {
        return $this->fees_dom_fixed;
    }

    /**
     * @param bool|null $fees_active
     */
    public function setFeesActive(?bool $fees_active): void
    {
        $this->fees_active = $fees_active;
    }

    /**
     * @return bool|null
     */
    public function isFeesActive(): ?bool
    {
        return $this->fees_active;
    }

    /**
     * @param string|null $image_128
     */
    public function setImage128(?string $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @param OdooRelation[]|null $payment_icon_ids
     */
    public function setPaymentIconIds(?array $payment_icon_ids): void
    {
        $this->payment_icon_ids = $payment_icon_ids;
    }

    /**
     * @return bool|null
     */
    public function isFeesImplemented(): ?bool
    {
        return $this->fees_implemented;
    }

    /**
     * @param string $provider
     */
    public function setProvider(string $provider): void
    {
        $this->provider = $provider;
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
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentIconIds(OdooRelation $item): bool
    {
        if (null === $this->payment_icon_ids) {
            return false;
        }

        return in_array($item, $this->payment_icon_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInboundPaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->inbound_payment_method_ids) {
            $this->inbound_payment_method_ids = [];
        }

        if ($this->hasInboundPaymentMethodIds($item)) {
            $index = array_search($item, $this->inbound_payment_method_ids);
            unset($this->inbound_payment_method_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addInboundPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasInboundPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->inbound_payment_method_ids) {
            $this->inbound_payment_method_ids = [];
        }

        $this->inbound_payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInboundPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->inbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->inbound_payment_method_ids);
    }

    /**
     * @param OdooRelation[]|null $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(?array $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInboundPaymentMethodIds(): ?array
    {
        return $this->inbound_payment_method_ids;
    }

    /**
     * @param string $payment_flow
     */
    public function setPaymentFlow(string $payment_flow): void
    {
        $this->payment_flow = $payment_flow;
    }

    /**
     * @return string
     */
    public function getPaymentFlow(): string
    {
        return $this->payment_flow;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentIconIds(OdooRelation $item): void
    {
        if (null === $this->payment_icon_ids) {
            $this->payment_icon_ids = [];
        }

        if ($this->hasPaymentIconIds($item)) {
            $index = array_search($item, $this->payment_icon_ids);
            unset($this->payment_icon_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentIconIds(OdooRelation $item): void
    {
        if ($this->hasPaymentIconIds($item)) {
            return;
        }

        if (null === $this->payment_icon_ids) {
            $this->payment_icon_ids = [];
        }

        $this->payment_icon_ids[] = $item;
    }

    /**
     * @param bool|null $fees_implemented
     */
    public function setFeesImplemented(?bool $fees_implemented): void
    {
        $this->fees_implemented = $fees_implemented;
    }

    /**
     * @param bool|null $authorize_implemented
     */
    public function setAuthorizeImplemented(?bool $authorize_implemented): void
    {
        $this->authorize_implemented = $authorize_implemented;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param bool|null $capture_manually
     */
    public function setCaptureManually(?bool $capture_manually): void
    {
        $this->capture_manually = $capture_manually;
    }

    /**
     * @return bool|null
     */
    public function isCaptureManually(): ?bool
    {
        return $this->capture_manually;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param OdooRelation|null $registration_view_template_id
     */
    public function setRegistrationViewTemplateId(?OdooRelation $registration_view_template_id): void
    {
        $this->registration_view_template_id = $registration_view_template_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRegistrationViewTemplateId(): ?OdooRelation
    {
        return $this->registration_view_template_id;
    }

    /**
     * @param OdooRelation|null $view_template_id
     */
    public function setViewTemplateId(?OdooRelation $view_template_id): void
    {
        $this->view_template_id = $view_template_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getViewTemplateId(): ?OdooRelation
    {
        return $this->view_template_id;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
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
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $display_as
     */
    public function setDisplayAs(?string $display_as): void
    {
        $this->display_as = $display_as;
    }

    /**
     * @return string|null
     */
    public function getDisplayAs(): ?string
    {
        return $this->display_as;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @return bool|null
     */
    public function isCheckValidity(): ?bool
    {
        return $this->check_validity;
    }

    /**
     * @return bool|null
     */
    public function isAuthorizeImplemented(): ?bool
    {
        return $this->authorize_implemented;
    }

    /**
     * @param string|null $pending_msg
     */
    public function setPendingMsg(?string $pending_msg): void
    {
        $this->pending_msg = $pending_msg;
    }

    /**
     * @param bool|null $token_implemented
     */
    public function setTokenImplemented(?bool $token_implemented): void
    {
        $this->token_implemented = $token_implemented;
    }

    /**
     * @return bool|null
     */
    public function isTokenImplemented(): ?bool
    {
        return $this->token_implemented;
    }

    /**
     * @param string|null $save_token
     */
    public function setSaveToken(?string $save_token): void
    {
        $this->save_token = $save_token;
    }

    /**
     * @return string|null
     */
    public function getSaveToken(): ?string
    {
        return $this->save_token;
    }

    /**
     * @param string|null $cancel_msg
     */
    public function setCancelMsg(?string $cancel_msg): void
    {
        $this->cancel_msg = $cancel_msg;
    }

    /**
     * @return string|null
     */
    public function getCancelMsg(): ?string
    {
        return $this->cancel_msg;
    }

    /**
     * @param string|null $done_msg
     */
    public function setDoneMsg(?string $done_msg): void
    {
        $this->done_msg = $done_msg;
    }

    /**
     * @return string|null
     */
    public function getDoneMsg(): ?string
    {
        return $this->done_msg;
    }

    /**
     * @return string|null
     */
    public function getPendingMsg(): ?string
    {
        return $this->pending_msg;
    }

    /**
     * @param bool|null $check_validity
     */
    public function setCheckValidity(?bool $check_validity): void
    {
        $this->check_validity = $check_validity;
    }

    /**
     * @param string|null $auth_msg
     */
    public function setAuthMsg(?string $auth_msg): void
    {
        $this->auth_msg = $auth_msg;
    }

    /**
     * @return string|null
     */
    public function getAuthMsg(): ?string
    {
        return $this->auth_msg;
    }

    /**
     * @param string|null $pre_msg
     */
    public function setPreMsg(?string $pre_msg): void
    {
        $this->pre_msg = $pre_msg;
    }

    /**
     * @return string|null
     */
    public function getPreMsg(): ?string
    {
        return $this->pre_msg;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCountryIds(OdooRelation $item): void
    {
        if (null === $this->country_ids) {
            $this->country_ids = [];
        }

        if ($this->hasCountryIds($item)) {
            $index = array_search($item, $this->country_ids);
            unset($this->country_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCountryIds(OdooRelation $item): void
    {
        if ($this->hasCountryIds($item)) {
            return;
        }

        if (null === $this->country_ids) {
            $this->country_ids = [];
        }

        $this->country_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCountryIds(OdooRelation $item): bool
    {
        if (null === $this->country_ids) {
            return false;
        }

        return in_array($item, $this->country_ids);
    }

    /**
     * @param OdooRelation[]|null $country_ids
     */
    public function setCountryIds(?array $country_ids): void
    {
        $this->country_ids = $country_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getCountryIds(): ?array
    {
        return $this->country_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.acquirer';
    }
}
