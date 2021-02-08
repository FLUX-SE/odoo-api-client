<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.rule
 * ---
 * Name : ir.rule
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Rule extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Active
     * ---
     * If you uncheck the active field, it will disable the record rule without deleting it (if you delete a native
     * record rule, it may be re-created when you reload the module).
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $model_id;

    /**
     * Groups
     * ---
     * Relation : many2many (res.groups)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Groups
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $groups;

    /**
     * Domain
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $domain_force;

    /**
     * Apply for Read
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_read;

    /**
     * Apply for Write
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_write;

    /**
     * Apply for Create
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_create;

    /**
     * Apply for Delete
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $perm_unlink;

    /**
     * Global
     * ---
     * If no group is specified the rule is global and applied to everyone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $global;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $model_id Model
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * @param bool|null $perm_write
     */
    public function setPermWrite(?bool $perm_write): void
    {
        $this->perm_write = $perm_write;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $global
     */
    public function setGlobal(?bool $global): void
    {
        $this->global = $global;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("global")
     */
    public function isGlobal(): ?bool
    {
        return $this->global;
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
     *
     * @SerializedName("perm_unlink")
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
     * @return bool|null
     *
     * @SerializedName("perm_create")
     */
    public function isPermCreate(): ?bool
    {
        return $this->perm_create;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("perm_write")
     */
    public function isPermWrite(): ?bool
    {
        return $this->perm_write;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
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
     *
     * @SerializedName("perm_read")
     */
    public function isPermRead(): ?bool
    {
        return $this->perm_read;
    }

    /**
     * @param string|null $domain_force
     */
    public function setDomainForce(?string $domain_force): void
    {
        $this->domain_force = $domain_force;
    }

    /**
     * @return string|null
     *
     * @SerializedName("domain_force")
     */
    public function getDomainForce(): ?string
    {
        return $this->domain_force;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGroups(OdooRelation $item): void
    {
        if (null === $this->groups) {
            $this->groups = [];
        }

        if ($this->hasGroups($item)) {
            $index = array_search($item, $this->groups);
            unset($this->groups[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addGroups(OdooRelation $item): void
    {
        if ($this->hasGroups($item)) {
            return;
        }

        if (null === $this->groups) {
            $this->groups = [];
        }

        $this->groups[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGroups(OdooRelation $item): bool
    {
        if (null === $this->groups) {
            return false;
        }

        return in_array($item, $this->groups);
    }

    /**
     * @param OdooRelation[]|null $groups
     */
    public function setGroups(?array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("groups")
     */
    public function getGroups(): ?array
    {
        return $this->groups;
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
     *
     * @SerializedName("model_id")
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
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
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
        return 'ir.rule';
    }
}
