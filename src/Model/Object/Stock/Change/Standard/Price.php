<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Change\Standard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.change.standard.price
 * ---
 * Name : stock.change.standard.price
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Price extends Base
{
    /**
     * Price
     * ---
     * If cost price is increased, stock variation account will be debited and stock output account will be credited
     * with the value = (difference of amount * quantity available).
     * If cost price is decreased, stock variation account will be creadited and stock input account will be debited.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $new_price;

    /**
     * Counter-Part Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $counterpart_account_id;

    /**
     * Counter-Part Account Required
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $counterpart_account_id_required;

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
     * @param float $new_price Price
     *        ---
     *        If cost price is increased, stock variation account will be debited and stock output account will be credited
     *        with the value = (difference of amount * quantity available).
     *        If cost price is decreased, stock variation account will be creadited and stock input account will be debited.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(float $new_price)
    {
        $this->new_price = $new_price;
    }

    /**
     * @return float
     *
     * @SerializedName("new_price")
     */
    public function getNewPrice(): float
    {
        return $this->new_price;
    }

    /**
     * @param float $new_price
     */
    public function setNewPrice(float $new_price): void
    {
        $this->new_price = $new_price;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("counterpart_account_id")
     */
    public function getCounterpartAccountId(): ?OdooRelation
    {
        return $this->counterpart_account_id;
    }

    /**
     * @param OdooRelation|null $counterpart_account_id
     */
    public function setCounterpartAccountId(?OdooRelation $counterpart_account_id): void
    {
        $this->counterpart_account_id = $counterpart_account_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("counterpart_account_id_required")
     */
    public function isCounterpartAccountIdRequired(): ?bool
    {
        return $this->counterpart_account_id_required;
    }

    /**
     * @param bool|null $counterpart_account_id_required
     */
    public function setCounterpartAccountIdRequired(?bool $counterpart_account_id_required): void
    {
        $this->counterpart_account_id_required = $counterpart_account_id_required;
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
        return 'stock.change.standard.price';
    }
}
