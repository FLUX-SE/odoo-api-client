<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Reset\View\Arch;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : reset.view.arch.wizard
 * Name : reset.view.arch.wizard
 *
 * A wizard to reset views architecture.
 */
final class Wizard extends Base
{
    /**
     * View
     *
     * @var View
     */
    private $view_id;

    /**
     * View Name
     *
     * @var string
     */
    private $view_name;

    /**
     * Architecture Diff
     *
     * @var string
     */
    private $arch_diff;

    /**
     * Reset Mode
     *
     * @var null|array
     */
    private $reset_mode;

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
     * @param View $view_id
     */
    public function setViewId(View $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @return string
     */
    public function getViewName(): string
    {
        return $this->view_name;
    }

    /**
     * @return string
     */
    public function getArchDiff(): string
    {
        return $this->arch_diff;
    }

    /**
     * @param null|array $reset_mode
     */
    public function setResetMode(?array $reset_mode): void
    {
        $this->reset_mode = $reset_mode;
    }

    /**
     * @param ?array $reset_mode
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResetMode(?array $reset_mode, bool $strict = true): bool
    {
        if (null === $this->reset_mode) {
            return false;
        }

        return in_array($reset_mode, $this->reset_mode, $strict);
    }

    /**
     * @param ?array $reset_mode
     */
    public function addResetMode(?array $reset_mode): void
    {
        if ($this->hasResetMode($reset_mode)) {
            return;
        }

        if (null === $this->reset_mode) {
            $this->reset_mode = [];
        }

        $this->reset_mode[] = $reset_mode;
    }

    /**
     * @param ?array $reset_mode
     */
    public function removeResetMode(?array $reset_mode): void
    {
        if ($this->hasResetMode($reset_mode)) {
            $index = array_search($reset_mode, $this->reset_mode);
            unset($this->reset_mode[$index]);
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
