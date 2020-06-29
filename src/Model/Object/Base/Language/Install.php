<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.language.install
 * Name : base.language.install
 * Info :
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
     * @var array
     */
    private $lang;

    /**
     * Overwrite Existing Terms
     * If you check this box, your customized translations will be overwritten and replaced by the official ones.
     *
     * @var null|bool
     */
    private $overwrite;

    /**
     * Status
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
     */
    public function __construct(array $lang)
    {
        $this->lang = $lang;
    }

    /**
     * @param array $lang
     */
    public function setLang(array $lang): void
    {
        $this->lang = $lang;
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
     */
    public function removeLang($item): void
    {
        if ($this->hasLang($item)) {
            $index = array_search($item, $this->lang);
            unset($this->lang[$index]);
        }
    }

    /**
     * @param null|bool $overwrite
     */
    public function setOverwrite(?bool $overwrite): void
    {
        $this->overwrite = $overwrite;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
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
