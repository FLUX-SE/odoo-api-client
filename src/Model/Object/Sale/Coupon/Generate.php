<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sale\Coupon;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sale.coupon.generate
 * ---
 * Name : sale.coupon.generate
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Generate extends Base
{
    /**
     * Number of Coupons
     * ---
     * Number of coupons
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $nbr_coupons;

    /**
     * Generation Type
     * ---
     * Selection :
     *     -> nbr_coupon (Number of Coupons)
     *     -> nbr_customer (Number of Selected Customers)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $generation_type;

    /**
     * Customer
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $partners_domain;

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
     * @return int|null
     *
     * @SerializedName("nbr_coupons")
     */
    public function getNbrCoupons(): ?int
    {
        return $this->nbr_coupons;
    }

    /**
     * @param int|null $nbr_coupons
     */
    public function setNbrCoupons(?int $nbr_coupons): void
    {
        $this->nbr_coupons = $nbr_coupons;
    }

    /**
     * @return string|null
     *
     * @SerializedName("generation_type")
     */
    public function getGenerationType(): ?string
    {
        return $this->generation_type;
    }

    /**
     * @param string|null $generation_type
     */
    public function setGenerationType(?string $generation_type): void
    {
        $this->generation_type = $generation_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("partners_domain")
     */
    public function getPartnersDomain(): ?string
    {
        return $this->partners_domain;
    }

    /**
     * @param string|null $partners_domain
     */
    public function setPartnersDomain(?string $partners_domain): void
    {
        $this->partners_domain = $partners_domain;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sale.coupon.generate';
    }
}
