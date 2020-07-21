<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Asset;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.asset.sell
 * Name : account.asset.sell
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Sell extends Base
{
    /**
     * Asset
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $asset_id;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Action
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> sell (Sell)
     *     -> dispose (Dispose)
     *
     *
     * @var string
     */
    private $action;

    /**
     * Customer Invoice
     * The disposal invoice is needed in order to generate the closing journal entry.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_id;

    /**
     * Invoice Line
     * There are multiple lines that could be the related to this asset
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_line_id;

    /**
     * Select Invoice Line
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $select_invoice_line_id;

    /**
     * Gain Account
     * Account used to write the journal item in case of gain
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $gain_account_id;

    /**
     * Loss Account
     * Account used to write the journal item in case of loss
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $loss_account_id;

    /**
     * Gain Or Loss
     * Technical field to know is there was a gain or a loss in the selling of the asset
     * Searchable : no
     * Sortable : no
     * Selection : (default value, usually null)
     *     -> gain (Gain)
     *     -> loss (Loss)
     *     -> no (No)
     *
     *
     * @var string|null
     */
    private $gain_or_loss;

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
     * @param OdooRelation $asset_id Asset
     *        Searchable : yes
     *        Sortable : yes
     * @param string $action Action
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> sell (Sell)
     *            -> dispose (Dispose)
     *       
     */
    public function __construct(OdooRelation $asset_id, string $action)
    {
        $this->asset_id = $asset_id;
        $this->action = $action;
    }

    /**
     * @return OdooRelation|null
     */
    public function getLossAccountId(): ?OdooRelation
    {
        return $this->loss_account_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param string|null $gain_or_loss
     */
    public function setGainOrLoss(?string $gain_or_loss): void
    {
        $this->gain_or_loss = $gain_or_loss;
    }

    /**
     * @return string|null
     */
    public function getGainOrLoss(): ?string
    {
        return $this->gain_or_loss;
    }

    /**
     * @param OdooRelation|null $loss_account_id
     */
    public function setLossAccountId(?OdooRelation $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @param OdooRelation|null $gain_account_id
     */
    public function setGainAccountId(?OdooRelation $gain_account_id): void
    {
        $this->gain_account_id = $gain_account_id;
    }

    /**
     * @return OdooRelation
     */
    public function getAssetId(): OdooRelation
    {
        return $this->asset_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getGainAccountId(): ?OdooRelation
    {
        return $this->gain_account_id;
    }

    /**
     * @param bool|null $select_invoice_line_id
     */
    public function setSelectInvoiceLineId(?bool $select_invoice_line_id): void
    {
        $this->select_invoice_line_id = $select_invoice_line_id;
    }

    /**
     * @return bool|null
     */
    public function isSelectInvoiceLineId(): ?bool
    {
        return $this->select_invoice_line_id;
    }

    /**
     * @param OdooRelation|null $invoice_line_id
     */
    public function setInvoiceLineId(?OdooRelation $invoice_line_id): void
    {
        $this->invoice_line_id = $invoice_line_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceLineId(): ?OdooRelation
    {
        return $this->invoice_line_id;
    }

    /**
     * @param OdooRelation|null $invoice_id
     */
    public function setInvoiceId(?OdooRelation $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getInvoiceId(): ?OdooRelation
    {
        return $this->invoice_id;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $asset_id
     */
    public function setAssetId(OdooRelation $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.asset.sell';
    }
}
