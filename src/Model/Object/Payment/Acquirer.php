<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Journal;
use Flux\OdooApiClient\Model\Object\Account\Payment\Method;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.acquirer
 * Name : payment.acquirer
 * Info :
 * Acquirer Model. Each specific acquirer can extend the model by adding
 * its own fields, using the acquirer_name as a prefix for the new fields.
 * Using the required_if_provider='<name>' attribute on fields it is possible
 * to have required fields that depend on a specific acquirer.
 *
 * Each acquirer has a link to an ir.ui.view record that is a template of
 * a button used to display the payment form. See examples in ``payment_ingenico``
 * and ``payment_paypal`` modules.
 *
 * Methods that should be added in an acquirer-specific implementation:
 *
 * - ``<name>_form_generate_values(self, reference, amount, currency,
 * partner_id=False, partner_values=None, tx_custom_values=None)``:
 * method that generates the values used to render the form button template.
 * - ``<name>_get_form_action_url(self):``: method that returns the url of
 * the button form. It is used for example in ecommerce application if you
 * want to post some data to the acquirer.
 * - ``<name>_compute_fees(self, amount, currency_id, country_id)``: computes
 * the fees of the acquirer, using generic fields defined on the acquirer
 * model (see fields definition).
 *
 * Each acquirer should also define controllers to handle communication between
 * OpenERP and the acquirer. It generally consists in return urls given to the
 * button form and that the acquirer uses to send the customer back after the
 * transaction, with transaction details given as a POST request.
 */
final class Acquirer extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Color
     *
     * @var null|int
     */
    private $color;

    /**
     * Displayed as
     * How the acquirer is displayed to the customers.
     *
     * @var null|string
     */
    private $display_as;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Sequence
     * Determine the display order
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Form Button Template
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
     *
     * @var null|View
     */
    private $view_template_id;

    /**
     * S2S Form Template
     * Template for method registration
     *
     * @var null|View
     */
    private $registration_view_template_id;

    /**
     * State
     * In test mode, a fake payment is processed through a test
     * payment interface. This mode is advised when setting up the
     * acquirer. Watch out, test and production modes require
     * different credentials.
     *
     * @var array
     */
    private $state;

    /**
     * Capture Amount Manually
     * Capture the amount from Odoo, when the delivery is completed.
     *
     * @var null|bool
     */
    private $capture_manually;

    /**
     * Payment Journal
     * Journal where the successful transactions will be posted
     *
     * @var null|Journal
     */
    private $journal_id;

    /**
     * Verify Card Validity
     * Trigger a transaction of 1 currency unit and its refund to check the validity of new credit cards entered in
     * the customer portal.
     * Without this check, the validity will be verified at the very first transaction.
     *
     * @var null|bool
     */
    private $check_validity;

    /**
     * Countries
     * This payment gateway is available for selected countries. If none is selected it is available for all
     * countries.
     *
     * @var null|Country[]
     */
    private $country_ids;

    /**
     * Help Message
     * Message displayed to explain and help the payment process.
     *
     * @var null|string
     */
    private $pre_msg;

    /**
     * Authorize Message
     * Message displayed if payment is authorized.
     *
     * @var null|string
     */
    private $auth_msg;

    /**
     * Pending Message
     * Message displayed, if order is in pending state after having done the payment process.
     *
     * @var null|string
     */
    private $pending_msg;

    /**
     * Done Message
     * Message displayed, if order is done successfully after having done the payment process.
     *
     * @var null|string
     */
    private $done_msg;

    /**
     * Cancel Message
     * Message displayed, if order is cancel during the payment process.
     *
     * @var null|string
     */
    private $cancel_msg;

    /**
     * Save Cards
     * This option allows customers to save their credit card as a payment token and to reuse it for a later
     * purchase. If you manage subscriptions (recurring invoicing), you need it to automatically charge the customer
     * when you issue an invoice.
     *
     * @var null|array
     */
    private $save_token;

    /**
     * Saving Card Data supported
     *
     * @var null|bool
     */
    private $token_implemented;

    /**
     * Authorize Mechanism Supported
     *
     * @var null|bool
     */
    private $authorize_implemented;

    /**
     * Fees Computation Supported
     *
     * @var null|bool
     */
    private $fees_implemented;

    /**
     * Add Extra Fees
     *
     * @var null|bool
     */
    private $fees_active;

    /**
     * Fixed domestic fees
     *
     * @var null|float
     */
    private $fees_dom_fixed;

    /**
     * Variable domestic fees (in percents)
     *
     * @var null|float
     */
    private $fees_dom_var;

    /**
     * Fixed international fees
     *
     * @var null|float
     */
    private $fees_int_fixed;

    /**
     * Variable international fees (in percents)
     *
     * @var null|float
     */
    private $fees_int_var;

    /**
     * Use SEPA QR Code
     *
     * @var null|bool
     */
    private $qr_code;

    /**
     * Corresponding Module
     *
     * @var null|Module
     */
    private $module_id;

    /**
     * Installation State
     *
     * @var null|array
     */
    private $module_state;

    /**
     * Odoo Enterprise Module
     *
     * @var null|bool
     */
    private $module_to_buy;

    /**
     * Image
     *
     * @var null|int
     */
    private $image_128;

    /**
     * Supported Payment Icons
     *
     * @var null|Icon[]
     */
    private $payment_icon_ids;

    /**
     * Payment Flow
     * Note: Subscriptions does not take this field in account, it uses server to server by default.
     *
     * @var array
     */
    private $payment_flow;

    /**
     * For Incoming Payments
     * Manual: Get paid by cash, check or any other method outside of Odoo.
     * Electronic: Get paid automatically through a payment acquirer by requesting a transaction on a card saved by
     * the customer when buying or subscribing online (payment token).
     * Batch Deposit: Encase several customer checks at once by generating a batch deposit to submit to your bank.
     * When encoding the bank statement in Odoo,you are suggested to reconcile the transaction with the batch
     * deposit. Enable this option from the settings.
     *
     * @var null|Method[]
     */
    private $inbound_payment_method_ids;

    /**
     * Provider
     *
     * @var array
     */
    private $provider;

    /**
     * Communication
     * You can set here the communication type that will appear on sales orders.The communication will be given to
     * the customer when they choose the payment method.
     *
     * @var null|array
     */
    private $so_reference_type;

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
     * @param Company $company_id Company
     * @param array $state State
     *        In test mode, a fake payment is processed through a test
     *        payment interface. This mode is advised when setting up the
     *        acquirer. Watch out, test and production modes require
     *        different credentials.
     * @param array $payment_flow Payment Flow
     *        Note: Subscriptions does not take this field in account, it uses server to server by default.
     * @param array $provider Provider
     */
    public function __construct(
        string $name,
        Company $company_id,
        array $state,
        array $payment_flow,
        array $provider
    ) {
        $this->name = $name;
        $this->company_id = $company_id;
        $this->state = $state;
        $this->payment_flow = $payment_flow;
        $this->provider = $provider;
    }

    /**
     * @param mixed $item
     */
    public function removePaymentFlow($item): void
    {
        if ($this->hasPaymentFlow($item)) {
            $index = array_search($item, $this->payment_flow);
            unset($this->payment_flow[$index]);
        }
    }

    /**
     * @param null|float $fees_int_var
     */
    public function setFeesIntVar(?float $fees_int_var): void
    {
        $this->fees_int_var = $fees_int_var;
    }

    /**
     * @param null|bool $qr_code
     */
    public function setQrCode(?bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param null|Module $module_id
     */
    public function setModuleId(?Module $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return null|array
     */
    public function getModuleState(): ?array
    {
        return $this->module_state;
    }

    /**
     * @return null|bool
     */
    public function isModuleToBuy(): ?bool
    {
        return $this->module_to_buy;
    }

    /**
     * @param null|int $image_128
     */
    public function setImage128(?int $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @param null|Icon[] $payment_icon_ids
     */
    public function setPaymentIconIds(?array $payment_icon_ids): void
    {
        $this->payment_icon_ids = $payment_icon_ids;
    }

    /**
     * @param Icon $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentIconIds(Icon $item, bool $strict = true): bool
    {
        if (null === $this->payment_icon_ids) {
            return false;
        }

        return in_array($item, $this->payment_icon_ids, $strict);
    }

    /**
     * @param Icon $item
     */
    public function addPaymentIconIds(Icon $item): void
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
     * @param Icon $item
     */
    public function removePaymentIconIds(Icon $item): void
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
     * @param array $payment_flow
     */
    public function setPaymentFlow(array $payment_flow): void
    {
        $this->payment_flow = $payment_flow;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentFlow($item, bool $strict = true): bool
    {
        return in_array($item, $this->payment_flow, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addPaymentFlow($item): void
    {
        if ($this->hasPaymentFlow($item)) {
            return;
        }

        $this->payment_flow[] = $item;
    }

    /**
     * @param null|Method[] $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(?array $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @param null|float $fees_dom_var
     */
    public function setFeesDomVar(?float $fees_dom_var): void
    {
        $this->fees_dom_var = $fees_dom_var;
    }

    /**
     * @param Method $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInboundPaymentMethodIds(Method $item, bool $strict = true): bool
    {
        if (null === $this->inbound_payment_method_ids) {
            return false;
        }

        return in_array($item, $this->inbound_payment_method_ids, $strict);
    }

    /**
     * @param Method $item
     */
    public function addInboundPaymentMethodIds(Method $item): void
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
     * @param Method $item
     */
    public function removeInboundPaymentMethodIds(Method $item): void
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
     * @param array $provider
     */
    public function setProvider(array $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProvider($item, bool $strict = true): bool
    {
        return in_array($item, $this->provider, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addProvider($item): void
    {
        if ($this->hasProvider($item)) {
            return;
        }

        $this->provider[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeProvider($item): void
    {
        if ($this->hasProvider($item)) {
            $index = array_search($item, $this->provider);
            unset($this->provider[$index]);
        }
    }

    /**
     * @param null|array $so_reference_type
     */
    public function setSoReferenceType(?array $so_reference_type): void
    {
        $this->so_reference_type = $so_reference_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSoReferenceType($item, bool $strict = true): bool
    {
        if (null === $this->so_reference_type) {
            return false;
        }

        return in_array($item, $this->so_reference_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSoReferenceType($item): void
    {
        if ($this->hasSoReferenceType($item)) {
            return;
        }

        if (null === $this->so_reference_type) {
            $this->so_reference_type = [];
        }

        $this->so_reference_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSoReferenceType($item): void
    {
        if (null === $this->so_reference_type) {
            $this->so_reference_type = [];
        }

        if ($this->hasSoReferenceType($item)) {
            $index = array_search($item, $this->so_reference_type);
            unset($this->so_reference_type[$index]);
        }
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
     * @param null|float $fees_int_fixed
     */
    public function setFeesIntFixed(?float $fees_int_fixed): void
    {
        $this->fees_int_fixed = $fees_int_fixed;
    }

    /**
     * @param null|float $fees_dom_fixed
     */
    public function setFeesDomFixed(?float $fees_dom_fixed): void
    {
        $this->fees_dom_fixed = $fees_dom_fixed;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Country[] $country_ids
     */
    public function setCountryIds(?array $country_ids): void
    {
        $this->country_ids = $country_ids;
    }

    /**
     * @return null|int
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param null|string $display_as
     */
    public function setDisplayAs(?string $display_as): void
    {
        $this->display_as = $display_as;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|View $view_template_id
     */
    public function setViewTemplateId(?View $view_template_id): void
    {
        $this->view_template_id = $view_template_id;
    }

    /**
     * @param null|View $registration_view_template_id
     */
    public function setRegistrationViewTemplateId(?View $registration_view_template_id): void
    {
        $this->registration_view_template_id = $registration_view_template_id;
    }

    /**
     * @param array $state
     */
    public function setState(array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState($item, bool $strict = true): bool
    {
        return in_array($item, $this->state, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addState($item): void
    {
        if ($this->hasState($item)) {
            return;
        }

        $this->state[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeState($item): void
    {
        if ($this->hasState($item)) {
            $index = array_search($item, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param null|bool $capture_manually
     */
    public function setCaptureManually(?bool $capture_manually): void
    {
        $this->capture_manually = $capture_manually;
    }

    /**
     * @param null|Journal $journal_id
     */
    public function setJournalId(?Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param null|bool $check_validity
     */
    public function setCheckValidity(?bool $check_validity): void
    {
        $this->check_validity = $check_validity;
    }

    /**
     * @param Country $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCountryIds(Country $item, bool $strict = true): bool
    {
        if (null === $this->country_ids) {
            return false;
        }

        return in_array($item, $this->country_ids, $strict);
    }

    /**
     * @param null|bool $fees_active
     */
    public function setFeesActive(?bool $fees_active): void
    {
        $this->fees_active = $fees_active;
    }

    /**
     * @param Country $item
     */
    public function addCountryIds(Country $item): void
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
     * @param Country $item
     */
    public function removeCountryIds(Country $item): void
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
     * @param null|string $pre_msg
     */
    public function setPreMsg(?string $pre_msg): void
    {
        $this->pre_msg = $pre_msg;
    }

    /**
     * @param null|string $auth_msg
     */
    public function setAuthMsg(?string $auth_msg): void
    {
        $this->auth_msg = $auth_msg;
    }

    /**
     * @param null|string $pending_msg
     */
    public function setPendingMsg(?string $pending_msg): void
    {
        $this->pending_msg = $pending_msg;
    }

    /**
     * @param null|string $done_msg
     */
    public function setDoneMsg(?string $done_msg): void
    {
        $this->done_msg = $done_msg;
    }

    /**
     * @param null|string $cancel_msg
     */
    public function setCancelMsg(?string $cancel_msg): void
    {
        $this->cancel_msg = $cancel_msg;
    }

    /**
     * @param null|array $save_token
     */
    public function setSaveToken(?array $save_token): void
    {
        $this->save_token = $save_token;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaveToken($item, bool $strict = true): bool
    {
        if (null === $this->save_token) {
            return false;
        }

        return in_array($item, $this->save_token, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addSaveToken($item): void
    {
        if ($this->hasSaveToken($item)) {
            return;
        }

        if (null === $this->save_token) {
            $this->save_token = [];
        }

        $this->save_token[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeSaveToken($item): void
    {
        if (null === $this->save_token) {
            $this->save_token = [];
        }

        if ($this->hasSaveToken($item)) {
            $index = array_search($item, $this->save_token);
            unset($this->save_token[$index]);
        }
    }

    /**
     * @return null|bool
     */
    public function isTokenImplemented(): ?bool
    {
        return $this->token_implemented;
    }

    /**
     * @return null|bool
     */
    public function isAuthorizeImplemented(): ?bool
    {
        return $this->authorize_implemented;
    }

    /**
     * @return null|bool
     */
    public function isFeesImplemented(): ?bool
    {
        return $this->fees_implemented;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
