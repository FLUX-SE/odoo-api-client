<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.analytic.group
 * Name : account.analytic.group
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
final class Group extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Parent
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Parent Path
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $parent_path;

    /**
     * Childrens
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $children_ids;

    /**
     * Complete Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $complete_name;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCompleteName(): ?string
    {
        return $this->complete_name;
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $complete_name
     */
    public function setCompleteName(?string $complete_name): void
    {
        $this->complete_name = $complete_name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildrenIds(OdooRelation $item): void
    {
        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        if ($this->hasChildrenIds($item)) {
            $index = array_search($item, $this->children_ids);
            unset($this->children_ids[$index]);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildrenIds(OdooRelation $item): void
    {
        if ($this->hasChildrenIds($item)) {
            return;
        }

        if (null === $this->children_ids) {
            $this->children_ids = [];
        }

        $this->children_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildrenIds(OdooRelation $item): bool
    {
        if (null === $this->children_ids) {
            return false;
        }

        return in_array($item, $this->children_ids);
    }

    /**
     * @param OdooRelation[]|null $children_ids
     */
    public function setChildrenIds(?array $children_ids): void
    {
        $this->children_ids = $children_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getChildrenIds(): ?array
    {
        return $this->children_ids;
    }

    /**
     * @param string|null $parent_path
     */
    public function setParentPath(?string $parent_path): void
    {
        $this->parent_path = $parent_path;
    }

    /**
     * @return string|null
     */
    public function getParentPath(): ?string
    {
        return $this->parent_path;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.analytic.group';
    }
}
