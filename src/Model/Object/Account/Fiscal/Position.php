<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Account;
use Flux\OdooApiClient\Model\Object\Account\Fiscal\Position\Tax;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Country\Group;
use Flux\OdooApiClient\Model\Object\Res\Country\State;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.position
 * Name : account.fiscal.position
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
final class Position extends Base
{
    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Fiscal Position
     *
     * @var null|string
     */
    private $name;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Account Mapping
     *
     * @var Account
     */
    private $account_ids;

    /**
     * Tax Mapping
     *
     * @var Tax
     */
    private $tax_ids;

    /**
     * Notes
     *
     * @var string
     */
    private $note;

    /**
     * Detect Automatically
     *
     * @var bool
     */
    private $auto_apply;

    /**
     * VAT required
     *
     * @var bool
     */
    private $vat_required;

    /**
     * Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Country Group
     *
     * @var Group
     */
    private $country_group_id;

    /**
     * Federal States
     *
     * @var State
     */
    private $state_ids;

    /**
     * Zip Range From
     *
     * @var string
     */
    private $zip_from;

    /**
     * Zip Range To
     *
     * @var string
     */
    private $zip_to;

    /**
     * States Count
     *
     * @var int
     */
    private $states_count;

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
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Group $country_group_id
     */
    public function setCountryGroupId(Group $country_group_id): void
    {
        $this->country_group_id = $country_group_id;
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
     * @return int
     */
    public function getStatesCount(): int
    {
        return $this->states_count;
    }

    /**
     * @param string $zip_to
     */
    public function setZipTo(string $zip_to): void
    {
        $this->zip_to = $zip_to;
    }

    /**
     * @param string $zip_from
     */
    public function setZipFrom(string $zip_from): void
    {
        $this->zip_from = $zip_from;
    }

    /**
     * @param State $state_ids
     */
    public function setStateIds(State $state_ids): void
    {
        $this->state_ids = $state_ids;
    }

    /**
     * @param Country $country_id
     */
    public function setCountryId(Country $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param bool $vat_required
     */
    public function setVatRequired(bool $vat_required): void
    {
        $this->vat_required = $vat_required;
    }

    /**
     * @param bool $auto_apply
     */
    public function setAutoApply(bool $auto_apply): void
    {
        $this->auto_apply = $auto_apply;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param Tax $tax_ids
     */
    public function setTaxIds(Tax $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param Account $account_ids
     */
    public function setAccountIds(Account $account_ids): void
    {
        $this->account_ids = $account_ids;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
