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
 * Info :
 * A wizard to reset views architecture.
 */
final class Wizard extends Base
{
    /**
     * View
     *
     * @var null|View
     */
    private $view_id;

    /**
     * View Name
     *
     * @var null|string
     */
    private $view_name;

    /**
     * Architecture Diff
     *
     * @var null|string
     */
    private $arch_diff;

    /**
     * Reset Mode
     * You might want to try a soft reset first.
     *
     * @var array
     */
    private $reset_mode;

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
     * @param array $reset_mode Reset Mode
     *        You might want to try a soft reset first.
     */
    public function __construct(array $reset_mode)
    {
        $this->reset_mode = $reset_mode;
    }

    /**
     * @param null|View $view_id
     */
    public function setViewId(?View $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @return null|string
     */
    public function getViewName(): ?string
    {
        return $this->view_name;
    }

    /**
     * @return null|string
     */
    public function getArchDiff(): ?string
    {
        return $this->arch_diff;
    }

    /**
     * @param array $reset_mode
     */
    public function setResetMode(array $reset_mode): void
    {
        $this->reset_mode = $reset_mode;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasResetMode($item, bool $strict = true): bool
    {
        return in_array($item, $this->reset_mode, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addResetMode($item): void
    {
        if ($this->hasResetMode($item)) {
            return;
        }

        $this->reset_mode[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeResetMode($item): void
    {
        if ($this->hasResetMode($item)) {
            $index = array_search($item, $this->reset_mode);
            unset($this->reset_mode[$index]);
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
