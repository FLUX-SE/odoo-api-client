<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.fiscal.position.template
 * Name : account.fiscal.position.template
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
final class Template extends Base
{
    /**
     * Sequence
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Fiscal Position Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Chart Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $chart_template_id;

    /**
     * Account Mapping
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $account_ids;

    /**
     * Tax Mapping
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $tax_ids;

    /**
     * Notes
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $note;

    /**
     * Detect Automatically
     * Apply automatically this fiscal position.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $auto_apply;

    /**
     * VAT required
     * Apply only if partner has a VAT number.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $vat_required;

    /**
     * Country
     * Apply only if delivery or invoicing country match.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Country Group
     * Apply only if delivery or invoicing country match the group.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_group_id;

    /**
     * Federal States
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $state_ids;

    /**
     * Zip Range From
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $zip_from;

    /**
     * Zip Range To
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $zip_to;

    /**
     * Use TaxCloud API
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_taxcloud;

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
     * @param string $name Fiscal Position Template
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $chart_template_id Chart Template
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, OdooRelation $chart_template_id)
    {
        $this->name = $name;
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param string|null $zip_to
     */
    public function setZipTo(?string $zip_to): void
    {
        $this->zip_to = $zip_to;
    }

    /**
     * @param OdooRelation|null $country_group_id
     */
    public function setCountryGroupId(?OdooRelation $country_group_id): void
    {
        $this->country_group_id = $country_group_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getStateIds(): ?array
    {
        return $this->state_ids;
    }

    /**
     * @param OdooRelation[]|null $state_ids
     */
    public function setStateIds(?array $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasStateIds(OdooRelation $item): bool
    {
        if (null === $this->state_ids) {
            return false;
        }

        return in_array($item, $this->state_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addStateIds(OdooRelation $item): void
    {
        if ($this->hasStateIds($item)) {
            return;
        }

        if (null === $this->state_ids) {
            $this->state_ids = [];
        }

        $this->state_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeStateIds(OdooRelation $item): void
    {
        if (null === $this->state_ids) {
            $this->state_ids = [];
        }

        if ($this->hasStateIds($item)) {
            $index = array_search($item, $this->state_ids);
            unset($this->state_ids[$index]);
        }
    }

    /**
     * @return string|null
     */
    public function getZipFrom(): ?string
    {
        return $this->zip_from;
    }

    /**
     * @param string|null $zip_from
     */
    public function setZipFrom(?string $zip_from): void
    {
        $this->zip_from = $zip_from;
    }

    /**
     * @return string|null
     */
    public function getZipTo(): ?string
    {
        return $this->zip_to;
    }

    /**
     * @return bool|null
     */
    public function isIsTaxcloud(): ?bool
    {
        return $this->is_taxcloud;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param bool|null $is_taxcloud
     */
    public function setIsTaxcloud(?bool $is_taxcloud): void
    {
        $this->is_taxcloud = $is_taxcloud;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryGroupId(): ?OdooRelation
    {
        return $this->country_group_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAccountIds(OdooRelation $item): void
    {
        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        if ($this->hasAccountIds($item)) {
            $index = array_search($item, $this->account_ids);
            unset($this->account_ids[$index]);
        }
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation
     */
    public function getChartTemplateId(): OdooRelation
    {
        return $this->chart_template_id;
    }

    /**
     * @param OdooRelation $chart_template_id
     */
    public function setChartTemplateId(OdooRelation $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAccountIds(): ?array
    {
        return $this->account_ids;
    }

    /**
     * @param OdooRelation[]|null $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccountIds(OdooRelation $item): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccountIds(OdooRelation $item): void
    {
        if ($this->hasAccountIds($item)) {
            return;
        }

        if (null === $this->account_ids) {
            $this->account_ids = [];
        }

        $this->account_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getTaxIds(): ?array
    {
        return $this->tax_ids;
    }

    /**
     * @param bool|null $vat_required
     */
    public function setVatRequired(?bool $vat_required): void
    {
        $this->vat_required = $vat_required;
    }

    /**
     * @param OdooRelation[]|null $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTaxIds(OdooRelation $item): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addTaxIds(OdooRelation $item): void
    {
        if ($this->hasTaxIds($item)) {
            return;
        }

        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        $this->tax_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTaxIds(OdooRelation $item): void
    {
        if (null === $this->tax_ids) {
            $this->tax_ids = [];
        }

        if ($this->hasTaxIds($item)) {
            $index = array_search($item, $this->tax_ids);
            unset($this->tax_ids[$index]);
        }
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return bool|null
     */
    public function isAutoApply(): ?bool
    {
        return $this->auto_apply;
    }

    /**
     * @param bool|null $auto_apply
     */
    public function setAutoApply(?bool $auto_apply): void
    {
        $this->auto_apply = $auto_apply;
    }

    /**
     * @return bool|null
     */
    public function isVatRequired(): ?bool
    {
        return $this->vat_required;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.fiscal.position.template';
    }
}
