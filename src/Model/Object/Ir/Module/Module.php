<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Module;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module\Dependency;
use Flux\OdooApiClient\Model\Object\Ir\Module\Module\Exclusion;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.module.module
 * Name : ir.module.module
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
final class Module extends Base
{
    /**
     * Technical Name
     *
     * @var string
     */
    private $name;

    /**
     * Category
     *
     * @var null|Category
     */
    private $category_id;

    /**
     * Module Name
     *
     * @var null|string
     */
    private $shortdesc;

    /**
     * Summary
     *
     * @var null|string
     */
    private $summary;

    /**
     * Description
     *
     * @var null|string
     */
    private $description;

    /**
     * Description HTML
     *
     * @var null|string
     */
    private $description_html;

    /**
     * Author
     *
     * @var null|string
     */
    private $author;

    /**
     * Maintainer
     *
     * @var null|string
     */
    private $maintainer;

    /**
     * Contributors
     *
     * @var null|string
     */
    private $contributors;

    /**
     * Website
     *
     * @var null|string
     */
    private $website;

    /**
     * Latest Version
     *
     * @var null|string
     */
    private $installed_version;

    /**
     * Installed Version
     *
     * @var null|string
     */
    private $latest_version;

    /**
     * Published Version
     *
     * @var null|string
     */
    private $published_version;

    /**
     * URL
     *
     * @var null|string
     */
    private $url;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Dependencies
     *
     * @var null|Dependency[]
     */
    private $dependencies_id;

    /**
     * Exclusions
     *
     * @var null|Exclusion[]
     */
    private $exclusion_ids;

    /**
     * Automatic Installation
     * An auto-installable module is automatically installed by the system when all its dependencies are satisfied.
     * If the module has no dependency, it is always installed.
     *
     * @var null|bool
     */
    private $auto_install;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Demo Data
     *
     * @var null|bool
     */
    private $demo;

    /**
     * License
     *
     * @var null|array
     */
    private $license;

    /**
     * Menus
     *
     * @var null|string
     */
    private $menus_by_module;

    /**
     * Reports
     *
     * @var null|string
     */
    private $reports_by_module;

    /**
     * Views
     *
     * @var null|string
     */
    private $views_by_module;

    /**
     * Application
     *
     * @var null|bool
     */
    private $application;

    /**
     * Icon URL
     *
     * @var null|string
     */
    private $icon;

    /**
     * Icon
     *
     * @var null|int
     */
    private $icon_image;

    /**
     * Odoo Enterprise Module
     *
     * @var null|bool
     */
    private $to_buy;

    /**
     * Imported Module
     *
     * @var null|bool
     */
    private $imported;

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
     * @param string $name Technical Name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $auto_install
     */
    public function setAutoInstall(?bool $auto_install): void
    {
        $this->auto_install = $auto_install;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param null|bool $imported
     */
    public function setImported(?bool $imported): void
    {
        $this->imported = $imported;
    }

    /**
     * @param null|bool $to_buy
     */
    public function setToBuy(?bool $to_buy): void
    {
        $this->to_buy = $to_buy;
    }

    /**
     * @return null|int
     */
    public function getIconImage(): ?int
    {
        return $this->icon_image;
    }

    /**
     * @param null|string $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return null|bool
     */
    public function isApplication(): ?bool
    {
        return $this->application;
    }

    /**
     * @return null|string
     */
    public function getViewsByModule(): ?string
    {
        return $this->views_by_module;
    }

    /**
     * @return null|string
     */
    public function getReportsByModule(): ?string
    {
        return $this->reports_by_module;
    }

    /**
     * @return null|string
     */
    public function getMenusByModule(): ?string
    {
        return $this->menus_by_module;
    }

    /**
     * @return null|array
     */
    public function getLicense(): ?array
    {
        return $this->license;
    }

    /**
     * @return null|bool
     */
    public function isDemo(): ?bool
    {
        return $this->demo;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|Exclusion[]
     */
    public function getExclusionIds(): ?array
    {
        return $this->exclusion_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getMaintainer(): ?string
    {
        return $this->maintainer;
    }

    /**
     * @return null|Category
     */
    public function getCategoryId(): ?Category
    {
        return $this->category_id;
    }

    /**
     * @return null|string
     */
    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    /**
     * @return null|string
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return null|string
     */
    public function getDescriptionHtml(): ?string
    {
        return $this->description_html;
    }

    /**
     * @return null|string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @return null|string
     */
    public function getContributors(): ?string
    {
        return $this->contributors;
    }

    /**
     * @return null|Dependency[]
     */
    public function getDependenciesId(): ?array
    {
        return $this->dependencies_id;
    }

    /**
     * @return null|string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @return null|string
     */
    public function getInstalledVersion(): ?string
    {
        return $this->installed_version;
    }

    /**
     * @return null|string
     */
    public function getLatestVersion(): ?string
    {
        return $this->latest_version;
    }

    /**
     * @return null|string
     */
    public function getPublishedVersion(): ?string
    {
        return $this->published_version;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
