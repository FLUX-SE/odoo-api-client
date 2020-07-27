<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Pos\Details;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : pos.details.wizard
 * ---
 * Name : pos.details.wizard
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
     * Start Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $start_date;

    /**
     * End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $end_date;

    /**
     * Pos Config
     * ---
     * Relation : many2many (pos.config)
     * @see \Flux\OdooApiClient\Model\Object\Pos\Config
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $pos_config_ids;

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
     * @param DateTimeInterface $start_date Start Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $end_date End Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(DateTimeInterface $start_date, DateTimeInterface $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePosConfigIds(OdooRelation $item): void
    {
        if (null === $this->pos_config_ids) {
            $this->pos_config_ids = [];
        }

        if ($this->hasPosConfigIds($item)) {
            $index = array_search($item, $this->pos_config_ids);
            unset($this->pos_config_ids[$index]);
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->start_date;
    }

    /**
     * @param OdooRelation $item
     */
    public function addPosConfigIds(OdooRelation $item): void
    {
        if ($this->hasPosConfigIds($item)) {
            return;
        }

        if (null === $this->pos_config_ids) {
            $this->pos_config_ids = [];
        }

        $this->pos_config_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPosConfigIds(OdooRelation $item): bool
    {
        if (null === $this->pos_config_ids) {
            return false;
        }

        return in_array($item, $this->pos_config_ids);
    }

    /**
     * @param OdooRelation[]|null $pos_config_ids
     */
    public function setPosConfigIds(?array $pos_config_ids): void
    {
        $this->pos_config_ids = $pos_config_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPosConfigIds(): ?array
    {
        return $this->pos_config_ids;
    }

    /**
     * @param DateTimeInterface $end_date
     */
    public function setEndDate(DateTimeInterface $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEndDate(): DateTimeInterface
    {
        return $this->end_date;
    }

    /**
     * @param DateTimeInterface $start_date
     */
    public function setStartDate(DateTimeInterface $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'pos.details.wizard';
    }
}
