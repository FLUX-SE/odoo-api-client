<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\All\Channels;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : report.all.channels.sales
 * Name : report.all.channels.sales
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
final class Sales extends Base
{
    public const ODOO_MODEL_NAME = 'report.all.channels.sales';

    /**
     * Order Reference
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Partner
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Product
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_id;

    /**
     * Product Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $product_tmpl_id;

    /**
     * Date Order
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date_order;

    /**
     * Salesperson
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Product Category
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $categ_id;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Total
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_total;

    /**
     * Pricelist
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $pricelist_id;

    /**
     * Partner Country
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $country_id;

    /**
     * Price Subtotal
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $price_subtotal;

    /**
     * Product Quantity
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $product_qty;

    /**
     * Analytic Account
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $analytic_account_id;

    /**
     * Sales Team
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $team_id;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return float|null
     */
    public function getPriceTotal(): ?float
    {
        return $this->price_total;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation|null $analytic_account_id
     */
    public function setAnalyticAccountId(?OdooRelation $analytic_account_id): void
    {
        $this->analytic_account_id = $analytic_account_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAnalyticAccountId(): ?OdooRelation
    {
        return $this->analytic_account_id;
    }

    /**
     * @param float|null $product_qty
     */
    public function setProductQty(?float $product_qty): void
    {
        $this->product_qty = $product_qty;
    }

    /**
     * @return float|null
     */
    public function getProductQty(): ?float
    {
        return $this->product_qty;
    }

    /**
     * @param float|null $price_subtotal
     */
    public function setPriceSubtotal(?float $price_subtotal): void
    {
        $this->price_subtotal = $price_subtotal;
    }

    /**
     * @return float|null
     */
    public function getPriceSubtotal(): ?float
    {
        return $this->price_subtotal;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $pricelist_id
     */
    public function setPricelistId(?OdooRelation $pricelist_id): void
    {
        $this->pricelist_id = $pricelist_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPricelistId(): ?OdooRelation
    {
        return $this->pricelist_id;
    }

    /**
     * @param float|null $price_total
     */
    public function setPriceTotal(?float $price_total): void
    {
        $this->price_total = $price_total;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $categ_id
     */
    public function setCategId(?OdooRelation $categ_id): void
    {
        $this->categ_id = $categ_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCategId(): ?OdooRelation
    {
        return $this->categ_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param DateTimeInterface|null $date_order
     */
    public function setDateOrder(?DateTimeInterface $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateOrder(): ?DateTimeInterface
    {
        return $this->date_order;
    }

    /**
     * @param OdooRelation|null $product_tmpl_id
     */
    public function setProductTmplId(?OdooRelation $product_tmpl_id): void
    {
        $this->product_tmpl_id = $product_tmpl_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductTmplId(): ?OdooRelation
    {
        return $this->product_tmpl_id;
    }

    /**
     * @param OdooRelation|null $product_id
     */
    public function setProductId(?OdooRelation $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getProductId(): ?OdooRelation
    {
        return $this->product_id;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }
}
