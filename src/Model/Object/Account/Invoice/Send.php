<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use Flux\OdooApiClient\Model\Object\Mail\Compose\Message;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * Electronic invoicing
     * ---
     * Send XML/EDI invoices
     * ---
     * Relation : many2many (account.edi.format)
     * @see \Flux\OdooApiClient\Model\Object\Account\Edi\Format
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $edi_format_ids;

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
     * Allows to send the document by Snailmail (conventional posting delivery service)
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
     *        Selection :
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
     * @param float|null $snailmail_cost
     */
    public function setSnailmailCost(?float $snailmail_cost): void
    {
        $this->snailmail_cost = $snailmail_cost;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeEdiFormatIds(OdooRelation $item): void
    {
        if (null === $this->edi_format_ids) {
            $this->edi_format_ids = [];
        }

        if ($this->hasEdiFormatIds($item)) {
            $index = array_search($item, $this->edi_format_ids);
            unset($this->edi_format_ids[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("snailmail_is_letter")
     */
    public function isSnailmailIsLetter(): ?bool
    {
        return $this->snailmail_is_letter;
    }

    /**
     * @param bool|null $snailmail_is_letter
     */
    public function setSnailmailIsLetter(?bool $snailmail_is_letter): void
    {
        $this->snailmail_is_letter = $snailmail_is_letter;
    }

    /**
     * @return float|null
     *
     * @SerializedName("snailmail_cost")
     */
    public function getSnailmailCost(): ?float
    {
        return $this->snailmail_cost;
    }

    /**
     * @return int|null
     *
     * @SerializedName("invalid_addresses")
     */
    public function getInvalidAddresses(): ?int
    {
        return $this->invalid_addresses;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasEdiFormatIds(OdooRelation $item): bool
    {
        if (null === $this->edi_format_ids) {
            return false;
        }

        return in_array($item, $this->edi_format_ids);
    }

    /**
     * @param int|null $invalid_addresses
     */
    public function setInvalidAddresses(?int $invalid_addresses): void
    {
        $this->invalid_addresses = $invalid_addresses;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invalid_invoice_ids")
     */
    public function getInvalidInvoiceIds(): ?array
    {
        return $this->invalid_invoice_ids;
    }

    /**
     * @param OdooRelation[]|null $invalid_invoice_ids
     */
    public function setInvalidInvoiceIds(?array $invalid_invoice_ids): void
    {
        $this->invalid_invoice_ids = $invalid_invoice_ids;
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
    public function addEdiFormatIds(OdooRelation $item): void
    {
        if ($this->hasEdiFormatIds($item)) {
            return;
        }

        if (null === $this->edi_format_ids) {
            $this->edi_format_ids = [];
        }

        $this->edi_format_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $edi_format_ids
     */
    public function setEdiFormatIds(?array $edi_format_ids): void
    {
        $this->edi_format_ids = $edi_format_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_email")
     */
    public function isIsEmail(): ?bool
    {
        return $this->is_email;
    }

    /**
     * @param bool|null $printed
     */
    public function setPrinted(?bool $printed): void
    {
        $this->printed = $printed;
    }

    /**
     * @param bool|null $is_email
     */
    public function setIsEmail(?bool $is_email): void
    {
        $this->is_email = $is_email;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_without_email")
     */
    public function getInvoiceWithoutEmail(): ?string
    {
        return $this->invoice_without_email;
    }

    /**
     * @param string|null $invoice_without_email
     */
    public function setInvoiceWithoutEmail(?string $invoice_without_email): void
    {
        $this->invoice_without_email = $invoice_without_email;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_print")
     */
    public function isIsPrint(): ?bool
    {
        return $this->is_print;
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
     *
     * @SerializedName("printed")
     */
    public function isPrinted(): ?bool
    {
        return $this->printed;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_ids")
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("edi_format_ids")
     */
    public function getEdiFormatIds(): ?array
    {
        return $this->edi_format_ids;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
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
     * @return OdooRelation
     *
     * @SerializedName("composer_id")
     */
    public function getComposerId(): OdooRelation
    {
        return $this->composer_id;
    }

    /**
     * @param OdooRelation $composer_id
     */
    public function setComposerId(OdooRelation $composer_id): void
    {
        $this->composer_id = $composer_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.invoice.send';
    }
}
