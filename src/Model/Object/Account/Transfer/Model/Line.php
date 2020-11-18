<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Transfer\Model;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.transfer.model.line
 * ---
 * Name : account.transfer.model.line
 * ---
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
final class Line extends Base
{
    /**
     * Transfer Model
     * ---
     * Relation : many2one (account.transfer.model)
     * @see \Flux\OdooApiClient\Model\Object\Account\Transfer\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $transfer_model_id;

    /**
     * Destination Account
     * ---
     * Relation : many2one (account.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_id;

    /**
     * Percent
     * ---
     * Percentage of the sum of lines from the origin accounts will be transferred to the destination account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $percent;

    /**
     * Analytic Filter
     * ---
     * The sum of all lines from the origin accounts having this analytic account will be automatically transferred
     * to the destination account
     * ---
     * Relation : many2many (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $analytic_account_ids;

    /**
     * Percent Is Readonly
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $percent_is_readonly;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @param OdooRelation $transfer_model_id Transfer Model
     *        ---
     *        Relation : many2one (account.transfer.model)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Transfer\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $account_id Destination Account
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $percent Percent
     *        ---
     *        Percentage of the sum of lines from the origin accounts will be transferred to the destination account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $transfer_model_id, OdooRelation $account_id, float $percent)
    {
        $this->transfer_model_id = $transfer_model_id;
        $this->account_id = $account_id;
        $this->percent = $percent;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("percent_is_readonly")
     */
    public function isPercentIsReadonly(): ?bool
    {
        return $this->percent_is_readonly;
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
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param bool|null $percent_is_readonly
     */
    public function setPercentIsReadonly(?bool $percent_is_readonly): void
    {
        $this->percent_is_readonly = $percent_is_readonly;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAnalyticAccountIds(OdooRelation $item): void
    {
        if (null === $this->analytic_account_ids) {
            $this->analytic_account_ids = [];
        }

        if ($this->hasAnalyticAccountIds($item)) {
            $index = array_search($item, $this->analytic_account_ids);
            unset($this->analytic_account_ids[$index]);
        }
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("transfer_model_id")
     */
    public function getTransferModelId(): OdooRelation
    {
        return $this->transfer_model_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAnalyticAccountIds(OdooRelation $item): void
    {
        if ($this->hasAnalyticAccountIds($item)) {
            return;
        }

        if (null === $this->analytic_account_ids) {
            $this->analytic_account_ids = [];
        }

        $this->analytic_account_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAnalyticAccountIds(OdooRelation $item): bool
    {
        if (null === $this->analytic_account_ids) {
            return false;
        }

        return in_array($item, $this->analytic_account_ids);
    }

    /**
     * @param OdooRelation[]|null $analytic_account_ids
     */
    public function setAnalyticAccountIds(?array $analytic_account_ids): void
    {
        $this->analytic_account_ids = $analytic_account_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("analytic_account_ids")
     */
    public function getAnalyticAccountIds(): ?array
    {
        return $this->analytic_account_ids;
    }

    /**
     * @param float $percent
     */
    public function setPercent(float $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @return float
     *
     * @SerializedName("percent")
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

    /**
     * @param OdooRelation $account_id
     */
    public function setAccountId(OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("account_id")
     */
    public function getAccountId(): OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation $transfer_model_id
     */
    public function setTransferModelId(OdooRelation $transfer_model_id): void
    {
        $this->transfer_model_id = $transfer_model_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.transfer.model.line';
    }
}
