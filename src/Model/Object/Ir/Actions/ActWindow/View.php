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
 *
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
     * @var int
     */
    private $sequence;

    /**
     * View
     *
     * @var ViewAlias
     */
    private $view_id;

    /**
     * Action
     *
     * @var ActWindow
     */
    private $act_window_id;

    /**
     * On Multiple Doc.
     *
     * @var bool
     */
    private $multi;

    /**
     * View Type
     *
     * @var null|array
     */
    private $view_mode;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param ViewAlias $view_id
     */
    public function setViewId(ViewAlias $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @param ActWindow $act_window_id
     */
    public function setActWindowId(ActWindow $act_window_id): void
    {
        $this->act_window_id = $act_window_id;
    }

    /**
     * @param bool $multi
     */
    public function setMulti(bool $multi): void
    {
        $this->multi = $multi;
    }

    /**
     * @param null|array $view_mode
     */
    public function setViewMode(?array $view_mode): void
    {
        $this->view_mode = $view_mode;
    }

    /**
     * @param ?array $view_mode
     * @param bool $strict
     *
     * @return bool
     */
    public function hasViewMode(?array $view_mode, bool $strict = true): bool
    {
        if (null === $this->view_mode) {
            return false;
        }

        return in_array($view_mode, $this->view_mode, $strict);
    }

    /**
     * @param ?array $view_mode
     */
    public function addViewMode(?array $view_mode): void
    {
        if ($this->hasViewMode($view_mode)) {
            return;
        }

        if (null === $this->view_mode) {
            $this->view_mode = [];
        }

        $this->view_mode[] = $view_mode;
    }

    /**
     * @param ?array $view_mode
     */
    public function removeViewMode(?array $view_mode): void
    {
        if ($this->hasViewMode($view_mode)) {
            $index = array_search($view_mode, $this->view_mode);
            unset($this->view_mode[$index]);
        }
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
