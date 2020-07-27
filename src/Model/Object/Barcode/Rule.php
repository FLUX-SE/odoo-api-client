<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Barcode;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : barcode.rule
 * ---
 * Name : barcode.rule
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
final class Rule extends Base
{
    /**
     * Rule Name
     * ---
     * An internal identification for this barcode nomenclature rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Barcode Nomenclature
     * ---
     * Relation : many2one (barcode.nomenclature)
     * @see \Flux\OdooApiClient\Model\Object\Barcode\Nomenclature
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $barcode_nomenclature_id;

    /**
     * Sequence
     * ---
     * Used to order rules such that rules with a smaller sequence match first
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Encoding
     * ---
     * This rule will apply only if the barcode is encoded with the specified encoding
     * ---
     * Selection : (default value, usually null)
     *     -> any (Any)
     *     -> ean13 (EAN-13)
     *     -> ean8 (EAN-8)
     *     -> upca (UPC-A)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $encoding;

    /**
     * Barcode Pattern
     * ---
     * The barcode matching pattern
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $pattern;

    /**
     * Alias
     * ---
     * The matched pattern will alias to this barcode
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $alias;

    /**
     * Type
     * ---
     * Selection : (default value, usually null)
     *     -> alias (Alias)
     *     -> product (Unit Product)
     *     -> weight (Weighted Product)
     *     -> location (Location)
     *     -> lot (Lot)
     *     -> package (Package)
     *     -> price (Priced Product)
     *     -> discount (Discounted Product)
     *     -> client (Client)
     *     -> cashier (Cashier)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $type;

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
     * @param string $name Rule Name
     *        ---
     *        An internal identification for this barcode nomenclature rule
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $encoding Encoding
     *        ---
     *        This rule will apply only if the barcode is encoded with the specified encoding
     *        ---
     *        Selection : (default value, usually null)
     *            -> any (Any)
     *            -> ean13 (EAN-13)
     *            -> ean8 (EAN-8)
     *            -> upca (UPC-A)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $pattern Barcode Pattern
     *        ---
     *        The barcode matching pattern
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alias Alias
     *        ---
     *        The matched pattern will alias to this barcode
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $type Type
     *        ---
     *        Selection : (default value, usually null)
     *            -> alias (Alias)
     *            -> product (Unit Product)
     *            -> weight (Weighted Product)
     *            -> location (Location)
     *            -> lot (Lot)
     *            -> package (Package)
     *            -> price (Priced Product)
     *            -> discount (Discounted Product)
     *            -> client (Client)
     *            -> cashier (Cashier)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $encoding,
        string $pattern,
        string $alias,
        string $type
    ) {
        $this->name = $name;
        $this->encoding = $encoding;
        $this->pattern = $pattern;
        $this->alias = $alias;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $pattern
     */
    public function setPattern(string $pattern): void
    {
        $this->pattern = $pattern;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param OdooRelation|null $barcode_nomenclature_id
     */
    public function setBarcodeNomenclatureId(?OdooRelation $barcode_nomenclature_id): void
    {
        $this->barcode_nomenclature_id = $barcode_nomenclature_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getBarcodeNomenclatureId(): ?OdooRelation
    {
        return $this->barcode_nomenclature_id;
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
        return 'barcode.rule';
    }
}
