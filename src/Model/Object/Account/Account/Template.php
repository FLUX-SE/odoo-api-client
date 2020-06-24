<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Account;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Chart\Template as TemplateAliasAlias;
use Flux\OdooApiClient\Model\Object\Account\Group;
use Flux\OdooApiClient\Model\Object\Account\Root;
use Flux\OdooApiClient\Model\Object\Account\Tax\Template as TemplateAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Currency;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.account.template
 * Name : account.account.template
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
final class Template extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Account Currency
     *
     * @var Currency
     */
    private $currency_id;

    /**
     * Code
     *
     * @var null|string
     */
    private $code;

    /**
     * Type
     *
     * @var null|Type
     */
    private $user_type_id;

    /**
     * Allow Invoices & payments Matching
     *
     * @var bool
     */
    private $reconcile;

    /**
     * Note
     *
     * @var string
     */
    private $note;

    /**
     * Default Taxes
     *
     * @var TemplateAlias
     */
    private $tax_ids;

    /**
     * Optional Create
     *
     * @var bool
     */
    private $nocreate;

    /**
     * Chart Template
     *
     * @var TemplateAliasAlias
     */
    private $chart_template_id;

    /**
     * Account tag
     *
     * @var Tag
     */
    private $tag_ids;

    /**
     * Group
     *
     * @var Group
     */
    private $group_id;

    /**
     * Root
     *
     * @var Root
     */
    private $root_id;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Currency $currency_id
     */
    public function setCurrencyId(Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|Type $user_type_id
     */
    public function setUserTypeId(Type $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @param bool $reconcile
     */
    public function setReconcile(bool $reconcile): void
    {
        $this->reconcile = $reconcile;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param TemplateAlias $tax_ids
     */
    public function setTaxIds(TemplateAlias $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param bool $nocreate
     */
    public function setNocreate(bool $nocreate): void
    {
        $this->nocreate = $nocreate;
    }

    /**
     * @param TemplateAliasAlias $chart_template_id
     */
    public function setChartTemplateId(TemplateAliasAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
    }

    /**
     * @param Tag $tag_ids
     */
    public function setTagIds(Tag $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param Group $group_id
     */
    public function setGroupId(Group $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param Root $root_id
     */
    public function setRootId(Root $root_id): void
    {
        $this->root_id = $root_id;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}
