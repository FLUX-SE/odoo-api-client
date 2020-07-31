<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.filters
 * ---
 * Name : ir.filters
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
final class Filters extends Base
{
    /**
     * Filter Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * User
     * ---
     * The user this filter is private to. When left empty the filter is public and available to all users.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $domain;

    /**
     * Context
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $context;

    /**
     * Sort
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $sort;

    /**
     * Model
     * ---
     * Selection :
     *     -> res.groups (Access Groups)
     *     -> account.account (Account)
     *     -> account.cash.rounding (Account Cash Rounding)
     *     -> account.chart.template (Account Chart Template)
     *     -> account.common.report (Account Common Report)
     *     -> account.group (Account Group)
     *     -> account.invoice.send (Account Invoice Send)
     *     -> account.journal.group (Account Journal Group)
     *     -> report.account.report_journal (Account Journal Report)
     *     -> account.move.reversal (Account Move Reversal)
     *     -> account.print.journal (Account Print Journal)
     *     -> account.reconciliation.widget (Account Reconciliation widget)
     *     -> account.account.tag (Account Tag)
     *     -> account.tax.report.line (Account Tax Report Line)
     *     -> account.account.type (Account Type)
     *     -> account.unreconcile (Account Unreconcile)
     *     -> account.root (Account codes first 2 digits)
     *     -> report.account.report_invoice_with_payments (Account report with payment lines)
     *     -> account.fiscal.position.account.template (Accounts Mapping Template of Fiscal Position)
     *     -> account.fiscal.position.account (Accounts Mapping of Fiscal Position)
     *     -> ir.actions.act_url (Action URL)
     *     -> ir.actions.act_window (Action Window)
     *     -> ir.actions.act_window_close (Action Window Close)
     *     -> ir.actions.act_window.view (Action Window View)
     *     -> ir.actions.actions (Actions)
     *     -> mail.activity (Activity)
     *     -> mail.activity.mixin (Activity Mixin)
     *     -> mail.activity.type (Activity Type)
     *     -> format.address.mixin (Address Format)
     *     -> report.account.report_agedpartnerbalance (Aged Partner Balance Report)
     *     -> account.analytic.account (Analytic Account)
     *     -> account.analytic.distribution (Analytic Account Distribution)
     *     -> account.analytic.group (Analytic Categories)
     *     -> account.analytic.line (Analytic Line)
     *     -> account.analytic.tag (Analytic Tags)
     *     -> ir.module.category (Application)
     *     -> web_editor.assets (Assets Utils)
     *     -> ir.attachment (Attachment)
     *     -> product.attribute.value (Attribute Value)
     *     -> ir.autovacuum (Automatic Vacuum)
     *     -> res.bank (Bank)
     *     -> res.partner.bank (Bank Accounts)
     *     -> account.bank.statement (Bank Statement)
     *     -> account.bank.statement.cashbox (Bank Statement Cashbox)
     *     -> account.bank.statement.closebalance (Bank Statement Closing Balance)
     *     -> account.bank.statement.line (Bank Statement Line)
     *     -> account.setup.bank.manual.config (Bank setup manual config)
     *     -> base (Base)
     *     -> base_import.import (Base Import)
     *     -> base_import.mapping (Base Import Mapping)
     *     -> mail.shortcode (Canned Response / Shortcode)
     *     -> cash.box.out (Cash Box Out)
     *     -> account.cashbox.line (CashBox Line)
     *     -> change.password.wizard (Change Password Wizard)
     *     -> mail.moderation (Channel black/white list)
     *     -> ir.actions.client (Client Action)
     *     -> account.common.journal.report (Common Journal Report)
     *     -> bus.bus (Communication Bus)
     *     -> res.company (Companies)
     *     -> base.document.layout (Company Document Layout)
     *     -> ir.property (Company Property)
     *     -> res.config (Config)
     *     -> res.config.installer (Config Installer)
     *     -> res.config.settings (Config Settings)
     *     -> ir.actions.todo (Configuration Wizards)
     *     -> res.partner (Contact)
     *     -> res.country (Country)
     *     -> res.country.group (Country Group)
     *     -> res.country.state (Country state)
     *     -> wizard.ir.model.menu.create (Create Menu Wizard)
     *     -> account.accrual.accounting.wizard (Create accrual entry.)
     *     -> res.currency (Currency)
     *     -> res.currency.rate (Currency Rate)
     *     -> ir.ui.view.custom (Custom View)
     *     -> decimal.precision (Decimal Precision)
     *     -> ir.default (Default Values)
     *     -> ir.demo (Demo)
     *     -> ir.demo_failure.wizard (Demo Failure wizard)
     *     -> ir.demo_failure (Demo failure)
     *     -> digest.digest (Digest)
     *     -> digest.tip (Digest Tips)
     *     -> mail.channel (Discussion Channel)
     *     -> snailmail.letter.cancel (Dismiss notification for resend by model)
     *     -> mail.resend.cancel (Dismiss notification for resend by model)
     *     -> sms.cancel (Dismiss notification for resend by model)
     *     -> mail.followers (Document Followers)
     *     -> mail.address.mixin (Email Address Mixin)
     *     -> mail.alias (Email Aliases)
     *     -> mail.alias.mixin (Email Aliases Mixin)
     *     -> mail.thread.cc (Email CC management)
     *     -> email_template.preview (Email Template Preview)
     *     -> mail.template (Email Templates)
     *     -> mail.thread (Email Thread)
     *     -> mail.compose.message (Email composition wizard)
     *     -> mail.resend.message (Email resend wizard)
     *     -> ir.exports (Exports)
     *     -> ir.exports.line (Exports Line)
     *     -> account.invoice_extract.words (Extracted words from invoice scan)
     *     -> account.fr.fec (Ficher Echange Informatise)
     *     -> ir.model.fields (Fields)
     *     -> ir.fields.converter (Fields Converter)
     *     -> ir.model.fields.selection (Fields Selection)
     *     -> ir.filters (Filters)
     *     -> account.fiscal.position (Fiscal Position)
     *     -> account.fiscal.year (Fiscal Year)
     *     -> snailmail.letter.format.error (Format Error Sending a Snailmail Letter)
     *     -> account.full.reconcile (Full Reconcile)
     *     -> payment.link.wizard (Generate Payment Link)
     *     -> report.account.report_hash_integrity (Get hash integrity result as PDF.)
     *     -> portal.wizard (Grant Portal Access)
     *     -> ir.http (HTTP Routing)
     *     -> iap.account (IAP Account)
     *     -> image.mixin (Image Mixin)
     *     -> account.bank.statement.import (Import Bank Statement)
     *     -> fetchmail.server (Incoming Mail Server)
     *     -> account.incoterms (Incoterms)
     *     -> res.partner.industry (Industry)
     *     -> base.language.install (Install Language)
     *     -> account.online.journal (Interface for Online Account Journal)
     *     -> mail.wizard.invite (Invite wizard)
     *     -> account.invoice.report (Invoices Statistics)
     *     -> account.journal (Journal)
     *     -> account.bank.statement.import.journal.creation (Journal Creation on Bank Statement Import)
     *     -> account.move (Journal Entries)
     *     -> account.move.line (Journal Item)
     *     -> base.language.export (Language Export)
     *     -> base.language.import (Language Import)
     *     -> res.lang (Languages)
     *     -> account.online.link.wizard (Link synchronized account to a journal)
     *     -> mail.channel.partner (Listeners of a Channel)
     *     -> ir.logging (Logging)
     *     -> mail.blacklist (Mail Blacklist)
     *     -> mail.thread.blacklist (Mail Blacklist mixin)
     *     -> ir.mail_server (Mail Server)
     *     -> mail.tracking.value (Mail Tracking Value)
     *     -> ir.ui.menu (Menu)
     *     -> base.partner.merge.line (Merge Partner Line)
     *     -> base.partner.merge.automatic.wizard (Merge Partner Wizard)
     *     -> mail.message (Message)
     *     -> mail.notification (Message Notifications)
     *     -> mail.message.subtype (Message subtypes)
     *     -> ir.model.access (Model Access)
     *     -> ir.model.constraint (Model Constraint)
     *     -> ir.model.data (Model Data)
     *     -> ir.model (Models)
     *     -> ir.module.module (Module)
     *     -> report.base.report_irmodulereference (Module Reference Report (base))
     *     -> base.module.uninstall (Module Uninstall)
     *     -> ir.module.module.dependency (Module dependency)
     *     -> ir.module.module.exclusion (Module exclusion)
     *     -> account.financial.year.op (Opening Balance of Financial Year)
     *     -> mail.mail (Outgoing Mails)
     *     -> sms.sms (Outgoing SMS)
     *     -> report.paperformat (Paper Format Config)
     *     -> account.partial.reconcile (Partial Reconcile)
     *     -> res.partner.autocomplete.sync (Partner Autocomplete Sync)
     *     -> res.partner.category (Partner Tags)
     *     -> res.partner.title (Partner Title)
     *     -> mail.resend.partner (Partner with additionnal information for mail resend)
     *     -> payment.acquirer (Payment Acquirer)
     *     -> payment.icon (Payment Icon)
     *     -> account.payment.method (Payment Methods)
     *     -> account.payment.term (Payment Terms)
     *     -> account.payment.term.line (Payment Terms Line)
     *     -> payment.token (Payment Token)
     *     -> payment.transaction (Payment Transaction)
     *     -> payment.acquirer.onboarding.wizard (Payment acquire onboarding wizard)
     *     -> account.payment (Payments)
     *     -> phone.blacklist (Phone Blacklist)
     *     -> mail.thread.phone (Phone Blacklist Mixin)
     *     -> phone.validation.mixin (Phone Validation Mixin)
     *     -> portal.mixin (Portal Mixin)
     *     -> portal.share (Portal Sharing)
     *     -> portal.wizard.user (Portal User Config)
     *     -> account.reconcile.model (Preset to create journal entries during a invoices and payments matching)
     *     -> product.pricelist (Pricelist)
     *     -> product.pricelist.item (Pricelist Rule)
     *     -> print.prenumbered.checks (Print Pre-numbered Checks)
     *     -> product.product (Product)
     *     -> product.attribute (Product Attribute)
     *     -> product.category (Product Category)
     *     -> product.packaging (Product Packaging)
     *     -> report.product.report_pricelist (Product Price List Report)
     *     -> product.price_list (Product Price per Unit Based on Pricelist Version)
     *     -> product.template (Product Template)
     *     -> product.template.attribute.exclusion (Product Template Attribute Exclusion)
     *     -> product.template.attribute.line (Product Template Attribute Line)
     *     -> product.template.attribute.value (Product Template Attribute Value)
     *     -> uom.uom (Product Unit of Measure)
     *     -> uom.category (Product UoM Categories)
     *     -> account.online.provider (Provider for online account synchronization)
     *     -> publisher_warranty.contract (Publisher Warranty Contract)
     *     -> ir.qweb (Qweb)
     *     -> ir.qweb.field (Qweb Field)
     *     -> ir.qweb.field.barcode (Qweb Field Barcode)
     *     -> ir.qweb.field.contact (Qweb Field Contact)
     *     -> ir.qweb.field.date (Qweb Field Date)
     *     -> ir.qweb.field.datetime (Qweb Field Datetime)
     *     -> ir.qweb.field.duration (Qweb Field Duration)
     *     -> ir.qweb.field.float (Qweb Field Float)
     *     -> ir.qweb.field.float_time (Qweb Field Float Time)
     *     -> ir.qweb.field.html (Qweb Field HTML)
     *     -> ir.qweb.field.image (Qweb Field Image)
     *     -> ir.qweb.field.integer (Qweb Field Integer)
     *     -> ir.qweb.field.many2one (Qweb Field Many to One)
     *     -> ir.qweb.field.monetary (Qweb Field Monetary)
     *     -> ir.qweb.field.relative (Qweb Field Relative)
     *     -> ir.qweb.field.selection (Qweb Field Selection)
     *     -> ir.qweb.field.text (Qweb Field Text)
     *     -> ir.qweb.field.qweb (Qweb Field qweb)
     *     -> ir.qweb.field.many2many (Qweb field many2many)
     *     -> account.reconcile.model.template (Reconcile Model Template)
     *     -> ir.rule (Record Rule)
     *     -> account.payment.register (Register Payment)
     *     -> ir.model.relation (Relation Model)
     *     -> ir.actions.report (Report Action)
     *     -> report.layout (Report Layout)
     *     -> sms.resend.recipient (Resend Notification)
     *     -> reset.view.arch.wizard (Reset View Architecture Wizard)
     *     -> resource.mixin (Resource Mixin)
     *     -> resource.calendar.leaves (Resource Time Off Detail)
     *     -> resource.calendar (Resource Working Time)
     *     -> resource.resource (Resources)
     *     -> sms.api (SMS API)
     *     -> sms.resend (SMS Resend)
     *     -> sms.template.preview (SMS Template Preview)
     *     -> sms.template (SMS Templates)
     *     -> ir.cron (Scheduled Actions)
     *     -> sms.composer (Send SMS Wizard)
     *     -> ir.sequence (Sequence)
     *     -> ir.sequence.date_range (Sequence Date Range)
     *     -> ir.actions.server (Server Action)
     *     -> ir.server.object.lines (Server Action value mapping)
     *     -> snailmail.letter (Snailmail Letter)
     *     -> product.supplierinfo (Supplier Pricelist)
     *     -> ir.config_parameter (System Parameter)
     *     -> account.tax (Tax)
     *     -> tax.adjustments.wizard (Tax Adjustments Wizard)
     *     -> account.tax.group (Tax Group)
     *     -> account.fiscal.position.tax.template (Tax Mapping Template of Fiscal Position)
     *     -> account.fiscal.position.tax (Tax Mapping of Fiscal Position)
     *     -> account.tax.repartition.line (Tax Repartition Line)
     *     -> account.tax.repartition.line.template (Tax Repartition Line Template)
     *     -> account.fiscal.position.template (Template for Fiscal Position)
     *     -> account.account.template (Templates for Accounts)
     *     -> account.tax.template (Templates for Taxes)
     *     -> resource.test (Test Resource Model)
     *     -> base_import.tests.models.preview (Tests : Base Import Model Preview)
     *     -> base_import.tests.models.char (Tests : Base Import Model, Character)
     *     -> base_import.tests.models.char.noreadonly (Tests : Base Import Model, Character No readonly)
     *     -> base_import.tests.models.char.readonly (Tests : Base Import Model, Character readonly)
     *     -> base_import.tests.models.char.required (Tests : Base Import Model, Character required)
     *     -> base_import.tests.models.char.states (Tests : Base Import Model, Character states)
     *     -> base_import.tests.models.char.stillreadonly (Tests : Base Import Model, Character still readonly)
     *     -> base_import.tests.models.m2o (Tests : Base Import Model, Many to One)
     *     -> base_import.tests.models.m2o.related (Tests : Base Import Model, Many to One related)
     *     -> base_import.tests.models.m2o.required (Tests : Base Import Model, Many to One required)
     *     -> base_import.tests.models.m2o.required.related (Tests : Base Import Model, Many to One required related)
     *     -> base_import.tests.models.o2m (Tests : Base Import Model, One to Many)
     *     -> base_import.tests.models.o2m.child (Tests : Base Import Model, One to Many child)
     *     -> base_import.tests.models.complex (Tests: Base Import Model Complex)
     *     -> base_import.tests.models.float (Tests: Base Import Model Float)
     *     -> web_tour.tour (Tours)
     *     -> ir.translation (Translation)
     *     -> _unknown (Unknown)
     *     -> base.module.update (Update Module)
     *     -> base.update.translations (Update Translations)
     *     -> snailmail.letter.missing.required.fields (Update address of partner)
     *     -> base.module.upgrade (Upgrade Module)
     *     -> bus.presence (User Presence)
     *     -> change.password.user (User, Change Password Wizard)
     *     -> res.users (Users)
     *     -> res.users.log (Users Log)
     *     -> validate.account.move (Validate Account Move)
     *     -> ir.ui.view (View)
     *     -> web_editor.converter.test.sub (Web Editor Converter Subtest)
     *     -> web_editor.converter.test (Web Editor Converter Test)
     *     -> account.online.wizard (Wizard to link synchronized accounts to journal)
     *     -> resource.calendar.attendance (Work Detail)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model_id;

    /**
     * Default Filter
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_default;

    /**
     * Action
     * ---
     * The menu action this filter applies to. When left empty the filter applies to all menus for this model.
     * ---
     * Relation : many2one (ir.actions.actions)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Actions\Actions
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $action_id;

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
     * @param string $name Filter Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $domain Domain
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $context Context
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $sort Sort
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $model_id Model
     *        ---
     *        Selection :
     *            -> res.groups (Access Groups)
     *            -> account.account (Account)
     *            -> account.cash.rounding (Account Cash Rounding)
     *            -> account.chart.template (Account Chart Template)
     *            -> account.common.report (Account Common Report)
     *            -> account.group (Account Group)
     *            -> account.invoice.send (Account Invoice Send)
     *            -> account.journal.group (Account Journal Group)
     *            -> report.account.report_journal (Account Journal Report)
     *            -> account.move.reversal (Account Move Reversal)
     *            -> account.print.journal (Account Print Journal)
     *            -> account.reconciliation.widget (Account Reconciliation widget)
     *            -> account.account.tag (Account Tag)
     *            -> account.tax.report.line (Account Tax Report Line)
     *            -> account.account.type (Account Type)
     *            -> account.unreconcile (Account Unreconcile)
     *            -> account.root (Account codes first 2 digits)
     *            -> report.account.report_invoice_with_payments (Account report with payment lines)
     *            -> account.fiscal.position.account.template (Accounts Mapping Template of Fiscal Position)
     *            -> account.fiscal.position.account (Accounts Mapping of Fiscal Position)
     *            -> ir.actions.act_url (Action URL)
     *            -> ir.actions.act_window (Action Window)
     *            -> ir.actions.act_window_close (Action Window Close)
     *            -> ir.actions.act_window.view (Action Window View)
     *            -> ir.actions.actions (Actions)
     *            -> mail.activity (Activity)
     *            -> mail.activity.mixin (Activity Mixin)
     *            -> mail.activity.type (Activity Type)
     *            -> format.address.mixin (Address Format)
     *            -> report.account.report_agedpartnerbalance (Aged Partner Balance Report)
     *            -> account.analytic.account (Analytic Account)
     *            -> account.analytic.distribution (Analytic Account Distribution)
     *            -> account.analytic.group (Analytic Categories)
     *            -> account.analytic.line (Analytic Line)
     *            -> account.analytic.tag (Analytic Tags)
     *            -> ir.module.category (Application)
     *            -> web_editor.assets (Assets Utils)
     *            -> ir.attachment (Attachment)
     *            -> product.attribute.value (Attribute Value)
     *            -> ir.autovacuum (Automatic Vacuum)
     *            -> res.bank (Bank)
     *            -> res.partner.bank (Bank Accounts)
     *            -> account.bank.statement (Bank Statement)
     *            -> account.bank.statement.cashbox (Bank Statement Cashbox)
     *            -> account.bank.statement.closebalance (Bank Statement Closing Balance)
     *            -> account.bank.statement.line (Bank Statement Line)
     *            -> account.setup.bank.manual.config (Bank setup manual config)
     *            -> base (Base)
     *            -> base_import.import (Base Import)
     *            -> base_import.mapping (Base Import Mapping)
     *            -> mail.shortcode (Canned Response / Shortcode)
     *            -> cash.box.out (Cash Box Out)
     *            -> account.cashbox.line (CashBox Line)
     *            -> change.password.wizard (Change Password Wizard)
     *            -> mail.moderation (Channel black/white list)
     *            -> ir.actions.client (Client Action)
     *            -> account.common.journal.report (Common Journal Report)
     *            -> bus.bus (Communication Bus)
     *            -> res.company (Companies)
     *            -> base.document.layout (Company Document Layout)
     *            -> ir.property (Company Property)
     *            -> res.config (Config)
     *            -> res.config.installer (Config Installer)
     *            -> res.config.settings (Config Settings)
     *            -> ir.actions.todo (Configuration Wizards)
     *            -> res.partner (Contact)
     *            -> res.country (Country)
     *            -> res.country.group (Country Group)
     *            -> res.country.state (Country state)
     *            -> wizard.ir.model.menu.create (Create Menu Wizard)
     *            -> account.accrual.accounting.wizard (Create accrual entry.)
     *            -> res.currency (Currency)
     *            -> res.currency.rate (Currency Rate)
     *            -> ir.ui.view.custom (Custom View)
     *            -> decimal.precision (Decimal Precision)
     *            -> ir.default (Default Values)
     *            -> ir.demo (Demo)
     *            -> ir.demo_failure.wizard (Demo Failure wizard)
     *            -> ir.demo_failure (Demo failure)
     *            -> digest.digest (Digest)
     *            -> digest.tip (Digest Tips)
     *            -> mail.channel (Discussion Channel)
     *            -> snailmail.letter.cancel (Dismiss notification for resend by model)
     *            -> mail.resend.cancel (Dismiss notification for resend by model)
     *            -> sms.cancel (Dismiss notification for resend by model)
     *            -> mail.followers (Document Followers)
     *            -> mail.address.mixin (Email Address Mixin)
     *            -> mail.alias (Email Aliases)
     *            -> mail.alias.mixin (Email Aliases Mixin)
     *            -> mail.thread.cc (Email CC management)
     *            -> email_template.preview (Email Template Preview)
     *            -> mail.template (Email Templates)
     *            -> mail.thread (Email Thread)
     *            -> mail.compose.message (Email composition wizard)
     *            -> mail.resend.message (Email resend wizard)
     *            -> ir.exports (Exports)
     *            -> ir.exports.line (Exports Line)
     *            -> account.invoice_extract.words (Extracted words from invoice scan)
     *            -> account.fr.fec (Ficher Echange Informatise)
     *            -> ir.model.fields (Fields)
     *            -> ir.fields.converter (Fields Converter)
     *            -> ir.model.fields.selection (Fields Selection)
     *            -> ir.filters (Filters)
     *            -> account.fiscal.position (Fiscal Position)
     *            -> account.fiscal.year (Fiscal Year)
     *            -> snailmail.letter.format.error (Format Error Sending a Snailmail Letter)
     *            -> account.full.reconcile (Full Reconcile)
     *            -> payment.link.wizard (Generate Payment Link)
     *            -> report.account.report_hash_integrity (Get hash integrity result as PDF.)
     *            -> portal.wizard (Grant Portal Access)
     *            -> ir.http (HTTP Routing)
     *            -> iap.account (IAP Account)
     *            -> image.mixin (Image Mixin)
     *            -> account.bank.statement.import (Import Bank Statement)
     *            -> fetchmail.server (Incoming Mail Server)
     *            -> account.incoterms (Incoterms)
     *            -> res.partner.industry (Industry)
     *            -> base.language.install (Install Language)
     *            -> account.online.journal (Interface for Online Account Journal)
     *            -> mail.wizard.invite (Invite wizard)
     *            -> account.invoice.report (Invoices Statistics)
     *            -> account.journal (Journal)
     *            -> account.bank.statement.import.journal.creation (Journal Creation on Bank Statement Import)
     *            -> account.move (Journal Entries)
     *            -> account.move.line (Journal Item)
     *            -> base.language.export (Language Export)
     *            -> base.language.import (Language Import)
     *            -> res.lang (Languages)
     *            -> account.online.link.wizard (Link synchronized account to a journal)
     *            -> mail.channel.partner (Listeners of a Channel)
     *            -> ir.logging (Logging)
     *            -> mail.blacklist (Mail Blacklist)
     *            -> mail.thread.blacklist (Mail Blacklist mixin)
     *            -> ir.mail_server (Mail Server)
     *            -> mail.tracking.value (Mail Tracking Value)
     *            -> ir.ui.menu (Menu)
     *            -> base.partner.merge.line (Merge Partner Line)
     *            -> base.partner.merge.automatic.wizard (Merge Partner Wizard)
     *            -> mail.message (Message)
     *            -> mail.notification (Message Notifications)
     *            -> mail.message.subtype (Message subtypes)
     *            -> ir.model.access (Model Access)
     *            -> ir.model.constraint (Model Constraint)
     *            -> ir.model.data (Model Data)
     *            -> ir.model (Models)
     *            -> ir.module.module (Module)
     *            -> report.base.report_irmodulereference (Module Reference Report (base))
     *            -> base.module.uninstall (Module Uninstall)
     *            -> ir.module.module.dependency (Module dependency)
     *            -> ir.module.module.exclusion (Module exclusion)
     *            -> account.financial.year.op (Opening Balance of Financial Year)
     *            -> mail.mail (Outgoing Mails)
     *            -> sms.sms (Outgoing SMS)
     *            -> report.paperformat (Paper Format Config)
     *            -> account.partial.reconcile (Partial Reconcile)
     *            -> res.partner.autocomplete.sync (Partner Autocomplete Sync)
     *            -> res.partner.category (Partner Tags)
     *            -> res.partner.title (Partner Title)
     *            -> mail.resend.partner (Partner with additionnal information for mail resend)
     *            -> payment.acquirer (Payment Acquirer)
     *            -> payment.icon (Payment Icon)
     *            -> account.payment.method (Payment Methods)
     *            -> account.payment.term (Payment Terms)
     *            -> account.payment.term.line (Payment Terms Line)
     *            -> payment.token (Payment Token)
     *            -> payment.transaction (Payment Transaction)
     *            -> payment.acquirer.onboarding.wizard (Payment acquire onboarding wizard)
     *            -> account.payment (Payments)
     *            -> phone.blacklist (Phone Blacklist)
     *            -> mail.thread.phone (Phone Blacklist Mixin)
     *            -> phone.validation.mixin (Phone Validation Mixin)
     *            -> portal.mixin (Portal Mixin)
     *            -> portal.share (Portal Sharing)
     *            -> portal.wizard.user (Portal User Config)
     *            -> account.reconcile.model (Preset to create journal entries during a invoices and payments matching)
     *            -> product.pricelist (Pricelist)
     *            -> product.pricelist.item (Pricelist Rule)
     *            -> print.prenumbered.checks (Print Pre-numbered Checks)
     *            -> product.product (Product)
     *            -> product.attribute (Product Attribute)
     *            -> product.category (Product Category)
     *            -> product.packaging (Product Packaging)
     *            -> report.product.report_pricelist (Product Price List Report)
     *            -> product.price_list (Product Price per Unit Based on Pricelist Version)
     *            -> product.template (Product Template)
     *            -> product.template.attribute.exclusion (Product Template Attribute Exclusion)
     *            -> product.template.attribute.line (Product Template Attribute Line)
     *            -> product.template.attribute.value (Product Template Attribute Value)
     *            -> uom.uom (Product Unit of Measure)
     *            -> uom.category (Product UoM Categories)
     *            -> account.online.provider (Provider for online account synchronization)
     *            -> publisher_warranty.contract (Publisher Warranty Contract)
     *            -> ir.qweb (Qweb)
     *            -> ir.qweb.field (Qweb Field)
     *            -> ir.qweb.field.barcode (Qweb Field Barcode)
     *            -> ir.qweb.field.contact (Qweb Field Contact)
     *            -> ir.qweb.field.date (Qweb Field Date)
     *            -> ir.qweb.field.datetime (Qweb Field Datetime)
     *            -> ir.qweb.field.duration (Qweb Field Duration)
     *            -> ir.qweb.field.float (Qweb Field Float)
     *            -> ir.qweb.field.float_time (Qweb Field Float Time)
     *            -> ir.qweb.field.html (Qweb Field HTML)
     *            -> ir.qweb.field.image (Qweb Field Image)
     *            -> ir.qweb.field.integer (Qweb Field Integer)
     *            -> ir.qweb.field.many2one (Qweb Field Many to One)
     *            -> ir.qweb.field.monetary (Qweb Field Monetary)
     *            -> ir.qweb.field.relative (Qweb Field Relative)
     *            -> ir.qweb.field.selection (Qweb Field Selection)
     *            -> ir.qweb.field.text (Qweb Field Text)
     *            -> ir.qweb.field.qweb (Qweb Field qweb)
     *            -> ir.qweb.field.many2many (Qweb field many2many)
     *            -> account.reconcile.model.template (Reconcile Model Template)
     *            -> ir.rule (Record Rule)
     *            -> account.payment.register (Register Payment)
     *            -> ir.model.relation (Relation Model)
     *            -> ir.actions.report (Report Action)
     *            -> report.layout (Report Layout)
     *            -> sms.resend.recipient (Resend Notification)
     *            -> reset.view.arch.wizard (Reset View Architecture Wizard)
     *            -> resource.mixin (Resource Mixin)
     *            -> resource.calendar.leaves (Resource Time Off Detail)
     *            -> resource.calendar (Resource Working Time)
     *            -> resource.resource (Resources)
     *            -> sms.api (SMS API)
     *            -> sms.resend (SMS Resend)
     *            -> sms.template.preview (SMS Template Preview)
     *            -> sms.template (SMS Templates)
     *            -> ir.cron (Scheduled Actions)
     *            -> sms.composer (Send SMS Wizard)
     *            -> ir.sequence (Sequence)
     *            -> ir.sequence.date_range (Sequence Date Range)
     *            -> ir.actions.server (Server Action)
     *            -> ir.server.object.lines (Server Action value mapping)
     *            -> snailmail.letter (Snailmail Letter)
     *            -> product.supplierinfo (Supplier Pricelist)
     *            -> ir.config_parameter (System Parameter)
     *            -> account.tax (Tax)
     *            -> tax.adjustments.wizard (Tax Adjustments Wizard)
     *            -> account.tax.group (Tax Group)
     *            -> account.fiscal.position.tax.template (Tax Mapping Template of Fiscal Position)
     *            -> account.fiscal.position.tax (Tax Mapping of Fiscal Position)
     *            -> account.tax.repartition.line (Tax Repartition Line)
     *            -> account.tax.repartition.line.template (Tax Repartition Line Template)
     *            -> account.fiscal.position.template (Template for Fiscal Position)
     *            -> account.account.template (Templates for Accounts)
     *            -> account.tax.template (Templates for Taxes)
     *            -> resource.test (Test Resource Model)
     *            -> base_import.tests.models.preview (Tests : Base Import Model Preview)
     *            -> base_import.tests.models.char (Tests : Base Import Model, Character)
     *            -> base_import.tests.models.char.noreadonly (Tests : Base Import Model, Character No readonly)
     *            -> base_import.tests.models.char.readonly (Tests : Base Import Model, Character readonly)
     *            -> base_import.tests.models.char.required (Tests : Base Import Model, Character required)
     *            -> base_import.tests.models.char.states (Tests : Base Import Model, Character states)
     *            -> base_import.tests.models.char.stillreadonly (Tests : Base Import Model, Character still readonly)
     *            -> base_import.tests.models.m2o (Tests : Base Import Model, Many to One)
     *            -> base_import.tests.models.m2o.related (Tests : Base Import Model, Many to One related)
     *            -> base_import.tests.models.m2o.required (Tests : Base Import Model, Many to One required)
     *            -> base_import.tests.models.m2o.required.related (Tests : Base Import Model, Many to One required related)
     *            -> base_import.tests.models.o2m (Tests : Base Import Model, One to Many)
     *            -> base_import.tests.models.o2m.child (Tests : Base Import Model, One to Many child)
     *            -> base_import.tests.models.complex (Tests: Base Import Model Complex)
     *            -> base_import.tests.models.float (Tests: Base Import Model Float)
     *            -> web_tour.tour (Tours)
     *            -> ir.translation (Translation)
     *            -> _unknown (Unknown)
     *            -> base.module.update (Update Module)
     *            -> base.update.translations (Update Translations)
     *            -> snailmail.letter.missing.required.fields (Update address of partner)
     *            -> base.module.upgrade (Upgrade Module)
     *            -> bus.presence (User Presence)
     *            -> change.password.user (User, Change Password Wizard)
     *            -> res.users (Users)
     *            -> res.users.log (Users Log)
     *            -> validate.account.move (Validate Account Move)
     *            -> ir.ui.view (View)
     *            -> web_editor.converter.test.sub (Web Editor Converter Subtest)
     *            -> web_editor.converter.test (Web Editor Converter Test)
     *            -> account.online.wizard (Wizard to link synchronized accounts to journal)
     *            -> resource.calendar.attendance (Work Detail)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $domain,
        string $context,
        string $sort,
        string $model_id
    ) {
        $this->name = $name;
        $this->domain = $domain;
        $this->context = $context;
        $this->sort = $sort;
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("action_id")
     */
    public function getActionId(): ?OdooRelation
    {
        return $this->action_id;
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
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
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
     * @param OdooRelation|null $action_id
     */
    public function setActionId(?OdooRelation $action_id): void
    {
        $this->action_id = $action_id;
    }

    /**
     * @param bool|null $is_default
     */
    public function setIsDefault(?bool $is_default): void
    {
        $this->is_default = $is_default;
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
     * @return bool|null
     *
     * @SerializedName("is_default")
     */
    public function isIsDefault(): ?bool
    {
        return $this->is_default;
    }

    /**
     * @param string $model_id
     */
    public function setModelId(string $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): string
    {
        return $this->model_id;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * @return string
     *
     * @SerializedName("sort")
     */
    public function getSort(): string
    {
        return $this->sort;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return string
     *
     * @SerializedName("context")
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     *
     * @SerializedName("domain")
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
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
        return 'ir.filters';
    }
}
