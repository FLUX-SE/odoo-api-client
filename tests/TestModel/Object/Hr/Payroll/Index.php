<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Payroll;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.payroll.index
 * ---
 * Name : hr.payroll.index
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Index extends Base
{
    /**
     * Percentage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $percentage;

    /**
     * Description
     * ---
     * Will be used as the message specifying why the wage on the contract has been modified
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Contracts
     * ---
     * Relation : many2many (hr.contract)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $contract_ids;

    /**
     * Error
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $display_warning;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @return float|null
     *
     * @SerializedName("percentage")
     */
    public function getPercentage(): ?float
    {
        return $this->percentage;
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
     * @param bool|null $display_warning
     */
    public function setDisplayWarning(?bool $display_warning): void
    {
        $this->display_warning = $display_warning;
    }

    /**
     * @param float|null $percentage
     */
    public function setPercentage(?float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("display_warning")
     */
    public function isDisplayWarning(): ?bool
    {
        return $this->display_warning;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeContractIds(OdooRelation $item): void
    {
        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        if ($this->hasContractIds($item)) {
            $index = array_search($item, $this->contract_ids);
            unset($this->contract_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addContractIds(OdooRelation $item): void
    {
        if ($this->hasContractIds($item)) {
            return;
        }

        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        $this->contract_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasContractIds(OdooRelation $item): bool
    {
        if (null === $this->contract_ids) {
            return false;
        }

        return in_array($item, $this->contract_ids);
    }

    /**
     * @param OdooRelation[]|null $contract_ids
     */
    public function setContractIds(?array $contract_ids): void
    {
        $this->contract_ids = $contract_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("contract_ids")
     */
    public function getContractIds(): ?array
    {
        return $this->contract_ids;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.payroll.index';
    }
}
