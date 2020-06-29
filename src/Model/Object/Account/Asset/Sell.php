<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Asset;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Account;
use Flux\OdooApiClient\Model\Object\Account\Asset;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Account\Move\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.asset.sell
 * Name : account.asset.sell
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Sell extends Base
{
    /**
     * Asset
     *
     * @var Asset
     */
    private $asset_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Action
     *
     * @var array
     */
    private $action;

    /**
     * Customer Invoice
     * The disposal invoice is needed in order to generate the closing journal entry.
     *
     * @var null|Move
     */
    private $invoice_id;

    /**
     * Invoice Line
     * There are multiple lines that could be the related to this asset
     *
     * @var null|Line
     */
    private $invoice_line_id;

    /**
     * Select Invoice Line
     *
     * @var null|bool
     */
    private $select_invoice_line_id;

    /**
     * Gain Account
     * Account used to write the journal item in case of gain
     *
     * @var null|Account
     */
    private $gain_account_id;

    /**
     * Loss Account
     * Account used to write the journal item in case of loss
     *
     * @var null|Account
     */
    private $loss_account_id;

    /**
     * Gain Or Loss
     * Technical field to know is there was a gain or a loss in the selling of the asset
     *
     * @var null|array
     */
    private $gain_or_loss;

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
     * @param Asset $asset_id Asset
     * @param array $action Action
     */
    public function __construct(Asset $asset_id, array $action)
    {
        $this->asset_id = $asset_id;
        $this->action = $action;
    }

    /**
     * @return null|bool
     */
    public function isSelectInvoiceLineId(): ?bool
    {
        return $this->select_invoice_line_id;
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
     * @return null|array
     */
    public function getGainOrLoss(): ?array
    {
        return $this->gain_or_loss;
    }

    /**
     * @param null|Account $loss_account_id
     */
    public function setLossAccountId(?Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @param null|Account $gain_account_id
     */
    public function setGainAccountId(?Account $gain_account_id): void
    {
        $this->gain_account_id = $gain_account_id;
    }

    /**
     * @param null|Line $invoice_line_id
     */
    public function setInvoiceLineId(?Line $invoice_line_id): void
    {
        $this->invoice_line_id = $invoice_line_id;
    }

    /**
     * @param Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @param null|Move $invoice_id
     */
    public function setInvoiceId(?Move $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @param mixed $item
     */
    public function removeAction($item): void
    {
        if ($this->hasAction($item)) {
            $index = array_search($item, $this->action);
            unset($this->action[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAction($item): void
    {
        if ($this->hasAction($item)) {
            return;
        }

        $this->action[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAction($item, bool $strict = true): bool
    {
        return in_array($item, $this->action, $strict);
    }

    /**
     * @param array $action
     */
    public function setAction(array $action): void
    {
        $this->action = $action;
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}
