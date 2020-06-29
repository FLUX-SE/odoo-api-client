<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Mail\Compose\Message;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : account.invoice.send
 * Name : account.invoice.send
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Send extends Message
{
    /**
     * Email
     *
     * @var null|bool
     */
    private $is_email;

    /**
     * invoice(s) that will not be sent
     *
     * @var null|string
     */
    private $invoice_without_email;

    /**
     * Print
     *
     * @var null|bool
     */
    private $is_print;

    /**
     * Is Printed
     *
     * @var null|bool
     */
    private $printed;

    /**
     * Invoices
     *
     * @var null|Move[]
     */
    private $invoice_ids;

    /**
     * Composer
     *
     * @var Message
     */
    private $composer_id;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Send by Post
     * Allows to send the document by Snailmail (coventional posting delivery service)
     *
     * @var null|bool
     */
    private $snailmail_is_letter;

    /**
     * Stamp(s)
     *
     * @var null|float
     */
    private $snailmail_cost;

    /**
     * Invalid Addresses Count
     *
     * @var null|int
     */
    private $invalid_addresses;

    /**
     * Invalid Addresses
     *
     * @var null|Move[]
     */
    private $invalid_invoice_ids;

    /**
     * @param Message $composer_id Composer
     * @param array $message_type Type
     *        Message type: email for email message, notification for system message, comment for other messages such as
     *        user replies
     */
    public function __construct(Message $composer_id, array $message_type)
    {
        $this->composer_id = $composer_id;
        parent::__construct($message_type);
    }

    /**
     * @param null|bool $is_email
     */
    public function setIsEmail(?bool $is_email): void
    {
        $this->is_email = $is_email;
    }

    /**
     * @return null|string
     */
    public function getInvoiceWithoutEmail(): ?string
    {
        return $this->invoice_without_email;
    }

    /**
     * @param null|bool $is_print
     */
    public function setIsPrint(?bool $is_print): void
    {
        $this->is_print = $is_print;
    }

    /**
     * @param null|bool $printed
     */
    public function setPrinted(?bool $printed): void
    {
        $this->printed = $printed;
    }

    /**
     * @param null|Move[] $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param Move $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasInvoiceIds(Move $item, bool $strict = true): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids, $strict);
    }

    /**
     * @param Move $item
     */
    public function addInvoiceIds(Move $item): void
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
     * @param Move $item
     */
    public function removeInvoiceIds(Move $item): void
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
     * @param Message $composer_id
     */
    public function setComposerId(Message $composer_id): void
    {
        $this->composer_id = $composer_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @param null|bool $snailmail_is_letter
     */
    public function setSnailmailIsLetter(?bool $snailmail_is_letter): void
    {
        $this->snailmail_is_letter = $snailmail_is_letter;
    }

    /**
     * @return null|float
     */
    public function getSnailmailCost(): ?float
    {
        return $this->snailmail_cost;
    }

    /**
     * @return null|int
     */
    public function getInvalidAddresses(): ?int
    {
        return $this->invalid_addresses;
    }

    /**
     * @return null|Move[]
     */
    public function getInvalidInvoiceIds(): ?array
    {
        return $this->invalid_invoice_ids;
    }
}
