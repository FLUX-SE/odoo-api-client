<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Fiscal\Position;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.fiscal.position.account
 * ---
 * Name : account.fiscal.position.account
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
final class Account extends Base
{
    /**
     * Fiscal Position
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $position_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Account on Product
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_src_id;

    /**
     * Account to Use Instead
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_dest_id;

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
     * @param OdooRelation $position_id Fiscal Position
     *        ---
     *        Relation : many2one (account.fiscal.position)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Fiscal\Position
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $account_src_id Account on Product
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $account_dest_id Account to Use Instead
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $position_id,
        OdooRelation $account_src_id,
        OdooRelation $account_dest_id
    ) {
        $this->position_id = $position_id;
        $this->account_src_id = $account_src_id;
        $this->account_dest_id = $account_dest_id;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("position_id")
     */
    public function getPositionId(): OdooRelation
    {
        return $this->position_id;
    }

    /**
     * @param OdooRelation $account_dest_id
     */
    public function setAccountDestId(OdooRelation $account_dest_id): void
    {
        $this->account_dest_id = $account_dest_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("account_dest_id")
     */
    public function getAccountDestId(): OdooRelation
    {
        return $this->account_dest_id;
    }

    /**
     * @param OdooRelation $account_src_id
     */
    public function setAccountSrcId(OdooRelation $account_src_id): void
    {
        $this->account_src_id = $account_src_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("account_src_id")
     */
    public function getAccountSrcId(): OdooRelation
    {
        return $this->account_src_id;
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
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $position_id
     */
    public function setPositionId(OdooRelation $position_id): void
    {
        $this->position_id = $position_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.fiscal.position.account';
    }
}
