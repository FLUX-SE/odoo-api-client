<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Actions\ActWindow;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View as ViewAlias;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.actions.act_window.view
 * Name : ir.actions.act_window.view
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class View extends Base
{
    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * View
     *
     * @var null|ViewAlias
     */
    private $view_id;

    /**
     * Action
     *
     * @var null|ActWindow
     */
    private $act_window_id;

    /**
     * On Multiple Doc.
     * If set to true, the action will not be displayed on the right toolbar of a form view.
     *
     * @var null|bool
     */
    private $multi;

    /**
     * View Type
     *
     * @var array
     */
    private $view_mode;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param array $view_mode View Type
     */
    public function __construct(array $view_mode)
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|ViewAlias $view_id
     */
    public function setViewId(?ViewAlias $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @param null|ActWindow $act_window_id
     */
    public function setActWindowId(?ActWindow $act_window_id): void
    {
        $this->act_window_id = $act_window_id;
    }

    /**
     * @param null|bool $multi
     */
    public function setMulti(?bool $multi): void
    {
        $this->multi = $multi;
    }

    /**
     * @param array $view_mode
     */
    public function setViewMode(array $view_mode): void
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasViewMode($item, bool $strict = true): bool
    {
        return in_array($item, $this->view_mode, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addViewMode($item): void
    {
        if ($this->hasViewMode($item)) {
            return;
        }

        $this->view_mode[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeViewMode($item): void
    {
        if ($this->hasViewMode($item)) {
            $index = array_search($item, $this->view_mode);
            unset($this->view_mode[$index]);
        }
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
