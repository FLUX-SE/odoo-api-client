<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Product;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : product.margin
 * ---
 * Name : product.margin
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Margin extends Base
{
    /**
     * From
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $from_date;

    /**
     * To
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $to_date;

    /**
     * Invoice State
     * ---
     * Selection :
     *     -> paid (Paid)
     *     -> open_paid (Open and Paid)
     *     -> draft_open_paid (Draft, Open and Paid)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $invoice_state;

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
     * @param string $invoice_state Invoice State
     *        ---
     *        Selection :
     *            -> paid (Paid)
     *            -> open_paid (Open and Paid)
     *            -> draft_open_paid (Draft, Open and Paid)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $invoice_state)
    {
        $this->invoice_state = $invoice_state;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("from_date")
     */
    public function getFromDate(): ?DateTimeInterface
    {
        return $this->from_date;
    }

    /**
     * @param DateTimeInterface|null $from_date
     */
    public function setFromDate(?DateTimeInterface $from_date): void
    {
        $this->from_date = $from_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("to_date")
     */
    public function getToDate(): ?DateTimeInterface
    {
        return $this->to_date;
    }

    /**
     * @param DateTimeInterface|null $to_date
     */
    public function setToDate(?DateTimeInterface $to_date): void
    {
        $this->to_date = $to_date;
    }

    /**
     * @return string
     *
     * @SerializedName("invoice_state")
     */
    public function getInvoiceState(): string
    {
        return $this->invoice_state;
    }

    /**
     * @param string $invoice_state
     */
    public function setInvoiceState(string $invoice_state): void
    {
        $this->invoice_state = $invoice_state;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'product.margin';
    }
}
