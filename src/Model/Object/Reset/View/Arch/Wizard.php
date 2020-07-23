<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Reset\View\Arch;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

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
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $view_id;

    /**
     * View Name
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $view_name;

    /**
     * Architecture Diff
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $arch_diff;

    /**
     * Reset Mode
     * You might want to try a soft reset first.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> soft (Restore previous version (soft reset).)
     *     -> hard (Reset to file version (hard reset).)
     *
     *
     * @var string
     */
    private $reset_mode;

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
     * @param string $reset_mode Reset Mode
     *        You might want to try a soft reset first.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> soft (Restore previous version (soft reset).)
     *            -> hard (Reset to file version (hard reset).)
     *
     */
    public function __construct(string $reset_mode)
    {
        $this->reset_mode = $reset_mode;
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
     * @return OdooRelation|null
     */
    public function getViewId(): ?OdooRelation
    {
        return $this->view_id;
    }

    /**
     * @param string $reset_mode
     */
    public function setResetMode(string $reset_mode): void
    {
        $this->reset_mode = $reset_mode;
    }

    /**
     * @return string
     */
    public function getResetMode(): string
    {
        return $this->reset_mode;
    }

    /**
     * @param string|null $arch_diff
     */
    public function setArchDiff(?string $arch_diff): void
    {
        $this->arch_diff = $arch_diff;
    }

    /**
     * @return string|null
     */
    public function getArchDiff(): ?string
    {
        return $this->arch_diff;
    }

    /**
     * @param string|null $view_name
     */
    public function setViewName(?string $view_name): void
    {
        $this->view_name = $view_name;
    }

    /**
     * @return string|null
     */
    public function getViewName(): ?string
    {
        return $this->view_name;
    }

    /**
     * @param OdooRelation|null $view_id
     */
    public function setViewId(?OdooRelation $view_id): void
    {
        $this->view_id = $view_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'reset.view.arch.wizard';
    }
}
