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
final class Module extends Base
{
    /**
     * Technical Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Category
     *
     * @var Category
     */
    private $category_id;

    /**
     * Module Name
     *
     * @var string
     */
    private $shortdesc;

    /**
     * Summary
     *
     * @var string
     */
    private $summary;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Description HTML
     *
     * @var string
     */
    private $description_html;

    /**
     * Author
     *
     * @var string
     */
    private $author;

    /**
     * Maintainer
     *
     * @var string
     */
    private $maintainer;

    /**
     * Contributors
     *
     * @var string
     */
    private $contributors;

    /**
     * Website
     *
     * @var string
     */
    private $website;

    /**
     * Latest Version
     *
     * @var string
     */
    private $installed_version;

    /**
     * Installed Version
     *
     * @var string
     */
    private $latest_version;

    /**
     * Published Version
     *
     * @var string
     */
    private $published_version;

    /**
     * URL
     *
     * @var string
     */
    private $url;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Dependencies
     *
     * @var Dependency
     */
    private $dependencies_id;

    /**
     * Exclusions
     *
     * @var Exclusion
     */
    private $exclusion_ids;

    /**
     * Automatic Installation
     *
     * @var bool
     */
    private $auto_install;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Demo Data
     *
     * @var bool
     */
    private $demo;

    /**
     * License
     *
     * @var array
     */
    private $license;

    /**
     * Menus
     *
     * @var string
     */
    private $menus_by_module;

    /**
     * Reports
     *
     * @var string
     */
    private $reports_by_module;

    /**
     * Views
     *
     * @var string
     */
    private $views_by_module;

    /**
     * Application
     *
     * @var bool
     */
    private $application;

    /**
     * Icon URL
     *
     * @var string
     */
    private $icon;

    /**
     * Icon
     *
     * @var int
     */
    private $icon_image;

    /**
     * Odoo Enterprise Module
     *
     * @var bool
     */
    private $to_buy;

    /**
     * Imported Module
     *
     * @var bool
     */
    private $imported;

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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param bool $auto_install
     */
    public function setAutoInstall(bool $auto_install): void
    {
        $this->auto_install = $auto_install;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @param bool $imported
     */
    public function setImported(bool $imported): void
    {
        $this->imported = $imported;
    }

    /**
     * @param bool $to_buy
     */
    public function setToBuy(bool $to_buy): void
    {
        $this->to_buy = $to_buy;
    }

    /**
     * @return int
     */
    public function getIconImage(): int
    {
        return $this->icon_image;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return bool
     */
    public function isApplication(): bool
    {
        return $this->application;
    }

    /**
     * @return string
     */
    public function getViewsByModule(): string
    {
        return $this->views_by_module;
    }

    /**
     * @return string
     */
    public function getReportsByModule(): string
    {
        return $this->reports_by_module;
    }

    /**
     * @return string
     */
    public function getMenusByModule(): string
    {
        return $this->menus_by_module;
    }

    /**
     * @return array
     */
    public function getLicense(): array
    {
        return $this->license;
    }

    /**
     * @return bool
     */
    public function isDemo(): bool
    {
        return $this->demo;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return Exclusion
     */
    public function getExclusionIds(): Exclusion
    {
        return $this->exclusion_ids;
    }

    /**
     * @return Category
     */
    public function getCategoryId(): Category
    {
        return $this->category_id;
    }

    /**
     * @return Dependency
     */
    public function getDependenciesId(): Dependency
    {
        return $this->dependencies_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getPublishedVersion(): string
    {
        return $this->published_version;
    }

    /**
     * @return string
     */
    public function getLatestVersion(): string
    {
        return $this->latest_version;
    }

    /**
     * @return string
     */
    public function getInstalledVersion(): string
    {
        return $this->installed_version;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getContributors(): string
    {
        return $this->contributors;
    }

    /**
     * @return string
     */
    public function getMaintainer(): string
    {
        return $this->maintainer;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getDescriptionHtml(): string
    {
        return $this->description_html;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return string
     */
    public function getShortdesc(): string
    {
        return $this->shortdesc;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
