<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Invoice;

use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Mail\Compose\Message;
use Flux\OdooApiClient\Model\Object\Res\Partner;

/**
 * Odoo model : account.invoice.send
 * Name : account.invoice.send
 *
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
     * @var bool
     */
    private $is_email;

    /**
     * invoice(s) that will not be sent
     *
     * @var string
     */
    private $invoice_without_email;

    /**
     * Print
     *
     * @var bool
     */
    private $is_print;

    /**
     * Is Printed
     *
     * @var bool
     */
    private $printed;

    /**
     * Invoices
     *
     * @var Move
     */
    private $invoice_ids;

    /**
     * Composer
     *
     * @var null|Message
     */
    private $composer_id;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Send by Post
     *
     * @var bool
     */
    private $snailmail_is_letter;

    /**
     * Stamp(s)
     *
     * @var float
     */
    private $snailmail_cost;

    /**
     * Invalid Addresses Count
     *
     * @var int
     */
    private $invalid_addresses;

    /**
     * Invalid Addresses
     *
     * @var Move
     */
    private $invalid_invoice_ids;

    /**
     * @param bool $is_email
     */
    public function setIsEmail(bool $is_email): void
    {
        $this->is_email = $is_email;
    }

    /**
     * @return string
     */
    public function getInvoiceWithoutEmail(): string
    {
        return $this->invoice_without_email;
    }

    /**
     * @param bool $is_print
     */
    public function setIsPrint(bool $is_print): void
    {
        $this->is_print = $is_print;
    }

    /**
     * @param bool $printed
     */
    public function setPrinted(bool $printed): void
    {
        $this->printed = $printed;
    }

    /**
     * @param Move $invoice_ids
     */
    public function setInvoiceIds(Move $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param null|Message $composer_id
     */
    public function setComposerId(Message $composer_id): void
    {
        $this->composer_id = $composer_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @param bool $snailmail_is_letter
     */
    public function setSnailmailIsLetter(bool $snailmail_is_letter): void
    {
        $this->snailmail_is_letter = $snailmail_is_letter;
    }

    /**
     * @return float
     */
    public function getSnailmailCost(): float
    {
        return $this->snailmail_cost;
    }

    /**
     * @return int
     */
    public function getInvalidAddresses(): int
    {
        return $this->invalid_addresses;
    }

    /**
     * @return Move
     */
    public function getInvalidInvoiceIds(): Move
    {
        return $this->invalid_invoice_ids;
    }
}
