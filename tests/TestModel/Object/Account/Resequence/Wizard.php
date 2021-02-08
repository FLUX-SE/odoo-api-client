<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Resequence;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.resequence.wizard
 * ---
 * Name : account.resequence.wizard
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Sequence Number Reset
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sequence_number_reset;

    /**
     * First Date
     * ---
     * Date (inclusive) from which the numbers are resequenced.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $first_date;

    /**
     * End Date
     * ---
     * Date (inclusive) to which the numbers are resequenced. If not set, all Journal Entries up to the end of the
     * period are resequenced.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $end_date;

    /**
     * First New Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $first_name;

    /**
     * Ordering
     * ---
     * Selection :
     *     -> keep (Keep current order)
     *     -> date (Reorder by accounting date)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $ordering;

    /**
     * Move
     * ---
     * Relation : many2many (account.move)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $move_ids;

    /**
     * New Values
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $new_values;

    /**
     * Preview Moves
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $preview_moves;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param string $first_name First New Sequence
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $ordering Ordering
     *        ---
     *        Selection :
     *            -> keep (Keep current order)
     *            -> date (Reorder by accounting date)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $first_name, string $ordering)
    {
        $this->first_name = $first_name;
        $this->ordering = $ordering;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMoveIds(OdooRelation $item): void
    {
        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        if ($this->hasMoveIds($item)) {
            $index = array_search($item, $this->move_ids);
            unset($this->move_ids[$index]);
        }
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
     * @param string|null $preview_moves
     */
    public function setPreviewMoves(?string $preview_moves): void
    {
        $this->preview_moves = $preview_moves;
    }

    /**
     * @return string|null
     *
     * @SerializedName("preview_moves")
     */
    public function getPreviewMoves(): ?string
    {
        return $this->preview_moves;
    }

    /**
     * @param string|null $new_values
     */
    public function setNewValues(?string $new_values): void
    {
        $this->new_values = $new_values;
    }

    /**
     * @return string|null
     *
     * @SerializedName("new_values")
     */
    public function getNewValues(): ?string
    {
        return $this->new_values;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMoveIds(OdooRelation $item): void
    {
        if ($this->hasMoveIds($item)) {
            return;
        }

        if (null === $this->move_ids) {
            $this->move_ids = [];
        }

        $this->move_ids[] = $item;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sequence_number_reset")
     */
    public function getSequenceNumberReset(): ?string
    {
        return $this->sequence_number_reset;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMoveIds(OdooRelation $item): bool
    {
        if (null === $this->move_ids) {
            return false;
        }

        return in_array($item, $this->move_ids);
    }

    /**
     * @param OdooRelation[]|null $move_ids
     */
    public function setMoveIds(?array $move_ids): void
    {
        $this->move_ids = $move_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("move_ids")
     */
    public function getMoveIds(): ?array
    {
        return $this->move_ids;
    }

    /**
     * @param string $ordering
     */
    public function setOrdering(string $ordering): void
    {
        $this->ordering = $ordering;
    }

    /**
     * @return string
     *
     * @SerializedName("ordering")
     */
    public function getOrdering(): string
    {
        return $this->ordering;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     *
     * @SerializedName("first_name")
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param DateTimeInterface|null $end_date
     */
    public function setEndDate(?DateTimeInterface $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("end_date")
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->end_date;
    }

    /**
     * @param DateTimeInterface|null $first_date
     */
    public function setFirstDate(?DateTimeInterface $first_date): void
    {
        $this->first_date = $first_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("first_date")
     */
    public function getFirstDate(): ?DateTimeInterface
    {
        return $this->first_date;
    }

    /**
     * @param string|null $sequence_number_reset
     */
    public function setSequenceNumberReset(?string $sequence_number_reset): void
    {
        $this->sequence_number_reset = $sequence_number_reset;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.resequence.wizard';
    }
}
