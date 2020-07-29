<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.analytic.tag
 * ---
 * Name : account.analytic.tag
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
final class Tag extends Base
{
    /**
     * Analytic Tag
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Active
     * ---
     * Set active to false to hide the Analytic Tag without removing it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Analytic Distribution
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active_analytic_distribution;

    /**
     * Analytic Accounts
     * ---
     * Relation : one2many (account.analytic.distribution -> tag_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Distribution
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_distribution_ids;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

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
     * @param string $name Analytic Tag
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticDistributionIds(OdooRelation $item): void
    {
        if (null === $this->analytic_distribution_ids) {
            $this->analytic_distribution_ids = [];
        }

        if ($this->hasAnalyticDistributionIds($item)) {
            $index = array_search($item, $this->analytic_distribution_ids);
            unset($this->analytic_distribution_ids[$index]);
        }
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
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticDistributionIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticDistributionIds($item)) {
            return;
        }

        if (null === $this->analytic_distribution_ids) {
            $this->analytic_distribution_ids = [];
        }

        $this->analytic_distribution_ids[] = $item;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticDistributionIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_distribution_ids) {
            return false;
        }

        return in_array($item, $this->analytic_distribution_ids);
    }

    /**
     * @param OdooRelation[]|null $analytic_distribution_ids
     */
    public function setAnalyticDistributionIds(?array $analytic_distribution_ids): void
    {
        $this->analytic_distribution_ids = $analytic_distribution_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_distribution_ids")
     */
    public function getAnalyticDistributionIds(): ?array
    {
        return $this->analytic_distribution_ids;
    }

    /**
     * @param bool|null $active_analytic_distribution
     */
    public function setActiveAnalyticDistribution(?bool $active_analytic_distribution): void
    {
        $this->active_analytic_distribution = $active_analytic_distribution;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active_analytic_distribution")
     */
    public function isActiveAnalyticDistribution(): ?bool
    {
        return $this->active_analytic_distribution;
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
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
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
        return 'account.analytic.tag';
    }
}
