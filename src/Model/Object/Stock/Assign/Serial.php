<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Assign;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : stock.assign.serial
 * ---
 * Name : stock.assign.serial
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Serial extends Base
{
    /**
     * Product
     * ---
     * Relation : many2one (product.product)
     * @see \Flux\OdooApiClient\Model\Object\Product\Product
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $product_id;

    /**
     * Move
     * ---
     * Relation : many2one (stock.move)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $move_id;

    /**
     * First SN
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $next_serial_number;

    /**
     * Number of SN
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $next_serial_count;

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
     * @param OdooRelation $product_id Product
     *        ---
     *        Relation : many2one (product.product)
     *        @see \Flux\OdooApiClient\Model\Object\Product\Product
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $move_id Move
     *        ---
     *        Relation : many2one (stock.move)
     *        @see \Flux\OdooApiClient\Model\Object\Stock\Move
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $next_serial_number First SN
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $next_serial_count Number of SN
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $product_id,
        OdooRelation $move_id,
        string $next_serial_number,
        int $next_serial_count
    ) {
        $this->product_id = $product_id;
        $this->move_id = $move_id;
        $this->next_serial_number = $next_serial_number;
        $this->next_serial_count = $next_serial_count;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     */
    public function getProductId(): OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param int $next_serial_count
     */
    public function setNextSerialCount(int $next_serial_count): void
    {
        $this->next_serial_count = $next_serial_count;
    }

    /**
     * @return int
     */
    public function getNextSerialCount(): int
    {
        return $this->next_serial_count;
    }

    /**
     * @param string $next_serial_number
     */
    public function setNextSerialNumber(string $next_serial_number): void
    {
        $this->next_serial_number = $next_serial_number;
    }

    /**
     * @return string
     */
    public function getNextSerialNumber(): string
    {
        return $this->next_serial_number;
    }

    /**
     * @param OdooRelation $move_id
     */
    public function setMoveId(OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    /**
     * @return OdooRelation
     */
    public function getMoveId(): OdooRelation
    {
        return $this->move_id;
    }

    /**
     * @param OdooRelation $product_id
     */
    public function setProductId(OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.assign.serial';
    }
}
