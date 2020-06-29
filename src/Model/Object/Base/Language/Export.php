<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.language.export
 * Name : base.language.export
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Export extends Base
{
    /**
     * File Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Language
     *
     * @var array
     */
    private $lang;

    /**
     * File Format
     *
     * @var array
     */
    private $format;

    /**
     * Apps To Export
     *
     * @var null|Module[]
     */
    private $modules;

    /**
     * File
     *
     * @var null|int
     */
    private $data;

    /**
     * State
     *
     * @var null|array
     */
    private $state;

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
     * @param array $lang Language
     * @param array $format File Format
     */
    public function __construct(array $lang, array $format)
    {
        $this->lang = $lang;
        $this->format = $format;
    }

    /**
     * @param Module $item
     */
    public function addModules(Module $item): void
    {
        if ($this->hasModules($item)) {
            return;
        }

        if (null === $this->modules) {
            $this->modules = [];
        }

        $this->modules[] = $item;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param mixed $item
     */
    public function removeState($item): void
    {
        if (null === $this->state) {
            $this->state = [];
        }

        if ($this->hasState($item)) {
            $index = array_search($item, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addState($item): void
    {
        if ($this->hasState($item)) {
            return;
        }

        if (null === $this->state) {
            $this->state = [];
        }

        $this->state[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState($item, bool $strict = true): bool
    {
        if (null === $this->state) {
            return false;
        }

        return in_array($item, $this->state, $strict);
    }

    /**
     * @param null|array $state
     */
    public function setState(?array $state): void
    {
        $this->state = $state;
    }

    /**
     * @return null|int
     */
    public function getData(): ?int
    {
        return $this->data;
    }

    /**
     * @param Module $item
     */
    public function removeModules(Module $item): void
    {
        if (null === $this->modules) {
            $this->modules = [];
        }

        if ($this->hasModules($item)) {
            $index = array_search($item, $this->modules);
            unset($this->modules[$index]);
        }
    }

    /**
     * @param Module $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasModules(Module $item, bool $strict = true): bool
    {
        if (null === $this->modules) {
            return false;
        }

        return in_array($item, $this->modules, $strict);
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|Module[] $modules
     */
    public function setModules(?array $modules): void
    {
        $this->modules = $modules;
    }

    /**
     * @param mixed $item
     */
    public function removeFormat($item): void
    {
        if ($this->hasFormat($item)) {
            $index = array_search($item, $this->format);
            unset($this->format[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addFormat($item): void
    {
        if ($this->hasFormat($item)) {
            return;
        }

        $this->format[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFormat($item, bool $strict = true): bool
    {
        return in_array($item, $this->format, $strict);
    }

    /**
     * @param array $format
     */
    public function setFormat(array $format): void
    {
        $this->format = $format;
    }

    /**
     * @param mixed $item
     */
    public function removeLang($item): void
    {
        if ($this->hasLang($item)) {
            $index = array_search($item, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addLang($item): void
    {
        if ($this->hasLang($item)) {
            return;
        }

        $this->lang[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang($item, bool $strict = true): bool
    {
        return in_array($item, $this->lang, $strict);
    }

    /**
     * @param array $lang
     */
    public function setLang(array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
