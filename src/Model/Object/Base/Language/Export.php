<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.language.export
 * Name : base.language.export
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Export extends Base
{
    /**
     * File Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Language
     * ---
     * Selection : (default value, usually null)
     *     -> __new__ (New Language (Empty translation template))
     *     -> en_US (English (US))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $lang;

    /**
     * File Format
     * ---
     * Selection : (default value, usually null)
     *     -> csv (CSV File)
     *     -> po (PO File)
     *     -> tgz (TGZ Archive)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $format;

    /**
     * Apps To Export
     * ---
     * Relation : many2many (ir.module.module)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Module\Module
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $modules;

    /**
     * File
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $data;

    /**
     * State
     * ---
     * Selection : (default value, usually null)
     *     -> choose (choose)
     *     -> get (get)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $lang Language
     *        ---
     *        Selection : (default value, usually null)
     *            -> __new__ (New Language (Empty translation template))
     *            -> en_US (English (US))
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $format File Format
     *        ---
     *        Selection : (default value, usually null)
     *            -> csv (CSV File)
     *            -> po (PO File)
     *            -> tgz (TGZ Archive)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $lang, string $format)
    {
        $this->lang = $lang;
        $this->format = $format;
    }

    /**
     * @param string|null $data
     */
    public function setData(?string $data): void
    {
        $this->data = $data;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeModules(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addModules(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasModules(OdooRelation $item): bool
    {
        if (null === $this->modules) {
            return false;
        }

        return in_array($item, $this->modules);
    }

    /**
     * @param OdooRelation[]|null $modules
     */
    public function setModules(?array $modules): void
    {
        $this->modules = $modules;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getModules(): ?array
    {
        return $this->modules;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.language.export';
    }
}
