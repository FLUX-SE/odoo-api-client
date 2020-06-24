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
 *
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
     * @var string
     */
    private $name;

    /**
     * Language
     *
     * @var null|array
     */
    private $lang;

    /**
     * File Format
     *
     * @var null|array
     */
    private $format;

    /**
     * Apps To Export
     *
     * @var Module
     */
    private $modules;

    /**
     * File
     *
     * @var int
     */
    private $data;

    /**
     * State
     *
     * @var array
     */
    private $state;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getData(): int
    {
        return $this->data;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param array $state
     */
    public function removeState(array $state): void
    {
        if ($this->hasState($state)) {
            $index = array_search($state, $this->state);
            unset($this->state[$index]);
        }
    }

    /**
     * @param array $state
     */
    public function addState(array $state): void
    {
        if ($this->hasState($state)) {
            return;
        }

        $this->state[] = $state;
    }

    /**
     * @param array $state
     * @param bool $strict
     *
     * @return bool
     */
    public function hasState(array $state, bool $strict = true): bool
    {
        return in_array($state, $this->state, $strict);
    }

    /**
     * @param array $state
     */
    public function setState(array $state): void
    {
        $this->state = $state;
    }

    /**
     * @param Module $modules
     */
    public function setModules(Module $modules): void
    {
        $this->modules = $modules;
    }

    /**
     * @param null|array $lang
     */
    public function setLang(?array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param ?array $format
     */
    public function removeFormat(?array $format): void
    {
        if ($this->hasFormat($format)) {
            $index = array_search($format, $this->format);
            unset($this->format[$index]);
        }
    }

    /**
     * @param ?array $format
     */
    public function addFormat(?array $format): void
    {
        if ($this->hasFormat($format)) {
            return;
        }

        if (null === $this->format) {
            $this->format = [];
        }

        $this->format[] = $format;
    }

    /**
     * @param ?array $format
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFormat(?array $format, bool $strict = true): bool
    {
        if (null === $this->format) {
            return false;
        }

        return in_array($format, $this->format, $strict);
    }

    /**
     * @param null|array $format
     */
    public function setFormat(?array $format): void
    {
        $this->format = $format;
    }

    /**
     * @param ?array $lang
     */
    public function removeLang(?array $lang): void
    {
        if ($this->hasLang($lang)) {
            $index = array_search($lang, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param ?array $lang
     */
    public function addLang(?array $lang): void
    {
        if ($this->hasLang($lang)) {
            return;
        }

        if (null === $this->lang) {
            $this->lang = [];
        }

        $this->lang[] = $lang;
    }

    /**
     * @param ?array $lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang(?array $lang, bool $strict = true): bool
    {
        if (null === $this->lang) {
            return false;
        }

        return in_array($lang, $this->lang, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
