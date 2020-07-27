<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Partner\Merge;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.partner.merge.line
 * ---
 * Name : base.partner.merge.line
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Line extends Base
{
    /**
     * Wizard
     * ---
     * Relation : many2one (base.partner.merge.automatic.wizard)
     * @see \Flux\OdooApiClient\Model\Object\Base\Partner\Merge\Automatic\Wizard
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $wizard_id;

    /**
     * MinID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $min_id;

    /**
     * Ids
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $aggr_ids;

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
     * @param string $aggr_ids Ids
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $aggr_ids)
    {
        $this->aggr_ids = $aggr_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWizardId(): ?OdooRelation
    {
        return $this->wizard_id;
    }

    /**
     * @param OdooRelation|null $wizard_id
     */
    public function setWizardId(?OdooRelation $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @return int|null
     */
    public function getMinId(): ?int
    {
        return $this->min_id;
    }

    /**
     * @param int|null $min_id
     */
    public function setMinId(?int $min_id): void
    {
        $this->min_id = $min_id;
    }

    /**
     * @return string
     */
    public function getAggrIds(): string
    {
        return $this->aggr_ids;
    }

    /**
     * @param string $aggr_ids
     */
    public function setAggrIds(string $aggr_ids): void
    {
        $this->aggr_ids = $aggr_ids;
    }

    /**
     * @return OdooRelation|null
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
        return 'base.partner.merge.line';
    }
}
