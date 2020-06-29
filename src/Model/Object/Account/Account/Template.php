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
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Account Currency
     * Forces all moves for this account to have this secondary currency.
     *
     * @var null|Currency
     */
    private $currency_id;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * Type
     * These types are defined according to your country. The type contains more information about the account and
     * its specificities.
     *
     * @var Type
     */
    private $user_type_id;

    /**
     * Allow Invoices & payments Matching
     * Check this option if you want the user to reconcile entries in this account.
     *
     * @var null|bool
     */
    private $reconcile;

    /**
     * Note
     *
     * @var null|string
     */
    private $note;

    /**
     * Default Taxes
     *
     * @var null|TemplateAlias[]
     */
    private $tax_ids;

    /**
     * Optional Create
     * If checked, the new chart of accounts will not contain this by default.
     *
     * @var null|bool
     */
    private $nocreate;

    /**
     * Chart Template
     * This optional field allow you to link an account template to a specific chart template that may differ from
     * the one its root parent belongs to. This allow you to define chart templates that extend another and complete
     * it with few new accounts (You don't need to define the whole structure that is common to both several times).
     *
     * @var null|TemplateAliasAlias
     */
    private $chart_template_id;

    /**
     * Account tag
     * Optional tags you may want to assign for custom reporting
     *
     * @var null|Tag[]
     */
    private $tag_ids;

    /**
     * Group
     *
     * @var null|Group
     */
    private $group_id;

    /**
     * Root
     *
     * @var null|Root
     */
    private $root_id;

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
     * @param string $name Name
     * @param string $code Code
     * @param Type $user_type_id Type
     *        These types are defined according to your country. The type contains more information about the account and
     *        its specificities.
     */
    public function __construct(string $name, string $code, Type $user_type_id)
    {
        $this->name = $name;
        $this->code = $code;
        $this->user_type_id = $user_type_id;
    }

    /**
     * @param null|TemplateAliasAlias $chart_template_id
     */
    public function setChartTemplateId(?TemplateAliasAlias $chart_template_id): void
    {
        $this->chart_template_id = $chart_template_id;
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
     * @param null|Root $root_id
     */
    public function setRootId(?Root $root_id): void
    {
        $this->root_id = $root_id;
    }

    /**
     * @param null|Group $group_id
     */
    public function setGroupId(?Group $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param Tag $item
     */
    public function removeTagIds(Tag $item): void
    {
        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        if ($this->hasTagIds($item)) {
            $index = array_search($item, $this->tag_ids);
            unset($this->tag_ids[$index]);
        }
    }

    /**
     * @param Tag $item
     */
    public function addTagIds(Tag $item): void
    {
        if ($this->hasTagIds($item)) {
            return;
        }

        if (null === $this->tag_ids) {
            $this->tag_ids = [];
        }

        $this->tag_ids[] = $item;
    }

    /**
     * @param Tag $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTagIds(Tag $item, bool $strict = true): bool
    {
        if (null === $this->tag_ids) {
            return false;
        }

        return in_array($item, $this->tag_ids, $strict);
    }

    /**
     * @param null|Tag[] $tag_ids
     */
    public function setTagIds(?array $tag_ids): void
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @param null|bool $nocreate
     */
    public function setNocreate(?bool $nocreate): void
    {
        $this->nocreate = $nocreate;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param TemplateAlias $item
     */
    public function removeTaxIds(TemplateAlias $item): void
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
     * @param TemplateAlias $item
     */
    public function addTaxIds(TemplateAlias $item): void
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
     * @param TemplateAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasTaxIds(TemplateAlias $item, bool $strict = true): bool
    {
        if (null === $this->tax_ids) {
            return false;
        }

        return in_array($item, $this->tax_ids, $strict);
    }

    /**
     * @param null|TemplateAlias[] $tax_ids
     */
    public function setTaxIds(?array $tax_ids): void
    {
        $this->tax_ids = $tax_ids;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param null|bool $reconcile
     */
    public function setReconcile(?bool $reconcile): void
    {
        $this->reconcile = $reconcile;
    }

    /**
     * @param Type $user_type_id
     */
    public function setUserTypeId(Type $user_type_id): void
    {
        $this->user_type_id = $user_type_id;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param null|Currency $currency_id
     */
    public function setCurrencyId(?Currency $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
