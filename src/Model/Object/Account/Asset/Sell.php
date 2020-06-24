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
 *
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
     * @var null|Asset
     */
    private $asset_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Action
     *
     * @var null|array
     */
    private $action;

    /**
     * Customer Invoice
     *
     * @var Move
     */
    private $invoice_id;

    /**
     * Invoice Line
     *
     * @var Line
     */
    private $invoice_line_id;

    /**
     * Select Invoice Line
     *
     * @var bool
     */
    private $select_invoice_line_id;

    /**
     * Gain Account
     *
     * @var Account
     */
    private $gain_account_id;

    /**
     * Loss Account
     *
     * @var Account
     */
    private $loss_account_id;

    /**
     * Gain Or Loss
     *
     * @var array
     */
    private $gain_or_loss;

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
     * @param null|Asset $asset_id
     */
    public function setAssetId(Asset $asset_id): void
    {
        $this->asset_id = $asset_id;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param null|array $action
     */
    public function setAction(?array $action): void
    {
        $this->action = $action;
    }

    /**
     * @param ?array $action
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAction(?array $action, bool $strict = true): bool
    {
        if (null === $this->action) {
            return false;
        }

        return in_array($action, $this->action, $strict);
    }

    /**
     * @param ?array $action
     */
    public function addAction(?array $action): void
    {
        if ($this->hasAction($action)) {
            return;
        }

        if (null === $this->action) {
            $this->action = [];
        }

        $this->action[] = $action;
    }

    /**
     * @param ?array $action
     */
    public function removeAction(?array $action): void
    {
        if ($this->hasAction($action)) {
            $index = array_search($action, $this->action);
            unset($this->action[$index]);
        }
    }

    /**
     * @param Move $invoice_id
     */
    public function setInvoiceId(Move $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @param Line $invoice_line_id
     */
    public function setInvoiceLineId(Line $invoice_line_id): void
    {
        $this->invoice_line_id = $invoice_line_id;
    }

    /**
     * @return bool
     */
    public function isSelectInvoiceLineId(): bool
    {
        return $this->select_invoice_line_id;
    }

    /**
     * @param Account $gain_account_id
     */
    public function setGainAccountId(Account $gain_account_id): void
    {
        $this->gain_account_id = $gain_account_id;
    }

    /**
     * @param Account $loss_account_id
     */
    public function setLossAccountId(Account $loss_account_id): void
    {
        $this->loss_account_id = $loss_account_id;
    }

    /**
     * @return array
     */
    public function getGainOrLoss(): array
    {
        return $this->gain_or_loss;
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
