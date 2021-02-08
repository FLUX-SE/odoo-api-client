<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Config;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.config.installer
 * ---
 * Name : res.config.installer
 * ---
 * Info :
 * New-style configuration base specialized for addons selection
 *         and installation.
 *
 *         Basic usage
 *         -----------
 *
 *         Subclasses can simply define a number of boolean fields. The field names
 *         should be the names of the addons to install (when selected). Upon action
 *         execution, selected boolean fields (and those only) will be interpreted as
 *         addons to install, and batch-installed.
 *
 *         Additional addons
 *         -----------------
 *
 *         It is also possible to require the installation of an additional
 *         addon set when a specific preset of addons has been marked for
 *         installation (in the basic usage only, additionals can't depend on
 *         one another).
 *
 *         These additionals are defined through the ``_install_if``
 *         property. This property is a mapping of a collection of addons (by
 *         name) to a collection of addons (by name) [#]_, and if all the *key*
 *         addons are selected for installation, then the *value* ones will
 *         be selected as well. For example::
 *
 *                 _install_if = {
 *                         ('sale','crm'): ['sale_crm'],
 *                 }
 *
 *         This will install the ``sale_crm`` addon if and only if both the
 *         ``sale`` and ``crm`` addons are selected for installation.
 *
 *         You can define as many additionals as you wish, and additionals
 *         can overlap in key and value. For instance::
 *
 *                 _install_if = {
 *                         ('sale','crm'): ['sale_crm'],
 *                         ('sale','project'): ['sale_service'],
 *                 }
 *
 *         will install both ``sale_crm`` and ``sale_service`` if all of
 *         ``sale``, ``crm`` and ``project`` are selected for installation.
 *
 *         Hook methods
 *         ------------
 *
 *         Subclasses might also need to express dependencies more complex
 *         than that provided by additionals. In this case, it's possible to
 *         define methods of the form ``_if_%(name)s`` where ``name`` is the
 *         name of a boolean field. If the field is selected, then the
 *         corresponding module will be marked for installation *and* the
 *         hook method will be executed.
 *
 *         Hook methods take the usual set of parameters (cr, uid, ids,
 *         context) and can return a collection of additional addons to
 *         install (if they return anything, otherwise they should not return
 *         anything, though returning any "falsy" value such as None or an
 *         empty collection will have the same effect).
 *
 *         Complete control
 *         ----------------
 *
 *         The last hook is to simply overload the ``modules_to_install``
 *         method, which implements all the mechanisms above. This method
 *         takes the usual set of parameters (cr, uid, ids, context) and
 *         returns a ``set`` of addons to install (addons selected by the
 *         above methods minus addons from the *basic* set which are already
 *         installed) [#]_ so an overloader can simply manipulate the ``set``
 *         returned by ``ResConfigInstaller.modules_to_install`` to add or
 *         remove addons.
 *
 *         Skipping the installer
 *         ----------------------
 *
 *         Unless it is removed from the view, installers have a *skip*
 *         button which invokes ``action_skip`` (and the ``cancel`` hook from
 *         ``res.config``). Hooks and additionals *are not run* when skipping
 *         installation, even for already installed addons.
 *
 *         Again, setup your hooks accordingly.
 *
 *         .. [#] note that since a mapping key needs to be hashable, it's
 *                       possible to use a tuple or a frozenset, but not a list or a
 *                       regular set
 *
 *         .. [#] because the already-installed modules are only pruned at
 *                       the very end of ``modules_to_install``, additionals and
 *                       hooks depending on them *are guaranteed to execute*. Setup
 *                       your hooks accordingly.
 */
final class Installer extends Base
{
    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("write_date")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.config.installer';
    }
}
