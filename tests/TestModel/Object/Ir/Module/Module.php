<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Ir\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.module.module
 * ---
 * Name : ir.module.module
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
final class Module extends Base
{
    /**
     * Technical Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Category
     * ---
     * Relation : many2one (ir.module.category)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Module\Category
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $category_id;

    /**
     * Module Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $shortdesc;

    /**
     * Summary
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $summary;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Description HTML
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $description_html;

    /**
     * Author
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $author;

    /**
     * Maintainer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $maintainer;

    /**
     * Contributors
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $contributors;

    /**
     * Website
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $website;

    /**
     * Latest Version
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $installed_version;

    /**
     * Installed Version
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $latest_version;

    /**
     * Published Version
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $published_version;

    /**
     * URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $url;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Dependencies
     * ---
     * Relation : one2many (ir.module.module.dependency -> module_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Module\Module\Dependency
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $dependencies_id;

    /**
     * Exclusions
     * ---
     * Relation : one2many (ir.module.module.exclusion -> module_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Module\Module\Exclusion
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $exclusion_ids;

    /**
     * Automatic Installation
     * ---
     * An auto-installable module is automatically installed by the system when all its dependencies are satisfied.
     * If the module has no dependency, it is always installed.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_install;

    /**
     * Status
     * ---
     * Selection :
     *     -> uninstallable (Uninstallable)
     *     -> uninstalled (Not Installed)
     *     -> installed (Installed)
     *     -> to upgrade (To be upgraded)
     *     -> to remove (To be removed)
     *     -> to install (To be installed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Demo Data
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $demo;

    /**
     * License
     * ---
     * Selection :
     *     -> GPL-2 (GPL Version 2)
     *     -> GPL-2 or any later version (GPL-2 or later version)
     *     -> GPL-3 (GPL Version 3)
     *     -> GPL-3 or any later version (GPL-3 or later version)
     *     -> AGPL-3 (Affero GPL-3)
     *     -> LGPL-3 (LGPL Version 3)
     *     -> Other OSI approved licence (Other OSI Approved License)
     *     -> OEEL-1 (Odoo Enterprise Edition License v1.0)
     *     -> OPL-1 (Odoo Proprietary License v1.0)
     *     -> Other proprietary (Other Proprietary)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $license;

    /**
     * Menus
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $menus_by_module;

    /**
     * Reports
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $reports_by_module;

    /**
     * Views
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $views_by_module;

    /**
     * Application
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $application;

    /**
     * Icon URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $icon;

    /**
     * Icon
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $icon_image;

    /**
     * Odoo Enterprise Module
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $to_buy;

    /**
     * Has Iap
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $has_iap;

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
     * @param string $name Technical Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("license")
     */
    public function getLicense(): ?string
    {
        return $this->license;
    }

    /**
     * @return string|null
     *
     * @SerializedName("views_by_module")
     */
    public function getViewsByModule(): ?string
    {
        return $this->views_by_module;
    }

    /**
     * @param string|null $reports_by_module
     */
    public function setReportsByModule(?string $reports_by_module): void
    {
        $this->reports_by_module = $reports_by_module;
    }

    /**
     * @return string|null
     *
     * @SerializedName("reports_by_module")
     */
    public function getReportsByModule(): ?string
    {
        return $this->reports_by_module;
    }

    /**
     * @param string|null $menus_by_module
     */
    public function setMenusByModule(?string $menus_by_module): void
    {
        $this->menus_by_module = $menus_by_module;
    }

    /**
     * @return string|null
     *
     * @SerializedName("menus_by_module")
     */
    public function getMenusByModule(): ?string
    {
        return $this->menus_by_module;
    }

    /**
     * @param string|null $license
     */
    public function setLicense(?string $license): void
    {
        $this->license = $license;
    }

    /**
     * @param bool|null $demo
     */
    public function setDemo(?bool $demo): void
    {
        $this->demo = $demo;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("application")
     */
    public function isApplication(): ?bool
    {
        return $this->application;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("demo")
     */
    public function isDemo(): ?bool
    {
        return $this->demo;
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
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param bool|null $auto_install
     */
    public function setAutoInstall(?bool $auto_install): void
    {
        $this->auto_install = $auto_install;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("auto_install")
     */
    public function isAutoInstall(): ?bool
    {
        return $this->auto_install;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeExclusionIds(OdooRelation $item): void
    {
        if (null === $this->exclusion_ids) {
            $this->exclusion_ids = [];
        }

        if ($this->hasExclusionIds($item)) {
            $index = array_search($item, $this->exclusion_ids);
            unset($this->exclusion_ids[$index]);
        }
    }

    /**
     * @param string|null $views_by_module
     */
    public function setViewsByModule(?string $views_by_module): void
    {
        $this->views_by_module = $views_by_module;
    }

    /**
     * @param bool|null $application
     */
    public function setApplication(?bool $application): void
    {
        $this->application = $application;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasExclusionIds(OdooRelation $item): bool
    {
        if (null === $this->exclusion_ids) {
            return false;
        }

        return in_array($item, $this->exclusion_ids);
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return string|null
     *
     * @SerializedName("icon")
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param bool|null $has_iap
     */
    public function setHasIap(?bool $has_iap): void
    {
        $this->has_iap = $has_iap;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_iap")
     */
    public function isHasIap(): ?bool
    {
        return $this->has_iap;
    }

    /**
     * @param bool|null $to_buy
     */
    public function setToBuy(?bool $to_buy): void
    {
        $this->to_buy = $to_buy;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("to_buy")
     */
    public function isToBuy(): ?bool
    {
        return $this->to_buy;
    }

    /**
     * @param mixed|null $icon_image
     */
    public function setIconImage($icon_image): void
    {
        $this->icon_image = $icon_image;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("icon_image")
     */
    public function getIconImage()
    {
        return $this->icon_image;
    }

    /**
     * @param string|null $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param OdooRelation $item
     */
    public function addExclusionIds(OdooRelation $item): void
    {
        if ($this->hasExclusionIds($item)) {
            return;
        }

        if (null === $this->exclusion_ids) {
            $this->exclusion_ids = [];
        }

        $this->exclusion_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $exclusion_ids
     */
    public function setExclusionIds(?array $exclusion_ids): void
    {
        $this->exclusion_ids = $exclusion_ids;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string|null $maintainer
     */
    public function setMaintainer(?string $maintainer): void
    {
        $this->maintainer = $maintainer;
    }

    /**
     * @return string|null
     *
     * @SerializedName("maintainer")
     */
    public function getMaintainer(): ?string
    {
        return $this->maintainer;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string|null
     *
     * @SerializedName("author")
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $description_html
     */
    public function setDescriptionHtml(?string $description_html): void
    {
        $this->description_html = $description_html;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description_html")
     */
    public function getDescriptionHtml(): ?string
    {
        return $this->description_html;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $contributors
     */
    public function setContributors(?string $contributors): void
    {
        $this->contributors = $contributors;
    }

    /**
     * @param string|null $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("summary")
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string|null $shortdesc
     */
    public function setShortdesc(?string $shortdesc): void
    {
        $this->shortdesc = $shortdesc;
    }

    /**
     * @return string|null
     *
     * @SerializedName("shortdesc")
     */
    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    /**
     * @param OdooRelation|null $category_id
     */
    public function setCategoryId(?OdooRelation $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?OdooRelation
    {
        return $this->category_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("contributors")
     */
    public function getContributors(): ?string
    {
        return $this->contributors;
    }

    /**
     * @return string|null
     *
     * @SerializedName("website")
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("exclusion_ids")
     */
    public function getExclusionIds(): ?array
    {
        return $this->exclusion_ids;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDependenciesId(OdooRelation $item): void
    {
        if (null === $this->dependencies_id) {
            $this->dependencies_id = [];
        }

        if ($this->hasDependenciesId($item)) {
            $index = array_search($item, $this->dependencies_id);
            unset($this->dependencies_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addDependenciesId(OdooRelation $item): void
    {
        if ($this->hasDependenciesId($item)) {
            return;
        }

        if (null === $this->dependencies_id) {
            $this->dependencies_id = [];
        }

        $this->dependencies_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDependenciesId(OdooRelation $item): bool
    {
        if (null === $this->dependencies_id) {
            return false;
        }

        return in_array($item, $this->dependencies_id);
    }

    /**
     * @param OdooRelation[]|null $dependencies_id
     */
    public function setDependenciesId(?array $dependencies_id): void
    {
        $this->dependencies_id = $dependencies_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("dependencies_id")
     */
    public function getDependenciesId(): ?array
    {
        return $this->dependencies_id;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     *
     * @SerializedName("url")
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $published_version
     */
    public function setPublishedVersion(?string $published_version): void
    {
        $this->published_version = $published_version;
    }

    /**
     * @return string|null
     *
     * @SerializedName("published_version")
     */
    public function getPublishedVersion(): ?string
    {
        return $this->published_version;
    }

    /**
     * @param string|null $latest_version
     */
    public function setLatestVersion(?string $latest_version): void
    {
        $this->latest_version = $latest_version;
    }

    /**
     * @return string|null
     *
     * @SerializedName("latest_version")
     */
    public function getLatestVersion(): ?string
    {
        return $this->latest_version;
    }

    /**
     * @param string|null $installed_version
     */
    public function setInstalledVersion(?string $installed_version): void
    {
        $this->installed_version = $installed_version;
    }

    /**
     * @return string|null
     *
     * @SerializedName("installed_version")
     */
    public function getInstalledVersion(): ?string
    {
        return $this->installed_version;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.module.module';
    }
}
