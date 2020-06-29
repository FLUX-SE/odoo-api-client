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
final class Sales extends Base
{
    /**
     * Order Reference
     *
     * @var null|string
     */
    private $name;

    /**
     * Partner
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Product
     *
     * @var null|Product
     */
    private $product_id;

    /**
     * Product Template
     *
     * @var null|Template
     */
    private $product_tmpl_id;

    /**
     * Date Order
     *
     * @var null|DateTimeInterface
     */
    private $date_order;

    /**
     * Salesperson
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * Product Category
     *
     * @var null|Category
     */
    private $categ_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Total
     *
     * @var null|float
     */
    private $price_total;

    /**
     * Pricelist
     *
     * @var null|Pricelist
     */
    private $pricelist_id;

    /**
     * Partner Country
     *
     * @var null|Country
     */
    private $country_id;

    /**
     * Price Subtotal
     *
     * @var null|float
     */
    private $price_subtotal;

    /**
     * Product Quantity
     *
     * @var null|float
     */
    private $product_qty;

    /**
     * Analytic Account
     *
     * @var null|Account
     */
    private $analytic_account_id;

    /**
     * Sales Team
     *
     * @var null|Team
     */
    private $team_id;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    /**
     * @return null|Product
     */
    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    /**
     * @return null|Template
     */
    public function getProductTmplId(): ?Template
    {
        return $this->product_tmpl_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @return null|Users
     */
    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    /**
     * @return null|Category
     */
    public function getCategId(): ?Category
    {
        return $this->categ_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|float
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return null|Pricelist
     */
    public function getPricelistId(): ?Pricelist
    {
        return $this->pricelist_id;
    }

    /**
     * @return null|Country
     */
    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    /**
     * @return null|float
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @return null|float
     */
    public function getProductQty(): ?float
    {
        return $this->product_qty;
    }

    /**
     * @return null|Account
     */
    public function getAnalyticAccountId(): ?Account
    {
        return $this->analytic_account_id;
    }

    /**
     * @return null|Team
     */
    public function getTeamId(): ?Team
    {
        return $this->team_id;
    }
}
