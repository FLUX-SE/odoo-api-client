<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use Flux\OdooApiClient\Model\Object\Mail\Compose\Message;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.invoice.send
 * ---
 * Name : account.invoice.send
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Send extends Message
{
    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_email;

    /**
     * invoice(s) that will not be sent
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $invoice_without_email;

    /**
     * Print
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_print;

    /**
     * Is Printed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $printed;

    /**
     * Invoices
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invoice_ids;

    /**
     * Composer
     * ---
     * Relation : many2one (mail.compose.message)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Compose\Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $composer_id;

    /**
     * Partner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Send by Post
     * ---
     * Allows to send the document by Snailmail (coventional posting delivery service)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $snailmail_is_letter;

    /**
     * Stamp(s)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    private $snailmail_cost;

    /**
     * Invalid Addresses Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $invalid_addresses;

    /**
     * Invalid Addresses
     * ---
     * Relation : many2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $invalid_invoice_ids;

    /**
     * @param OdooRelation $composer_id Composer
     *        ---
     *        Relation : many2one (mail.compose.message)
     *        @see \Flux\OdooApiClient\Model\Object\Mail\Compose\Message
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $message_type Type
     *        ---
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     *        ---
     *        Selection : (default value, usually null)
     *            -> comment (Comment)
     *            -> notification (System notification)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $composer_id, string $message_type)
    {
        $this->composer_id = $composer_id;
        parent::__construct($message_type);
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvalidInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invalid_invoice_ids) {
            $this->invalid_invoice_ids = [];
        }

        if ($this->hasInvalidInvoiceIds($item)) {
            $index = array_search($item, $this->invalid_invoice_ids);
            unset($this->invalid_invoice_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvalidInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvalidInvoiceIds($item)) {
            return;
        }

        if (null === $this->invalid_invoice_ids) {
            $this->invalid_invoice_ids = [];
        }

        $this->invalid_invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvalidInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invalid_invoice_ids) {
            return false;
        }

        return in_array($item, $this->invalid_invoice_ids);
    }

    /**
     * @param OdooRelation[]|null $invalid_invoice_ids
     */
    public function setInvalidInvoiceIds(?array $invalid_invoice_ids): void
    {
        $this->invalid_invoice_ids = $invalid_invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvalidInvoiceIds(): ?array
    {
        return $this->invalid_invoice_ids;
    }

    /**
     * @param int|null $invalid_addresses
     */
    public function setInvalidAddresses(?int $invalid_addresses): void
    {
        $this->invalid_addresses = $invalid_addresses;
    }

    /**
     * @return int|null
     */
    public function getInvalidAddresses(): ?int
    {
        return $this->invalid_addresses;
    }

    /**
     * @param float|null $snailmail_cost
     */
    public function setSnailmailCost(?float $snailmail_cost): void
    {
        $this->snailmail_cost = $snailmail_cost;
    }

    /**
     * @return float|null
     */
    public function getSnailmailCost(): ?float
    {
        return $this->snailmail_cost;
    }

    /**
     * @param bool|null $snailmail_is_letter
     */
    public function setSnailmailIsLetter(?bool $snailmail_is_letter): void
    {
        $this->snailmail_is_letter = $snailmail_is_letter;
    }

    /**
     * @return bool|null
     */
    public function isSnailmailIsLetter(): ?bool
    {
        return $this->snailmail_is_letter;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation $composer_id
     */
    public function setComposerId(OdooRelation $composer_id): void
    {
        $this->composer_id = $composer_id;
    }

    /**
     * @return bool|null
     */
    public function isIsEmail(): ?bool
    {
        return $this->is_email;
    }

    /**
     * @return OdooRelation
     */
    public function getComposerId(): OdooRelation
    {
        return $this->composer_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param bool|null $printed
     */
    public function setPrinted(?bool $printed): void
    {
        $this->printed = $printed;
    }

    /**
     * @return bool|null
     */
    public function isPrinted(): ?bool
    {
        return $this->printed;
    }

    /**
     * @param bool|null $is_print
     */
    public function setIsPrint(?bool $is_print): void
    {
        $this->is_print = $is_print;
    }

    /**
     * @return bool|null
     */
    public function isIsPrint(): ?bool
    {
        return $this->is_print;
    }

    /**
     * @param string|null $invoice_without_email
     */
    public function setInvoiceWithoutEmail(?string $invoice_without_email): void
    {
        $this->invoice_without_email = $invoice_without_email;
    }

    /**
     * @return string|null
     */
    public function getInvoiceWithoutEmail(): ?string
    {
        return $this->invoice_without_email;
    }

    /**
     * @param bool|null $is_email
     */
    public function setIsEmail(?bool $is_email): void
    {
        $this->is_email = $is_email;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.invoice.send';
    }
}
