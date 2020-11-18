<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Barcode;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : barcode.nomenclature
 * ---
 * Name : barcode.nomenclature
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
final class Nomenclature extends Base
{
    /**
     * Barcode Nomenclature
     * ---
     * An internal identification of the barcode nomenclature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Rules
     * ---
     * The list of barcode rules
     * ---
     * Relation : one2many (barcode.rule -> barcode_nomenclature_id)
     * @see \Flux\OdooApiClient\Model\Object\Barcode\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rule_ids;

    /**
     * UPC/EAN Conversion
     * ---
     * UPC Codes can be converted to EAN by prefixing them with a zero. This setting determines if a UPC/EAN barcode
     * should be automatically converted in one way or another when trying to match a rule with the other encoding.
     * ---
     * Selection :
     *     -> none (Never)
     *     -> ean2upc (EAN-13 to UPC-A)
     *     -> upc2ean (UPC-A to EAN-13)
     *     -> always (Always)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $upc_ean_conv;

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
     * @param string $name Barcode Nomenclature
     *        ---
     *        An internal identification of the barcode nomenclature
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $upc_ean_conv UPC/EAN Conversion
     *        ---
     *        UPC Codes can be converted to EAN by prefixing them with a zero. This setting determines if a UPC/EAN barcode
     *        should be automatically converted in one way or another when trying to match a rule with the other encoding.
     *        ---
     *        Selection :
     *            -> none (Never)
     *            -> ean2upc (EAN-13 to UPC-A)
     *            -> upc2ean (UPC-A to EAN-13)
     *            -> always (Always)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $upc_ean_conv)
    {
        $this->name = $name;
        $this->upc_ean_conv = $upc_ean_conv;
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
     * @param string $upc_ean_conv
     */
    public function setUpcEanConv(string $upc_ean_conv): void
    {
        $this->upc_ean_conv = $upc_ean_conv;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     *
     * @SerializedName("upc_ean_conv")
     */
    public function getUpcEanConv(): string
    {
        return $this->upc_ean_conv;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRuleIds(OdooRelation $item): void
    {
        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        if ($this->hasRuleIds($item)) {
            $index = array_search($item, $this->rule_ids);
            unset($this->rule_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addRuleIds(OdooRelation $item): void
    {
        if ($this->hasRuleIds($item)) {
            return;
        }

        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        $this->rule_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRuleIds(OdooRelation $item): bool
    {
        if (null === $this->rule_ids) {
            return false;
        }

        return in_array($item, $this->rule_ids);
    }

    /**
     * @param OdooRelation[]|null $rule_ids
     */
    public function setRuleIds(?array $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("rule_ids")
     */
    public function getRuleIds(): ?array
    {
        return $this->rule_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'barcode.nomenclature';
    }
}
