<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.actions.act_window.view
 * Name : ir.actions.act_window.view
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class View extends Base
{
    public const ODOO_MODEL_NAME = 'ir.actions.act_window.view';

    /**
     * Sequence
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * View
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $view_id;

    /**
     * Action
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $act_window_id;

    /**
     * On Multiple Doc.
     * If set to true, the action will not be displayed on the right toolbar of a form view.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $multi;

    /**
     * View Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> tree (Tree)
     *     -> form (Form)
     *     -> graph (Graph)
     *     -> pivot (Pivot)
     *     -> calendar (Calendar)
     *     -> gantt (Gantt)
     *     -> kanban (Kanban)
     *     -> qweb (QWeb)
     *     -> cohort (Cohort)
     *     -> dashboard (Dashboard)
     *     -> grid (Grid)
     *     -> activity (Activity)
     *     -> map (Map)
     *
     *
     * @var string
     */
    private $view_mode;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $view_mode View Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> tree (Tree)
     *            -> form (Form)
     *            -> graph (Graph)
     *            -> pivot (Pivot)
     *            -> calendar (Calendar)
     *            -> gantt (Gantt)
     *            -> kanban (Kanban)
     *            -> qweb (QWeb)
     *            -> cohort (Cohort)
     *            -> dashboard (Dashboard)
     *            -> grid (Grid)
     *            -> activity (Activity)
     *            -> map (Map)
     *
     */
    public function __construct(string $view_mode)
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param string $view_mode
     */
    public function setViewMode(string $view_mode): void
    {
        $this->view_mode = $view_mode;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getViewMode(): string
    {
        return $this->view_mode;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param bool|null $multi
     */
    public function setMulti(?bool $multi): void
    {
        $this->multi = $multi;
    }

    /**
     * @return bool|null
     */
    public function isMulti(): ?bool
    {
        return $this->multi;
    }

    /**
     * @param OdooRelation|null $act_window_id
     */
    public function setActWindowId(?OdooRelation $act_window_id): void
    {
        $this->act_window_id = $act_window_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActWindowId(): ?OdooRelation
    {
        return $this->act_window_id;
    }

    /**
     * @param OdooRelation|null $view_id
     */
    public function setViewId(?OdooRelation $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getViewId(): ?OdooRelation
    {
        return $this->view_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
