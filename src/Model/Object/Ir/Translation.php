<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : ir.translation
 * Name : ir.translation
 *
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
     * @var null|string
     */
    private $name;

    /**
     * Record ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Language
     *
     * @var array
     */
    private $lang;

    /**
     * Type
     *
     * @var array
     */
    private $type;

    /**
     * Internal Source
     *
     * @var string
     */
    private $src;

    /**
     * Translation Value
     *
     * @var string
     */
    private $value;

    /**
     * Module
     *
     * @var string
     */
    private $module;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Translation comments
     *
     * @var string
     */
    private $comments;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $src
     */
    public function setSrc(string $src): void
    {
        $this->src = $src;
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
     * @param string $module
     */
    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param array $type
     */
    public function removeType(array $type): void
    {
        if ($this->hasType($type)) {
            $index = array_search($type, $this->type);
            unset($this->type[$index]);
        }
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param array $type
     */
    public function addType(array $type): void
    {
        if ($this->hasType($type)) {
            return;
        }

        $this->type[] = $type;
    }

    /**
     * @param array $type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasType(array $type, bool $strict = true): bool
    {
        return in_array($type, $this->type, $strict);
    }

    /**
     * @param array $type
     */
    public function setType(array $type): void
    {
        $this->type = $type;
    }

    /**
     * @param array $lang
     */
    public function removeLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            $index = array_search($lang, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param array $lang
     */
    public function addLang(array $lang): void
    {
        if ($this->hasLang($lang)) {
            return;
        }

        $this->lang[] = $lang;
    }

    /**
     * @param array $lang
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLang(array $lang, bool $strict = true): bool
    {
        return in_array($lang, $this->lang, $strict);
    }

    /**
     * @param array $lang
     */
    public function setLang(array $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param string $comments
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }
}
