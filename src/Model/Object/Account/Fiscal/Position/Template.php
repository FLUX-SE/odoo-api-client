<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal\Position;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Account\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Tax\Template as Template2;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Country\Group;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position.template
 * Name : account.fiscal.position.template
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
final class Template extends Base
{
    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Fiscal Position Template
     *
     * @var string
     */
    private $name;

    /**
     * Chart Template
     *
     * @var TemplateAlias
     */
    private $chart_template_id;

    /**
     * Account Mapping
     *
     * @var null|TemplateAliasAlias[]
     */
    private $account_ids;

    /**
     * Tax Mapping
     *
     * @var null|Template2[]
     */
    private $tax_ids;

    /**
     * Notes
     *
     * @var null|string
     */
    private $note;

    /**
     * Detect Automatically
     * Apply automatically this fiscal position.
     *
     * @var null|bool
     */
    private $auto_apply;

    /**
     * VAT required
     * Apply only if partner has a VAT number.
     *
     * @var null|bool
     */
    private $vat_required;

    /**
     * Country
     * Apply only if delivery or invoicing country match.
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Country Group
     * Apply only if delivery or invoicing country match the group.
     *
     * @var null|Group
     */
    private $country_group_id;

    /**
     * Federal States
     *
     * @var null|State[]
     */
    private $state_ids;

    /**
     * Zip Range From
     *
     * @var null|string
     */
    private $zip_from;

    /**
     * Zip Range To
     *
     * @var null|string
     */
    private $zip_to;

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
     * @param string $name Fiscal Position Template
     * @param TemplateAlias $chart_template_id Chart Template
     */
    public function __construct(string $name, TemplateAlias $chart_template_id)
    {
        $this->name = $name;
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param null|bool $vat_required
     */
    public function setVatRequired(?bool $vat_required): void
    {
        $this->vat_required = $vat_required;
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
     * @param null|string $zip_to
     */
    public function setZipTo(?string $zip_to): void
    {
        $this->zip_to = $zip_to;
    }

    /**
     * @param null|string $zip_from
     */
    public function setZipFrom(?string $zip_from): void
    {
        $this->zip_from = $zip_from;
    }

    /**
     * @param State $item
     */
    public function removeStateIds(State $item): void
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
     * @param State $item
     */
    public function addStateIds(State $item): void
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
     * @param State $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasStateIds(State $item, bool $strict = true): bool
    {
        if (null === $this->state_ids) {
            return false;
        }

        return in_array($item, $this->state_ids, $strict);
    }

    /**
     * @param null|State[] $state_ids
     */
    public function setStateIds(?array $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param null|Group $country_group_id
     */
    public function setCountryGroupId(?Group $country_group_id): void
    {
        $this->country_group_id = $country_group_id;
    }

    /**
     * @param null|Country $country_id
     */
    public function setCountryId(?Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|bool $auto_apply
     */
    public function setAutoApply(?bool $auto_apply): void
    {
        $this->auto_apply = $auto_apply;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Template2 $item
     */
    public function removeTaxIds(Template2 $item): void
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
     * @param Template2 $item
     */
    public function addTaxIds(Template2 $item): void
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
     * @param Template2 $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxIds(Template2 $item, bool $strict = true): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids, $strict);
    }

    /**
     * @param null|Template2[] $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param TemplateAliasAlias $item
     */
    public function removeAccountIds(TemplateAliasAlias $item): void
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
     * @param TemplateAliasAlias $item
     */
    public function addAccountIds(TemplateAliasAlias $item): void
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
     * @param TemplateAliasAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccountIds(TemplateAliasAlias $item, bool $strict = true): bool
    {
        if (null === $this->account_ids) {
            return false;
        }

        return in_array($item, $this->account_ids, $strict);
    }

    /**
     * @param null|TemplateAliasAlias[] $account_ids
     */
    public function setAccountIds(?array $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param TemplateAlias $chart_template_id
     */
    public function setChartTemplateId(TemplateAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
