<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account;

use Flux\OdooApiClient\Model\Object\Account\Root as RootAlias;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;

/**
 * Odoo model : account.root
 * Name : account.root
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
final class Root extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Parent
     *
     * @var RootAlias
     */
    private $parent_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return RootAlias
     */
    public function getParentId(): RootAlias
    {
        return $this->parent_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }
}
