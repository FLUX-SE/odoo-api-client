<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.language.install
 * Name : base.language.install
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Install extends Base
{
    /**
     * Language
     *
     * @var null|array
     */
    private $lang;

    /**
     * Overwrite Existing Terms
     *
     * @var bool
     */
    private $overwrite;

    /**
     * Status
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
     * @param null|array $lang
     */
    public function setLang(?array $lang): void
    {
        $this->lang = $lang;
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
     */
    public function removeLang(?array $lang): void
    {
        if ($this->hasLang($lang)) {
            $index = array_search($lang, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param bool $overwrite
     */
    public function setOverwrite(bool $overwrite): void
    {
        $this->overwrite = $overwrite;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
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
