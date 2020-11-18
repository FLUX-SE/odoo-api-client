<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Stock\Quant;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : stock.quant.package
 * ---
 * Name : stock.quant.package
 * ---
 * Info :
 * Packages containing quants and/or other packages
 */
final class Package extends Base
{
    /**
     * Package Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Bulk Content
     * ---
     * Relation : one2many (stock.quant -> package_id)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Quant
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $quant_ids;

    /**
     * Package Type
     * ---
     * Relation : many2one (product.packaging)
     * @see \Flux\OdooApiClient\Model\Object\Product\Packaging
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $packaging_id;

    /**
     * Location
     * ---
     * Relation : many2one (stock.location)
     * @see \Flux\OdooApiClient\Model\Object\Stock\Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $location_id;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Owner
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $owner_id;

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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("owner_id")
     */
    public function getOwnerId(): ?OdooRelation
    {
        return $this->owner_id;
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
     * @param OdooRelation|null $owner_id
     */
    public function setOwnerId(?OdooRelation $owner_id): void
    {
        $this->owner_id = $owner_id;
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
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $location_id
     */
    public function setLocationId(?OdooRelation $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("location_id")
     */
    public function getLocationId(): ?OdooRelation
    {
        return $this->location_id;
    }

    /**
     * @param OdooRelation|null $packaging_id
     */
    public function setPackagingId(?OdooRelation $packaging_id): void
    {
        $this->packaging_id = $packaging_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("packaging_id")
     */
    public function getPackagingId(): ?OdooRelation
    {
        return $this->packaging_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeQuantIds(OdooRelation $item): void
    {
        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        if ($this->hasQuantIds($item)) {
            $index = array_search($item, $this->quant_ids);
            unset($this->quant_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addQuantIds(OdooRelation $item): void
    {
        if ($this->hasQuantIds($item)) {
            return;
        }

        if (null === $this->quant_ids) {
            $this->quant_ids = [];
        }

        $this->quant_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasQuantIds(OdooRelation $item): bool
    {
        if (null === $this->quant_ids) {
            return false;
        }

        return in_array($item, $this->quant_ids);
    }

    /**
     * @param OdooRelation[]|null $quant_ids
     */
    public function setQuantIds(?array $quant_ids): void
    {
        $this->quant_ids = $quant_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("quant_ids")
     */
    public function getQuantIds(): ?array
    {
        return $this->quant_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'stock.quant.package';
    }
}
