<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.model.access
 * Name : ir.model.access
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class Access extends Base
{
    public const ODOO_MODEL_NAME = 'ir.model.access';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * If you uncheck the active field, it will disable the ACL without deleting it (if you delete a native ACL, it
     * will be re-created when you reload the module).
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Object
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Group
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $group_id;

    /**
     * Read Access
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_read;

    /**
     * Write Access
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_write;

    /**
     * Create Access
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_create;

    /**
     * Delete Access
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_unlink;

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
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $model_id Object
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $model_id)
    {
        $this->name = $name;
        $this->model_id = $model_id;
    }

    /**
     * @return bool|null
     */
    public function isPermCreate(): ?bool
    {
        return $this->perm_create;
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
     * @param bool|null $perm_unlink
     */
    public function setPermUnlink(?bool $perm_unlink): void
    {
        $this->perm_unlink = $perm_unlink;
    }

    /**
     * @return bool|null
     */
    public function isPermUnlink(): ?bool
    {
        return $this->perm_unlink;
    }

    /**
     * @param bool|null $perm_create
     */
    public function setPermCreate(?bool $perm_create): void
    {
        $this->perm_create = $perm_create;
    }

    /**
     * @param bool|null $perm_write
     */
    public function setPermWrite(?bool $perm_write): void
    {
        $this->perm_write = $perm_write;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool|null
     */
    public function isPermWrite(): ?bool
    {
        return $this->perm_write;
    }

    /**
     * @param bool|null $perm_read
     */
    public function setPermRead(?bool $perm_read): void
    {
        $this->perm_read = $perm_read;
    }

    /**
     * @return bool|null
     */
    public function isPermRead(): ?bool
    {
        return $this->perm_read;
    }

    /**
     * @param OdooRelation|null $group_id
     */
    public function setGroupId(?OdooRelation $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGroupId(): ?OdooRelation
    {
        return $this->group_id;
    }

    /**
     * @param OdooRelation $model_id
     */
    public function setModelId(OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation
     */
    public function getModelId(): OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}
