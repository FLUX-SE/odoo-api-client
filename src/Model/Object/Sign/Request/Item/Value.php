<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign\Request\Item;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.request.item.value
 * ---
 * Name : sign.request.item.value
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
final class Value extends Base
{
    /**
     * Signature Request item
     * ---
     * Relation : many2one (sign.request.item)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request\Item
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sign_request_item_id;

    /**
     * Signature Item
     * ---
     * Relation : many2one (sign.item)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sign_item_id;

    /**
     * Signature Request
     * ---
     * Relation : many2one (sign.request)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    private $sign_request_id;

    /**
     * Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $value;

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
     * @param OdooRelation $sign_request_item_id Signature Request item
     *        ---
     *        Relation : many2one (sign.request.item)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Request\Item
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sign_item_id Signature Item
     *        ---
     *        Relation : many2one (sign.item)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Item
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sign_request_id Signature Request
     *        ---
     *        Relation : many2one (sign.request)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Request
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $sign_request_item_id,
        OdooRelation $sign_item_id,
        OdooRelation $sign_request_id
    ) {
        $this->sign_request_item_id = $sign_request_item_id;
        $this->sign_item_id = $sign_item_id;
        $this->sign_request_id = $sign_request_id;
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
     * @SerializedName("sign_request_item_id")
     */
    public function getSignRequestItemId(): OdooRelation
    {
        return $this->sign_request_item_id;
    }

    /**
     * @param string|null $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     *
     * @SerializedName("value")
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param OdooRelation $sign_request_id
     */
    public function setSignRequestId(OdooRelation $sign_request_id): void
    {
        $this->sign_request_id = $sign_request_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sign_request_id")
     */
    public function getSignRequestId(): OdooRelation
    {
        return $this->sign_request_id;
    }

    /**
     * @param OdooRelation $sign_item_id
     */
    public function setSignItemId(OdooRelation $sign_item_id): void
    {
        $this->sign_item_id = $sign_item_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sign_item_id")
     */
    public function getSignItemId(): OdooRelation
    {
        return $this->sign_item_id;
    }

    /**
     * @param OdooRelation $sign_request_item_id
     */
    public function setSignRequestItemId(OdooRelation $sign_request_item_id): void
    {
        $this->sign_request_item_id = $sign_request_item_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.request.item.value';
    }
}
