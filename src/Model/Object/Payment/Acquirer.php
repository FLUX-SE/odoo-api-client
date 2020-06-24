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
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Color
     *
     * @var int
     */
    private $color;

    /**
     * Displayed as
     *
     * @var string
     */
    private $display_as;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Form Button Template
     *
     * @var View
     */
    private $view_template_id;

    /**
     * S2S Form Template
     *
     * @var View
     */
    private $registration_view_template_id;

    /**
     * State
     *
     * @var null|array
     */
    private $state;

    /**
     * Capture Amount Manually
     *
     * @var bool
     */
    private $capture_manually;

    /**
     * Payment Journal
     *
     * @var Journal
     */
    private $journal_id;

    /**
     * Verify Card Validity
     *
     * @var bool
     */
    private $check_validity;

    /**
     * Countries
     *
     * @var Country
     */
    private $country_ids;

    /**
     * Help Message
     *
     * @var string
     */
    private $pre_msg;

    /**
     * Authorize Message
     *
     * @var string
     */
    private $auth_msg;

    /**
     * Pending Message
     *
     * @var string
     */
    private $pending_msg;

    /**
     * Done Message
     *
     * @var string
     */
    private $done_msg;

    /**
     * Cancel Message
     *
     * @var string
     */
    private $cancel_msg;

    /**
     * Save Cards
     *
     * @var array
     */
    private $save_token;

    /**
     * Saving Card Data supported
     *
     * @var bool
     */
    private $token_implemented;

    /**
     * Authorize Mechanism Supported
     *
     * @var bool
     */
    private $authorize_implemented;

    /**
     * Fees Computation Supported
     *
     * @var bool
     */
    private $fees_implemented;

    /**
     * Add Extra Fees
     *
     * @var bool
     */
    private $fees_active;

    /**
     * Fixed domestic fees
     *
     * @var float
     */
    private $fees_dom_fixed;

    /**
     * Variable domestic fees (in percents)
     *
     * @var float
     */
    private $fees_dom_var;

    /**
     * Fixed international fees
     *
     * @var float
     */
    private $fees_int_fixed;

    /**
     * Variable international fees (in percents)
     *
     * @var float
     */
    private $fees_int_var;

    /**
     * Use SEPA QR Code
     *
     * @var bool
     */
    private $qr_code;

    /**
     * Corresponding Module
     *
     * @var Module
     */
    private $module_id;

    /**
     * Installation State
     *
     * @var array
     */
    private $module_state;

    /**
     * Odoo Enterprise Module
     *
     * @var bool
     */
    private $module_to_buy;

    /**
     * Image
     *
     * @var int
     */
    private $image_128;

    /**
     * Supported Payment Icons
     *
     * @var Icon
     */
    private $payment_icon_ids;

    /**
     * Payment Flow
     *
     * @var null|array
     */
    private $payment_flow;

    /**
     * For Incoming Payments
     *
     * @var Method
     */
    private $inbound_payment_method_ids;

    /**
     * Provider
     *
     * @var null|array
     */
    private $provider;

    /**
     * Communication
     *
     * @var array
     */
    private $so_reference_type;

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
     * @param ?array $payment_flow
     */
    public function removePaymentFlow(?array $payment_flow): void
    {
        if ($this->hasPaymentFlow($payment_flow)) {
            $index = array_search($payment_flow, $this->payment_flow);
            unset($this->payment_flow[$index]);
        }
    }

    /**
     * @param float $fees_int_fixed
     */
    public function setFeesIntFixed(float $fees_int_fixed): void
    {
        $this->fees_int_fixed = $fees_int_fixed;
    }

    /**
     * @param float $fees_int_var
     */
    public function setFeesIntVar(float $fees_int_var): void
    {
        $this->fees_int_var = $fees_int_var;
    }

    /**
     * @param bool $qr_code
     */
    public function setQrCode(bool $qr_code): void
    {
        $this->qr_code = $qr_code;
    }

    /**
     * @param Module $module_id
     */
    public function setModuleId(Module $module_id): void
    {
        $this->module_id = $module_id;
    }

    /**
     * @return array
     */
    public function getModuleState(): array
    {
        return $this->module_state;
    }

    /**
     * @return bool
     */
    public function isModuleToBuy(): bool
    {
        return $this->module_to_buy;
    }

    /**
     * @param int $image_128
     */
    public function setImage128(int $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @param Icon $payment_icon_ids
     */
    public function setPaymentIconIds(Icon $payment_icon_ids): void
    {
        $this->payment_icon_ids = $payment_icon_ids;
    }

    /**
     * @param null|array $payment_flow
     */
    public function setPaymentFlow(?array $payment_flow): void
    {
        $this->payment_flow = $payment_flow;
    }

    /**
     * @param ?array $payment_flow
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPaymentFlow(?array $payment_flow, bool $strict = true): bool
    {
        if (null === $this->payment_flow) {
            return false;
        }

        return in_array($payment_flow, $this->payment_flow, $strict);
    }

    /**
     * @param ?array $payment_flow
     */
    public function addPaymentFlow(?array $payment_flow): void
    {
        if ($this->hasPaymentFlow($payment_flow)) {
            return;
        }

        if (null === $this->payment_flow) {
            $this->payment_flow = [];
        }

        $this->payment_flow[] = $payment_flow;
    }

    /**
     * @param Method $inbound_payment_method_ids
     */
    public function setInboundPaymentMethodIds(Method $inbound_payment_method_ids): void
    {
        $this->inbound_payment_method_ids = $inbound_payment_method_ids;
    }

    /**
     * @param float $fees_dom_fixed
     */
    public function setFeesDomFixed(float $fees_dom_fixed): void
    {
        $this->fees_dom_fixed = $fees_dom_fixed;
    }

    /**
     * @param null|array $provider
     */
    public function setProvider(?array $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @param ?array $provider
     * @param bool $strict
     *
     * @return bool
     */
    public function hasProvider(?array $provider, bool $strict = true): bool
    {
        if (null === $this->provider) {
            return false;
        }

        return in_array($provider, $this->provider, $strict);
    }

    /**
     * @param ?array $provider
     */
    public function addProvider(?array $provider): void
    {
        if ($this->hasProvider($provider)) {
            return;
        }

        if (null === $this->provider) {
            $this->provider = [];
        }

        $this->provider[] = $provider;
    }

    /**
     * @param ?array $provider
     */
    public function removeProvider(?array $provider): void
    {
        if ($this->hasProvider($provider)) {
            $index = array_search($provider, $this->provider);
            unset($this->provider[$index]);
        }
    }

    /**
     * @param array $so_reference_type
     */
    public function setSoReferenceType(array $so_reference_type): void
    {
        $this->so_reference_type = $so_reference_type;
    }

    /**
     * @param array $so_reference_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSoReferenceType(array $so_reference_type, bool $strict = true): bool
    {
        return in_array($so_reference_type, $this->so_reference_type, $strict);
    }

    /**
     * @param array $so_reference_type
     */
    public function addSoReferenceType(array $so_reference_type): void
    {
        if ($this->hasSoReferenceType($so_reference_type)) {
            return;
        }

        $this->so_reference_type[] = $so_reference_type;
    }

    /**
     * @param array $so_reference_type
     */
    public function removeSoReferenceType(array $so_reference_type): void
    {
        if ($this->hasSoReferenceType($so_reference_type)) {
            $index = array_search($so_reference_type, $this->so_reference_type);
            unset($this->so_reference_type[$index]);
        }
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
     * @param float $fees_dom_var
     */
    public function setFeesDomVar(float $fees_dom_var): void
    {
        $this->fees_dom_var = $fees_dom_var;
    }

    /**
     * @param bool $fees_active
     */
    public function setFeesActive(bool $fees_active): void
    {
        $this->fees_active = $fees_active;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param Journal $journal_id
     */
    public function setJournalId(Journal $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param string $display_as
     */
    public function setDisplayAs(string $display_as): void
    {
        $this->display_as = $display_as;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param View $view_template_id
     */
    public function setViewTemplateId(View $view_template_id): void
    {
        $this->view_template_id = $view_template_id;
    }

    /**
     * @param View $registration_view_template_id
     */
    public function setRegistrationViewTemplateId(View $registration_view_template_id): void
    {
        $this->registration_view_template_id = $registration_view_template_id;
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param ?array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(?array $state, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($state, $this->state, $strict);
    }

    /**
     * @param ?array $state
     */
    public function addState(?array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $state;
    }

    /**
     * @param ?array $state
     */
    public function removeState(?array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param bool $capture_manually
     */
    public function setCaptureManually(bool $capture_manually): void
    {
        $this->capture_manually = $capture_manually;
    }

    /**
     * @param bool $check_validity
     */
    public function setCheckValidity(bool $check_validity): void
    {
        $this->check_validity = $check_validity;
    }

    /**
     * @return bool
     */
    public function isFeesImplemented(): bool
    {
        return $this->fees_implemented;
    }

    /**
     * @param Country $country_ids
     */
    public function setCountryIds(Country $country_ids): void
    {
        $this->country_ids = $country_ids;
    }

    /**
     * @param string $pre_msg
     */
    public function setPreMsg(string $pre_msg): void
    {
        $this->pre_msg = $pre_msg;
    }

    /**
     * @param string $auth_msg
     */
    public function setAuthMsg(string $auth_msg): void
    {
        $this->auth_msg = $auth_msg;
    }

    /**
     * @param string $pending_msg
     */
    public function setPendingMsg(string $pending_msg): void
    {
        $this->pending_msg = $pending_msg;
    }

    /**
     * @param string $done_msg
     */
    public function setDoneMsg(string $done_msg): void
    {
        $this->done_msg = $done_msg;
    }

    /**
     * @param string $cancel_msg
     */
    public function setCancelMsg(string $cancel_msg): void
    {
        $this->cancel_msg = $cancel_msg;
    }

    /**
     * @param array $save_token
     */
    public function setSaveToken(array $save_token): void
    {
        $this->save_token = $save_token;
    }

    /**
     * @param array $save_token
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSaveToken(array $save_token, bool $strict = true): bool
    {
        return in_array($save_token, $this->save_token, $strict);
    }

    /**
     * @param array $save_token
     */
    public function addSaveToken(array $save_token): void
    {
        if ($this->hasSaveToken($save_token)) {
            return;
        }

        $this->save_token[] = $save_token;
    }

    /**
     * @param array $save_token
     */
    public function removeSaveToken(array $save_token): void
    {
        if ($this->hasSaveToken($save_token)) {
            $index = array_search($save_token, $this->save_token);
            unset($this->save_token[$index]);
        }
    }

    /**
     * @return bool
     */
    public function isTokenImplemented(): bool
    {
        return $this->token_implemented;
    }

    /**
     * @return bool
     */
    public function isAuthorizeImplemented(): bool
    {
        return $this->authorize_implemented;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
