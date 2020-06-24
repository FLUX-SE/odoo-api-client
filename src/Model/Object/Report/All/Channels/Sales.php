<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\All\Channels;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Analytic\Account;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Crm\Team;
use Flux\OdooApiClient\Model\Object\Product\Category;
use Flux\OdooApiClient\Model\Object\Product\Pricelist;
use Flux\OdooApiClient\Model\Object\Product\Product;
use Flux\OdooApiClient\Model\Object\Product\Template;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Country;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : report.all.channels.sales
 * Name : report.all.channels.sales
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
final class Sales extends Base
{
    /**
     * Order Reference
     *
     * @var string
     */
    private $name;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Product
     *
     * @var Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var Template
     */
    private $product_tmpl_id;

    /**
     * Date Order
     *
     * @var DateTimeInterface
     */
    private $date_order;

    /**
     * Salesperson
     *
     * @var Users
     */
    private $user_id;

    /**
     * Product Category
     *
     * @var Category
     */
    private $categ_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Total
     *
     * @var float
     */
    private $price_total;

    /**
     * Pricelist
     *
     * @var Pricelist
     */
    private $pricelist_id;

    /**
     * Partner Country
     *
     * @var Country
     */
    private $country_id;

    /**
     * Price Subtotal
     *
     * @var float
     */
    private $price_subtotal;

    /**
     * Product Quantity
     *
     * @var float
     */
    private $product_qty;

    /**
     * Analytic Account
     *
     * @var Account
     */
    private $analytic_account_id;

    /**
     * Sales Team
     *
     * @var Team
     */
    private $team_id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @return Product
     */
    public function getProductId(): Product
    {
        return $this->product_id;
    }

    /**
     * @return Template
     */
    public function getProductTmplId(): Template
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateOrder(): DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @return Users
     */
    public function getUserId(): Users
    {
        return $this->user_id;
    }

    /**
     * @return Category
     */
    public function getCategId(): Category
    {
        return $this->categ_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return float
     */
    public function getPriceTotal(): float
    {
        return $this->price_total;
    }

    /**
     * @return Pricelist
     */
    public function getPricelistId(): Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return Country
     */
    public function getCountryId(): Country
    {
        return $this->country_id;
    }

    /**
     * @return float
     */
    public function getPriceSubtotal(): float
    {
        return $this->price_subtotal;
    }

    /**
     * @return float
     */
    public function getProductQty(): float
    {
        return $this->product_qty;
    }

    /**
     * @return Account
     */
    public function getAnalyticAccountId(): Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return Team
     */
    public function getTeamId(): Team
    {
        return $this->team_id;
    }
}
