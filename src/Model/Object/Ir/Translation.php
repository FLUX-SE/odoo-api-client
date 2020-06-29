<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.translation
 * Name : ir.translation
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Translation extends Base
{
    /**
     * Translated field
     *
     * @var string
     */
    private $name;

    /**
     * Record ID
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Language
     *
     * @var null|array
     */
    private $lang;

    /**
     * Type
     *
     * @var null|array
     */
    private $type;

    /**
     * Internal Source
     *
     * @var null|string
     */
    private $src;

    /**
     * Translation Value
     *
     * @var null|string
     */
    private $value;

    /**
     * Module
     * Module this term belongs to
     *
     * @var null|string
     */
    private $module;

    /**
     * Status
     * Automatically set to let administators find new terms that might need to be translated
     *
     * @var null|array
     */
    private $state;

    /**
     * Translation comments
     *
     * @var null|string
     */
    private $comments;

    /**
     * @param string $name Translated field
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     */
    public function removeType($item): void
    {
        if (null === $this->type) {
            $this->type = [];
        }

        if ($this->hasType($item)) {
            $index = array_search($item, $this->type);
            unset($this->type[$index]);
        }
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
     * @param null|string $module
     */
    public function setModule(?string $module): void
    {
        $this->module = $module;
    }

    /**
     * @param null|string $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param null|string $src
     */
    public function setSrc(?string $src): void
    {
        $this->src = $src;
    }

    /**
     * @param mixed $item
     */
    public function addType($item): void
    {
        if ($this->hasType($item)) {
            return;
        }

        if (null === $this->type) {
            $this->type = [];
        }

        $this->type[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType($item, bool $strict = true): bool
    {
        if (null === $this->type) {
            return false;
        }

        return in_array($item, $this->type, $strict);
    }

    /**
     * @param null|array $type
     */
    public function setType(?array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $item
     */
    public function removeLang($item): void
    {
        if (null === $this->lang) {
            $this->lang = [];
        }

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

        if (null === $this->lang) {
            $this->lang = [];
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
        if (null === $this->lang) {
            return false;
        }

        return in_array($item, $this->lang, $strict);
    }

    /**
     * @param null|array $lang
     */
    public function setLang(?array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|string $comments
     */
    public function setComments(?string $comments): void
    {
        $this->comments = $comments;
    }
}
