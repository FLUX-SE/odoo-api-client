<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.config
 * ---
 * Name : pos.config
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
final class Config extends Base
{
    /**
     * Point of Sale
     * ---
     * An internal identification of the point of sale.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Is the Full Accounting Installed
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_installed_account_accountant;

    /**
     * Operation Type
     * ---
     * Relation : many2one (stock.picking.type)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Picking\Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $picking_type_id;

    /**
     * Use Existing Lots/Serial Numbers
     * ---
     * If this is checked, you will be able to choose the Lots/Serial Numbers. You can also decide to not put lots in
     * this operation type.  This means it will create stock with no lot or not put a restriction on the lot taken. 
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $use_existing_lots;

    /**
     * Sales Journal
     * ---
     * Accounting journal used to post sales entries.
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
     * Invoice Journal
     * ---
     * Accounting journal used to create invoices.
     * ---
     * Relation : many2one (account.journal)
     * @see \Flux\OdooApiClient\Model\Object\Account\Journal
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_journal_id;

    /**
     * Currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $currency_id;

    /**
     * Cashdrawer
     * ---
     * Automatically open the cashdrawer.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_cashdrawer;

    /**
     * Electronic Scale
     * ---
     * Enables Electronic Scale integration.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_electronic_scale;

    /**
     * Virtual KeyBoard
     * ---
     * Don’t turn this option on if you take orders on smartphones or tablets. 
     *   Such devices already benefit from a native keyboard.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_vkeyboard;

    /**
     * Customer Facing Display
     * ---
     * Show checkout to customers with a remotely-connected screen.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_customer_facing_display;

    /**
     * Print via Proxy
     * ---
     * Bypass browser printing and prints via the hardware proxy.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_print_via_proxy;

    /**
     * Scan via Proxy
     * ---
     * Enable barcode scanning with a remotely connected barcode scanner.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_scan_via_proxy;

    /**
     * Large Scrollbars
     * ---
     * For imprecise industrial touchscreens.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_big_scrollbars;

    /**
     * Automatic Receipt Printing
     * ---
     * The receipt will automatically be printed at the end of each order.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_print_auto;

    /**
     * Skip Preview Screen
     * ---
     * The receipt screen will be skipped if the receipt can be printed automatically.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_print_skip_screen;

    /**
     * Prefill Cash Payment
     * ---
     * The payment input will behave similarily to bank payment input, and will be prefilled with the exact due
     * amount.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_precompute_cash;

    /**
     * Tax Display
     * ---
     * Selection : (default value, usually null)
     *     -> subtotal (Tax-Excluded Price)
     *     -> total (Tax-Included Price)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $iface_tax_included;

    /**
     * Initial Category
     * ---
     * The point of sale will display this product category by default. If no category is specified, all available
     * products will be shown.
     * ---
     * Relation : many2one (pos.category)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $iface_start_categ_id;

    /**
     * Available PoS Product Categories
     * ---
     * The point of sale will only display products which are within one of the selected category trees. If no
     * category is specified, all available products will be shown
     * ---
     * Relation : many2many (pos.category)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $iface_available_categ_ids;

    /**
     * Selectable Categ
     * ---
     * Relation : many2many (pos.category)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Category
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $selectable_categ_ids;

    /**
     * Display Category Pictures
     * ---
     * The product categories will be displayed with pictures.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_display_categ_images;

    /**
     * Restrict Price Modifications to Managers
     * ---
     * Only users with Manager access rights for PoS app can modify the product prices on orders.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $restrict_price_control;

    /**
     * Cash Control
     * ---
     * Check the amount of the cashbox at opening and closing.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $cash_control;

    /**
     * Receipt Header
     * ---
     * A short text that will be inserted as a header in the printed receipt.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $receipt_header;

    /**
     * Receipt Footer
     * ---
     * A short text that will be inserted as a footer in the printed receipt.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $receipt_footer;

    /**
     * IP Address
     * ---
     * The hostname or ip address of the hardware proxy, Will be autodetected if left empty.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $proxy_ip;

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
     * Uuid
     * ---
     * A globally unique identifier for this pos configuration, used to prevent conflicts in client-generated data.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $uuid;

    /**
     * Order IDs Sequence
     * ---
     * This sequence is automatically created by Odoo but you can change it to customize the reference numbers of
     * your orders.
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sequence_id;

    /**
     * Order Line IDs Sequence
     * ---
     * This sequence is automatically created by Odoo but you can change it to customize the reference numbers of
     * your orders lines.
     * ---
     * Relation : many2one (ir.sequence)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sequence_line_id;

    /**
     * Sessions
     * ---
     * Relation : one2many (pos.session -> config_id)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $session_ids;

    /**
     * Current Session
     * ---
     * Relation : many2one (pos.session)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Session
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $current_session_id;

    /**
     * Current Session State
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $current_session_state;

    /**
     * Last Session Closing Cash
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $last_session_closing_cash;

    /**
     * Last Session Closing Date
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $last_session_closing_date;

    /**
     * Last Session Closing Cashbox
     * ---
     * Relation : many2one (account.bank.statement.cashbox)
     * @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Cashbox
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $last_session_closing_cashbox;

    /**
     * Pos Session Username
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $pos_session_username;

    /**
     * Pos Session State
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $pos_session_state;

    /**
     * Pos Session Duration
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $pos_session_duration;

    /**
     * Default Pricelist
     * ---
     * The pricelist used if no customer is selected or if the customer has no Sale Pricelist configured.
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $pricelist_id;

    /**
     * Available Pricelists
     * ---
     * Make several pricelists available in the Point of Sale. You can also apply a pricelist to specific customers
     * from their contact form (in Sales tab). To be valid, this pricelist must be listed here as an available
     * pricelist. Otherwise the default pricelist will apply.
     * ---
     * Relation : many2many (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $available_pricelist_ids;

    /**
     * Allowed Pricelists
     * ---
     * This is a technical field used for the domain of pricelist_id.
     * ---
     * Relation : many2many (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $allowed_pricelist_ids;

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
     * Barcode Nomenclature
     * ---
     * Defines what kind of barcodes are available and how they are assigned to products, customers and cashiers.
     * ---
     * Relation : many2one (barcode.nomenclature)
     * @see \Flux\OdooApiClient\Model\Object\Barcode\Nomenclature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $barcode_nomenclature_id;

    /**
     * Point of Sale Manager Group
     * ---
     * This field is there to pass the id of the pos manager group to the point of sale client.
     * ---
     * Relation : many2one (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_pos_manager_id;

    /**
     * Point of Sale User Group
     * ---
     * This field is there to pass the id of the pos user group to the point of sale client.
     * ---
     * Relation : many2one (res.groups)
     * @see \Flux\OdooApiClient\Model\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_pos_user_id;

    /**
     * Product tips
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $iface_tipproduct;

    /**
     * Tip Product
     * ---
     * This product is used as reference on customer receipts.
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tip_product_id;

    /**
     * Fiscal Positions
     * ---
     * This is useful for restaurants with onsite and take-away services that imply specific tax rates.
     * ---
     * Relation : many2many (account.fiscal.position)
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $fiscal_position_ids;

    /**
     * Default Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_fiscal_position_id;

    /**
     * Default Balance
     * ---
     * Relation : many2one (account.bank.statement.cashbox)
     * @see \Flux\OdooApiClient\Model\Object\Account\Bank\Statement\Cashbox
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $default_cashbox_id;

    /**
     * Customer facing display content
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $customer_facing_display_html;

    /**
     * Use a pricelist.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_pricelist;

    /**
     * Tax Regime
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_regime;

    /**
     * Tax Regime Selection value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tax_regime_selection;

    /**
     * Set Start Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $start_category;

    /**
     * Restrict Available Product Categories
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $limit_categories;

    /**
     * Invoicing
     * ---
     * Enables invoice generation from the Point of Sale.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_account;

    /**
     * Is a Bar/Restaurant
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_restaurant;

    /**
     * Global Discounts
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_discount;

    /**
     * Loyalty Program
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_loyalty;

    /**
     * Integrated Card Payments
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_mercury;

    /**
     * Reprint Receipt
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_reprint;

    /**
     * PosBox
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_posbox;

    /**
     * Header & Footer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_header_or_footer;

    /**
     * Module Pos Hr
     * ---
     * Show employee login screen
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_hr;

    /**
     * Amount Authorized Difference
     * ---
     * This field depicts the maximum difference allowed between the ending balance and the theoretical cash when
     * closing a session, for non-POS managers. If this maximum is reached, the user will have an error message at
     * the closing of his session saying that he needs to contact his manager.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $amount_authorized_diff;

    /**
     * Payment Methods
     * ---
     * Relation : many2many (pos.payment.method)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $payment_method_ids;

    /**
     * Company has chart of accounts
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $company_has_template;

    /**
     * Current Session Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $current_user_id;

    /**
     * Other Devices
     * ---
     * Connect devices to your PoS without an IoT Box.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $other_devices;

    /**
     * Cash rounding
     * ---
     * Relation : many2one (account.cash.rounding)
     * @see \Flux\OdooApiClient\Model\Object\Account\Cash\Rounding
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $rounding_method;

    /**
     * Cash Rounding
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $cash_rounding;

    /**
     * Only apply rounding on cash
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $only_round_cash_method;

    /**
     * IoT Box
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $module_pos_iot;

    /**
     * Pos IoT is installed
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_installed_pos_iot;

    /**
     * Epson Printer IP
     * ---
     * Local IP address of an Epson receipt printer.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $epson_printer_ip;

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
     * @param string $name Point of Sale
     *        ---
     *        An internal identification of the point of sale.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $iface_tax_included Tax Display
     *        ---
     *        Selection : (default value, usually null)
     *            -> subtotal (Tax-Excluded Price)
     *            -> total (Tax-Included Price)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $pricelist_id Default Pricelist
     *        ---
     *        The pricelist used if no customer is selected or if the customer has no Sale Pricelist configured.
     *        ---
     *        Relation : many2one (product.pricelist)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
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
     * @param OdooRelation $barcode_nomenclature_id Barcode Nomenclature
     *        ---
     *        Defines what kind of barcodes are available and how they are assigned to products, customers and cashiers.
     *        ---
     *        Relation : many2one (barcode.nomenclature)
     *        @see \Flux\OdooApiClient\Model\Object\Barcode\Nomenclature
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $iface_tax_included,
        OdooRelation $pricelist_id,
        OdooRelation $company_id,
        OdooRelation $barcode_nomenclature_id
    ) {
        $this->name = $name;
        $this->iface_tax_included = $iface_tax_included;
        $this->pricelist_id = $pricelist_id;
        $this->company_id = $company_id;
        $this->barcode_nomenclature_id = $barcode_nomenclature_id;
    }

    /**
     * @param bool|null $tax_regime
     */
    public function setTaxRegime(?bool $tax_regime): void
    {
        $this->tax_regime = $tax_regime;
    }

    /**
     * @param OdooRelation|null $default_fiscal_position_id
     */
    public function setDefaultFiscalPositionId(?OdooRelation $default_fiscal_position_id): void
    {
        $this->default_fiscal_position_id = $default_fiscal_position_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultCashboxId(): ?OdooRelation
    {
        return $this->default_cashbox_id;
    }

    /**
     * @param OdooRelation|null $default_cashbox_id
     */
    public function setDefaultCashboxId(?OdooRelation $default_cashbox_id): void
    {
        $this->default_cashbox_id = $default_cashbox_id;
    }

    /**
     * @return string|null
     */
    public function getCustomerFacingDisplayHtml(): ?string
    {
        return $this->customer_facing_display_html;
    }

    /**
     * @param string|null $customer_facing_display_html
     */
    public function setCustomerFacingDisplayHtml(?string $customer_facing_display_html): void
    {
        $this->customer_facing_display_html = $customer_facing_display_html;
    }

    /**
     * @return bool|null
     */
    public function isUsePricelist(): ?bool
    {
        return $this->use_pricelist;
    }

    /**
     * @param bool|null $use_pricelist
     */
    public function setUsePricelist(?bool $use_pricelist): void
    {
        $this->use_pricelist = $use_pricelist;
    }

    /**
     * @return bool|null
     */
    public function isTaxRegime(): ?bool
    {
        return $this->tax_regime;
    }

    /**
     * @return bool|null
     */
    public function isTaxRegimeSelection(): ?bool
    {
        return $this->tax_regime_selection;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFiscalPositionIds(OdooRelation $item): void
    {
        if (null === $this->fiscal_position_ids) {
            $this->fiscal_position_ids = [];
        }

        if ($this->hasFiscalPositionIds($item)) {
            $index = array_search($item, $this->fiscal_position_ids);
            unset($this->fiscal_position_ids[$index]);
        }
    }

    /**
     * @param bool|null $tax_regime_selection
     */
    public function setTaxRegimeSelection(?bool $tax_regime_selection): void
    {
        $this->tax_regime_selection = $tax_regime_selection;
    }

    /**
     * @return bool|null
     */
    public function isStartCategory(): ?bool
    {
        return $this->start_category;
    }

    /**
     * @param bool|null $start_category
     */
    public function setStartCategory(?bool $start_category): void
    {
        $this->start_category = $start_category;
    }

    /**
     * @return bool|null
     */
    public function isLimitCategories(): ?bool
    {
        return $this->limit_categories;
    }

    /**
     * @param bool|null $limit_categories
     */
    public function setLimitCategories(?bool $limit_categories): void
    {
        $this->limit_categories = $limit_categories;
    }

    /**
     * @return bool|null
     */
    public function isModuleAccount(): ?bool
    {
        return $this->module_account;
    }

    /**
     * @param bool|null $module_account
     */
    public function setModuleAccount(?bool $module_account): void
    {
        $this->module_account = $module_account;
    }

    /**
     * @return bool|null
     */
    public function isModulePosRestaurant(): ?bool
    {
        return $this->module_pos_restaurant;
    }

    /**
     * @param bool|null $module_pos_restaurant
     */
    public function setModulePosRestaurant(?bool $module_pos_restaurant): void
    {
        $this->module_pos_restaurant = $module_pos_restaurant;
    }

    /**
     * @return OdooRelation|null
     */
    public function getDefaultFiscalPositionId(): ?OdooRelation
    {
        return $this->default_fiscal_position_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addFiscalPositionIds(OdooRelation $item): void
    {
        if ($this->hasFiscalPositionIds($item)) {
            return;
        }

        if (null === $this->fiscal_position_ids) {
            $this->fiscal_position_ids = [];
        }

        $this->fiscal_position_ids[] = $item;
    }

    /**
     * @param bool|null $module_pos_discount
     */
    public function setModulePosDiscount(?bool $module_pos_discount): void
    {
        $this->module_pos_discount = $module_pos_discount;
    }

    /**
     * @param OdooRelation $barcode_nomenclature_id
     */
    public function setBarcodeNomenclatureId(OdooRelation $barcode_nomenclature_id): void
    {
        $this->barcode_nomenclature_id = $barcode_nomenclature_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAvailablePricelistIds(OdooRelation $item): void
    {
        if (null === $this->available_pricelist_ids) {
            $this->available_pricelist_ids = [];
        }

        if ($this->hasAvailablePricelistIds($item)) {
            $index = array_search($item, $this->available_pricelist_ids);
            unset($this->available_pricelist_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAllowedPricelistIds(): ?array
    {
        return $this->allowed_pricelist_ids;
    }

    /**
     * @param OdooRelation[]|null $allowed_pricelist_ids
     */
    public function setAllowedPricelistIds(?array $allowed_pricelist_ids): void
    {
        $this->allowed_pricelist_ids = $allowed_pricelist_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAllowedPricelistIds(OdooRelation $item): bool
    {
        if (null === $this->allowed_pricelist_ids) {
            return false;
        }

        return in_array($item, $this->allowed_pricelist_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAllowedPricelistIds(OdooRelation $item): void
    {
        if ($this->hasAllowedPricelistIds($item)) {
            return;
        }

        if (null === $this->allowed_pricelist_ids) {
            $this->allowed_pricelist_ids = [];
        }

        $this->allowed_pricelist_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAllowedPricelistIds(OdooRelation $item): void
    {
        if (null === $this->allowed_pricelist_ids) {
            $this->allowed_pricelist_ids = [];
        }

        if ($this->hasAllowedPricelistIds($item)) {
            $index = array_search($item, $this->allowed_pricelist_ids);
            unset($this->allowed_pricelist_ids[$index]);
        }
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
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
     */
    public function getBarcodeNomenclatureId(): OdooRelation
    {
        return $this->barcode_nomenclature_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGroupPosManagerId(): ?OdooRelation
    {
        return $this->group_pos_manager_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFiscalPositionIds(OdooRelation $item): bool
    {
        if (null === $this->fiscal_position_ids) {
            return false;
        }

        return in_array($item, $this->fiscal_position_ids);
    }

    /**
     * @param OdooRelation|null $group_pos_manager_id
     */
    public function setGroupPosManagerId(?OdooRelation $group_pos_manager_id): void
    {
        $this->group_pos_manager_id = $group_pos_manager_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGroupPosUserId(): ?OdooRelation
    {
        return $this->group_pos_user_id;
    }

    /**
     * @param OdooRelation|null $group_pos_user_id
     */
    public function setGroupPosUserId(?OdooRelation $group_pos_user_id): void
    {
        $this->group_pos_user_id = $group_pos_user_id;
    }

    /**
     * @return bool|null
     */
    public function isIfaceTipproduct(): ?bool
    {
        return $this->iface_tipproduct;
    }

    /**
     * @param bool|null $iface_tipproduct
     */
    public function setIfaceTipproduct(?bool $iface_tipproduct): void
    {
        $this->iface_tipproduct = $iface_tipproduct;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTipProductId(): ?OdooRelation
    {
        return $this->tip_product_id;
    }

    /**
     * @param OdooRelation|null $tip_product_id
     */
    public function setTipProductId(?OdooRelation $tip_product_id): void
    {
        $this->tip_product_id = $tip_product_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getFiscalPositionIds(): ?array
    {
        return $this->fiscal_position_ids;
    }

    /**
     * @param OdooRelation[]|null $fiscal_position_ids
     */
    public function setFiscalPositionIds(?array $fiscal_position_ids): void
    {
        $this->fiscal_position_ids = $fiscal_position_ids;
    }

    /**
     * @return bool|null
     */
    public function isModulePosDiscount(): ?bool
    {
        return $this->module_pos_discount;
    }

    /**
     * @return bool|null
     */
    public function isModulePosLoyalty(): ?bool
    {
        return $this->module_pos_loyalty;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAvailablePricelistIds(OdooRelation $item): bool
    {
        if (null === $this->available_pricelist_ids) {
            return false;
        }

        return in_array($item, $this->available_pricelist_ids);
    }

    /**
     * @param bool|null $is_installed_pos_iot
     */
    public function setIsInstalledPosIot(?bool $is_installed_pos_iot): void
    {
        $this->is_installed_pos_iot = $is_installed_pos_iot;
    }

    /**
     * @param OdooRelation|null $rounding_method
     */
    public function setRoundingMethod(?OdooRelation $rounding_method): void
    {
        $this->rounding_method = $rounding_method;
    }

    /**
     * @return bool|null
     */
    public function isCashRounding(): ?bool
    {
        return $this->cash_rounding;
    }

    /**
     * @param bool|null $cash_rounding
     */
    public function setCashRounding(?bool $cash_rounding): void
    {
        $this->cash_rounding = $cash_rounding;
    }

    /**
     * @return bool|null
     */
    public function isOnlyRoundCashMethod(): ?bool
    {
        return $this->only_round_cash_method;
    }

    /**
     * @param bool|null $only_round_cash_method
     */
    public function setOnlyRoundCashMethod(?bool $only_round_cash_method): void
    {
        $this->only_round_cash_method = $only_round_cash_method;
    }

    /**
     * @return bool|null
     */
    public function isModulePosIot(): ?bool
    {
        return $this->module_pos_iot;
    }

    /**
     * @param bool|null $module_pos_iot
     */
    public function setModulePosIot(?bool $module_pos_iot): void
    {
        $this->module_pos_iot = $module_pos_iot;
    }

    /**
     * @return bool|null
     */
    public function isIsInstalledPosIot(): ?bool
    {
        return $this->is_installed_pos_iot;
    }

    /**
     * @return string|null
     */
    public function getEpsonPrinterIp(): ?string
    {
        return $this->epson_printer_ip;
    }

    /**
     * @param bool|null $other_devices
     */
    public function setOtherDevices(?bool $other_devices): void
    {
        $this->other_devices = $other_devices;
    }

    /**
     * @param string|null $epson_printer_ip
     */
    public function setEpsonPrinterIp(?string $epson_printer_ip): void
    {
        $this->epson_printer_ip = $epson_printer_ip;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getRoundingMethod(): ?OdooRelation
    {
        return $this->rounding_method;
    }

    /**
     * @return bool|null
     */
    public function isOtherDevices(): ?bool
    {
        return $this->other_devices;
    }

    /**
     * @param bool|null $module_pos_loyalty
     */
    public function setModulePosLoyalty(?bool $module_pos_loyalty): void
    {
        $this->module_pos_loyalty = $module_pos_loyalty;
    }

    /**
     * @param bool|null $module_pos_hr
     */
    public function setModulePosHr(?bool $module_pos_hr): void
    {
        $this->module_pos_hr = $module_pos_hr;
    }

    /**
     * @return bool|null
     */
    public function isModulePosMercury(): ?bool
    {
        return $this->module_pos_mercury;
    }

    /**
     * @param bool|null $module_pos_mercury
     */
    public function setModulePosMercury(?bool $module_pos_mercury): void
    {
        $this->module_pos_mercury = $module_pos_mercury;
    }

    /**
     * @return bool|null
     */
    public function isModulePosReprint(): ?bool
    {
        return $this->module_pos_reprint;
    }

    /**
     * @param bool|null $module_pos_reprint
     */
    public function setModulePosReprint(?bool $module_pos_reprint): void
    {
        $this->module_pos_reprint = $module_pos_reprint;
    }

    /**
     * @return bool|null
     */
    public function isIsPosbox(): ?bool
    {
        return $this->is_posbox;
    }

    /**
     * @param bool|null $is_posbox
     */
    public function setIsPosbox(?bool $is_posbox): void
    {
        $this->is_posbox = $is_posbox;
    }

    /**
     * @return bool|null
     */
    public function isIsHeaderOrFooter(): ?bool
    {
        return $this->is_header_or_footer;
    }

    /**
     * @param bool|null $is_header_or_footer
     */
    public function setIsHeaderOrFooter(?bool $is_header_or_footer): void
    {
        $this->is_header_or_footer = $is_header_or_footer;
    }

    /**
     * @return bool|null
     */
    public function isModulePosHr(): ?bool
    {
        return $this->module_pos_hr;
    }

    /**
     * @return float|null
     */
    public function getAmountAuthorizedDiff(): ?float
    {
        return $this->amount_authorized_diff;
    }

    /**
     * @param OdooRelation|null $current_user_id
     */
    public function setCurrentUserId(?OdooRelation $current_user_id): void
    {
        $this->current_user_id = $current_user_id;
    }

    /**
     * @param float|null $amount_authorized_diff
     */
    public function setAmountAuthorizedDiff(?float $amount_authorized_diff): void
    {
        $this->amount_authorized_diff = $amount_authorized_diff;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPaymentMethodIds(): ?array
    {
        return $this->payment_method_ids;
    }

    /**
     * @param OdooRelation[]|null $payment_method_ids
     */
    public function setPaymentMethodIds(?array $payment_method_ids): void
    {
        $this->payment_method_ids = $payment_method_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentMethodIds(OdooRelation $item): bool
    {
        if (null === $this->payment_method_ids) {
            return false;
        }

        return in_array($item, $this->payment_method_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentMethodIds(OdooRelation $item): void
    {
        if ($this->hasPaymentMethodIds($item)) {
            return;
        }

        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        $this->payment_method_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentMethodIds(OdooRelation $item): void
    {
        if (null === $this->payment_method_ids) {
            $this->payment_method_ids = [];
        }

        if ($this->hasPaymentMethodIds($item)) {
            $index = array_search($item, $this->payment_method_ids);
            unset($this->payment_method_ids[$index]);
        }
    }

    /**
     * @return bool|null
     */
    public function isCompanyHasTemplate(): ?bool
    {
        return $this->company_has_template;
    }

    /**
     * @param bool|null $company_has_template
     */
    public function setCompanyHasTemplate(?bool $company_has_template): void
    {
        $this->company_has_template = $company_has_template;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrentUserId(): ?OdooRelation
    {
        return $this->current_user_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAvailablePricelistIds(OdooRelation $item): void
    {
        if ($this->hasAvailablePricelistIds($item)) {
            return;
        }

        if (null === $this->available_pricelist_ids) {
            $this->available_pricelist_ids = [];
        }

        $this->available_pricelist_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $available_pricelist_ids
     */
    public function setAvailablePricelistIds(?array $available_pricelist_ids): void
    {
        $this->available_pricelist_ids = $available_pricelist_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param bool|null $iface_precompute_cash
     */
    public function setIfacePrecomputeCash(?bool $iface_precompute_cash): void
    {
        $this->iface_precompute_cash = $iface_precompute_cash;
    }

    /**
     * @param bool|null $iface_scan_via_proxy
     */
    public function setIfaceScanViaProxy(?bool $iface_scan_via_proxy): void
    {
        $this->iface_scan_via_proxy = $iface_scan_via_proxy;
    }

    /**
     * @return bool|null
     */
    public function isIfaceBigScrollbars(): ?bool
    {
        return $this->iface_big_scrollbars;
    }

    /**
     * @param bool|null $iface_big_scrollbars
     */
    public function setIfaceBigScrollbars(?bool $iface_big_scrollbars): void
    {
        $this->iface_big_scrollbars = $iface_big_scrollbars;
    }

    /**
     * @return bool|null
     */
    public function isIfacePrintAuto(): ?bool
    {
        return $this->iface_print_auto;
    }

    /**
     * @param bool|null $iface_print_auto
     */
    public function setIfacePrintAuto(?bool $iface_print_auto): void
    {
        $this->iface_print_auto = $iface_print_auto;
    }

    /**
     * @return bool|null
     */
    public function isIfacePrintSkipScreen(): ?bool
    {
        return $this->iface_print_skip_screen;
    }

    /**
     * @param bool|null $iface_print_skip_screen
     */
    public function setIfacePrintSkipScreen(?bool $iface_print_skip_screen): void
    {
        $this->iface_print_skip_screen = $iface_print_skip_screen;
    }

    /**
     * @return bool|null
     */
    public function isIfacePrecomputeCash(): ?bool
    {
        return $this->iface_precompute_cash;
    }

    /**
     * @return string
     */
    public function getIfaceTaxIncluded(): string
    {
        return $this->iface_tax_included;
    }

    /**
     * @param bool|null $iface_print_via_proxy
     */
    public function setIfacePrintViaProxy(?bool $iface_print_via_proxy): void
    {
        $this->iface_print_via_proxy = $iface_print_via_proxy;
    }

    /**
     * @param string $iface_tax_included
     */
    public function setIfaceTaxIncluded(string $iface_tax_included): void
    {
        $this->iface_tax_included = $iface_tax_included;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIfaceStartCategId(): ?OdooRelation
    {
        return $this->iface_start_categ_id;
    }

    /**
     * @param OdooRelation|null $iface_start_categ_id
     */
    public function setIfaceStartCategId(?OdooRelation $iface_start_categ_id): void
    {
        $this->iface_start_categ_id = $iface_start_categ_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getIfaceAvailableCategIds(): ?array
    {
        return $this->iface_available_categ_ids;
    }

    /**
     * @param OdooRelation[]|null $iface_available_categ_ids
     */
    public function setIfaceAvailableCategIds(?array $iface_available_categ_ids): void
    {
        $this->iface_available_categ_ids = $iface_available_categ_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasIfaceAvailableCategIds(OdooRelation $item): bool
    {
        if (null === $this->iface_available_categ_ids) {
            return false;
        }

        return in_array($item, $this->iface_available_categ_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addIfaceAvailableCategIds(OdooRelation $item): void
    {
        if ($this->hasIfaceAvailableCategIds($item)) {
            return;
        }

        if (null === $this->iface_available_categ_ids) {
            $this->iface_available_categ_ids = [];
        }

        $this->iface_available_categ_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeIfaceAvailableCategIds(OdooRelation $item): void
    {
        if (null === $this->iface_available_categ_ids) {
            $this->iface_available_categ_ids = [];
        }

        if ($this->hasIfaceAvailableCategIds($item)) {
            $index = array_search($item, $this->iface_available_categ_ids);
            unset($this->iface_available_categ_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSelectableCategIds(): ?array
    {
        return $this->selectable_categ_ids;
    }

    /**
     * @return bool|null
     */
    public function isIfaceScanViaProxy(): ?bool
    {
        return $this->iface_scan_via_proxy;
    }

    /**
     * @return bool|null
     */
    public function isIfacePrintViaProxy(): ?bool
    {
        return $this->iface_print_via_proxy;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSelectableCategIds(OdooRelation $item): bool
    {
        if (null === $this->selectable_categ_ids) {
            return false;
        }

        return in_array($item, $this->selectable_categ_ids);
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceJournalId(): ?OdooRelation
    {
        return $this->invoice_journal_id;
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
     */
    public function isIsInstalledAccountAccountant(): ?bool
    {
        return $this->is_installed_account_accountant;
    }

    /**
     * @param bool|null $is_installed_account_accountant
     */
    public function setIsInstalledAccountAccountant(?bool $is_installed_account_accountant): void
    {
        $this->is_installed_account_accountant = $is_installed_account_accountant;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPickingTypeId(): ?OdooRelation
    {
        return $this->picking_type_id;
    }

    /**
     * @param OdooRelation|null $picking_type_id
     */
    public function setPickingTypeId(?OdooRelation $picking_type_id): void
    {
        $this->picking_type_id = $picking_type_id;
    }

    /**
     * @return bool|null
     */
    public function isUseExistingLots(): ?bool
    {
        return $this->use_existing_lots;
    }

    /**
     * @param bool|null $use_existing_lots
     */
    public function setUseExistingLots(?bool $use_existing_lots): void
    {
        $this->use_existing_lots = $use_existing_lots;
    }

    /**
     * @return OdooRelation|null
     */
    public function getJournalId(): ?OdooRelation
    {
        return $this->journal_id;
    }

    /**
     * @param OdooRelation|null $journal_id
     */
    public function setJournalId(?OdooRelation $journal_id): void
    {
        $this->journal_id = $journal_id;
    }

    /**
     * @param OdooRelation|null $invoice_journal_id
     */
    public function setInvoiceJournalId(?OdooRelation $invoice_journal_id): void
    {
        $this->invoice_journal_id = $invoice_journal_id;
    }

    /**
     * @param bool|null $iface_customer_facing_display
     */
    public function setIfaceCustomerFacingDisplay(?bool $iface_customer_facing_display): void
    {
        $this->iface_customer_facing_display = $iface_customer_facing_display;
    }

    /**
     * @return OdooRelation|null
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
     * @return bool|null
     */
    public function isIfaceCashdrawer(): ?bool
    {
        return $this->iface_cashdrawer;
    }

    /**
     * @param bool|null $iface_cashdrawer
     */
    public function setIfaceCashdrawer(?bool $iface_cashdrawer): void
    {
        $this->iface_cashdrawer = $iface_cashdrawer;
    }

    /**
     * @return bool|null
     */
    public function isIfaceElectronicScale(): ?bool
    {
        return $this->iface_electronic_scale;
    }

    /**
     * @param bool|null $iface_electronic_scale
     */
    public function setIfaceElectronicScale(?bool $iface_electronic_scale): void
    {
        $this->iface_electronic_scale = $iface_electronic_scale;
    }

    /**
     * @return bool|null
     */
    public function isIfaceVkeyboard(): ?bool
    {
        return $this->iface_vkeyboard;
    }

    /**
     * @param bool|null $iface_vkeyboard
     */
    public function setIfaceVkeyboard(?bool $iface_vkeyboard): void
    {
        $this->iface_vkeyboard = $iface_vkeyboard;
    }

    /**
     * @return bool|null
     */
    public function isIfaceCustomerFacingDisplay(): ?bool
    {
        return $this->iface_customer_facing_display;
    }

    /**
     * @param OdooRelation[]|null $selectable_categ_ids
     */
    public function setSelectableCategIds(?array $selectable_categ_ids): void
    {
        $this->selectable_categ_ids = $selectable_categ_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addSelectableCategIds(OdooRelation $item): void
    {
        if ($this->hasSelectableCategIds($item)) {
            return;
        }

        if (null === $this->selectable_categ_ids) {
            $this->selectable_categ_ids = [];
        }

        $this->selectable_categ_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAvailablePricelistIds(): ?array
    {
        return $this->available_pricelist_ids;
    }

    /**
     * @param DateTimeInterface|null $last_session_closing_date
     */
    public function setLastSessionClosingDate(?DateTimeInterface $last_session_closing_date): void
    {
        $this->last_session_closing_date = $last_session_closing_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSessionIds(OdooRelation $item): void
    {
        if (null === $this->session_ids) {
            $this->session_ids = [];
        }

        if ($this->hasSessionIds($item)) {
            $index = array_search($item, $this->session_ids);
            unset($this->session_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getCurrentSessionId(): ?OdooRelation
    {
        return $this->current_session_id;
    }

    /**
     * @param OdooRelation|null $current_session_id
     */
    public function setCurrentSessionId(?OdooRelation $current_session_id): void
    {
        $this->current_session_id = $current_session_id;
    }

    /**
     * @return string|null
     */
    public function getCurrentSessionState(): ?string
    {
        return $this->current_session_state;
    }

    /**
     * @param string|null $current_session_state
     */
    public function setCurrentSessionState(?string $current_session_state): void
    {
        $this->current_session_state = $current_session_state;
    }

    /**
     * @return float|null
     */
    public function getLastSessionClosingCash(): ?float
    {
        return $this->last_session_closing_cash;
    }

    /**
     * @param float|null $last_session_closing_cash
     */
    public function setLastSessionClosingCash(?float $last_session_closing_cash): void
    {
        $this->last_session_closing_cash = $last_session_closing_cash;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getLastSessionClosingDate(): ?DateTimeInterface
    {
        return $this->last_session_closing_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLastSessionClosingCashbox(): ?OdooRelation
    {
        return $this->last_session_closing_cashbox;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSessionIds(OdooRelation $item): bool
    {
        if (null === $this->session_ids) {
            return false;
        }

        return in_array($item, $this->session_ids);
    }

    /**
     * @param OdooRelation|null $last_session_closing_cashbox
     */
    public function setLastSessionClosingCashbox(?OdooRelation $last_session_closing_cashbox): void
    {
        $this->last_session_closing_cashbox = $last_session_closing_cashbox;
    }

    /**
     * @return string|null
     */
    public function getPosSessionUsername(): ?string
    {
        return $this->pos_session_username;
    }

    /**
     * @param string|null $pos_session_username
     */
    public function setPosSessionUsername(?string $pos_session_username): void
    {
        $this->pos_session_username = $pos_session_username;
    }

    /**
     * @return string|null
     */
    public function getPosSessionState(): ?string
    {
        return $this->pos_session_state;
    }

    /**
     * @param string|null $pos_session_state
     */
    public function setPosSessionState(?string $pos_session_state): void
    {
        $this->pos_session_state = $pos_session_state;
    }

    /**
     * @return string|null
     */
    public function getPosSessionDuration(): ?string
    {
        return $this->pos_session_duration;
    }

    /**
     * @param string|null $pos_session_duration
     */
    public function setPosSessionDuration(?string $pos_session_duration): void
    {
        $this->pos_session_duration = $pos_session_duration;
    }

    /**
     * @return OdooRelation
     */
    public function getPricelistId(): OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param OdooRelation $pricelist_id
     */
    public function setPricelistId(OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addSessionIds(OdooRelation $item): void
    {
        if ($this->hasSessionIds($item)) {
            return;
        }

        if (null === $this->session_ids) {
            $this->session_ids = [];
        }

        $this->session_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $session_ids
     */
    public function setSessionIds(?array $session_ids): void
    {
        $this->session_ids = $session_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSelectableCategIds(OdooRelation $item): void
    {
        if (null === $this->selectable_categ_ids) {
            $this->selectable_categ_ids = [];
        }

        if ($this->hasSelectableCategIds($item)) {
            $index = array_search($item, $this->selectable_categ_ids);
            unset($this->selectable_categ_ids[$index]);
        }
    }

    /**
     * @param string|null $receipt_footer
     */
    public function setReceiptFooter(?string $receipt_footer): void
    {
        $this->receipt_footer = $receipt_footer;
    }

    /**
     * @return bool|null
     */
    public function isIfaceDisplayCategImages(): ?bool
    {
        return $this->iface_display_categ_images;
    }

    /**
     * @param bool|null $iface_display_categ_images
     */
    public function setIfaceDisplayCategImages(?bool $iface_display_categ_images): void
    {
        $this->iface_display_categ_images = $iface_display_categ_images;
    }

    /**
     * @return bool|null
     */
    public function isRestrictPriceControl(): ?bool
    {
        return $this->restrict_price_control;
    }

    /**
     * @param bool|null $restrict_price_control
     */
    public function setRestrictPriceControl(?bool $restrict_price_control): void
    {
        $this->restrict_price_control = $restrict_price_control;
    }

    /**
     * @return bool|null
     */
    public function isCashControl(): ?bool
    {
        return $this->cash_control;
    }

    /**
     * @param bool|null $cash_control
     */
    public function setCashControl(?bool $cash_control): void
    {
        $this->cash_control = $cash_control;
    }

    /**
     * @return string|null
     */
    public function getReceiptHeader(): ?string
    {
        return $this->receipt_header;
    }

    /**
     * @param string|null $receipt_header
     */
    public function setReceiptHeader(?string $receipt_header): void
    {
        $this->receipt_header = $receipt_header;
    }

    /**
     * @return string|null
     */
    public function getReceiptFooter(): ?string
    {
        return $this->receipt_footer;
    }

    /**
     * @return string|null
     */
    public function getProxyIp(): ?string
    {
        return $this->proxy_ip;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSessionIds(): ?array
    {
        return $this->session_ids;
    }

    /**
     * @param string|null $proxy_ip
     */
    public function setProxyIp(?string $proxy_ip): void
    {
        $this->proxy_ip = $proxy_ip;
    }

    /**
     * @return bool|null
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
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSequenceId(): ?OdooRelation
    {
        return $this->sequence_id;
    }

    /**
     * @param OdooRelation|null $sequence_id
     */
    public function setSequenceId(?OdooRelation $sequence_id): void
    {
        $this->sequence_id = $sequence_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSequenceLineId(): ?OdooRelation
    {
        return $this->sequence_line_id;
    }

    /**
     * @param OdooRelation|null $sequence_line_id
     */
    public function setSequenceLineId(?OdooRelation $sequence_line_id): void
    {
        $this->sequence_line_id = $sequence_line_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.config';
    }
}
