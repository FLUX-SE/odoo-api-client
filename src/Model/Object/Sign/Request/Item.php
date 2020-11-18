<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign\Request;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.request.item
 * ---
 * Name : sign.request.item
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
final class Item extends Base
{
    /**
     * Contact
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Signature Request
     * ---
     * Relation : many2one (sign.request)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sign_request_id;

    /**
     * Value
     * ---
     * Relation : one2many (sign.request.item.value -> sign_request_item_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request\Item\Value
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $sign_item_value_ids;

    /**
     * Security Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $access_token;

    /**
     * Accessed Through Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $access_via_link;

    /**
     * Role
     * ---
     * Relation : many2one (sign.item.role)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item\Role
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $role_id;

    /**
     * Mobile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sms_number;

    /**
     * SMS Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sms_token;

    /**
     * Signature
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $signature;

    /**
     * Signed on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $signing_date;

    /**
     * State
     * ---
     * Selection :
     *     -> draft (Draft)
     *     -> sent (Waiting for completion)
     *     -> completed (Completed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $signer_email;

    /**
     * Latitude
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $latitude;

    /**
     * Longitude
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $longitude;

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
     * @param OdooRelation $sign_request_id Signature Request
     *        ---
     *        Relation : many2one (sign.request)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Request
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $access_token Security Token
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $sign_request_id, string $access_token)
    {
        $this->sign_request_id = $sign_request_id;
        $this->access_token = $access_token;
    }

    /**
     * @return float|null
     *
     * @SerializedName("longitude")
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param DateTimeInterface|null $signing_date
     */
    public function setSigningDate(?DateTimeInterface $signing_date): void
    {
        $this->signing_date = $signing_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signer_email")
     */
    public function getSignerEmail(): ?string
    {
        return $this->signer_email;
    }

    /**
     * @param string|null $signer_email
     */
    public function setSignerEmail(?string $signer_email): void
    {
        $this->signer_email = $signer_email;
    }

    /**
     * @return float|null
     *
     * @SerializedName("latitude")
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @param mixed|null $signature
     */
    public function setSignature($signature): void
    {
        $this->signature = $signature;
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
     * @return DateTimeInterface|null
     *
     * @SerializedName("signing_date")
     */
    public function getSigningDate(): ?DateTimeInterface
    {
        return $this->signing_date;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("signature")
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSignItemValueIds(OdooRelation $item): void
    {
        if (null === $this->sign_item_value_ids) {
            $this->sign_item_value_ids = [];
        }

        if ($this->hasSignItemValueIds($item)) {
            $index = array_search($item, $this->sign_item_value_ids);
            unset($this->sign_item_value_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @param OdooRelation $sign_request_id
     */
    public function setSignRequestId(OdooRelation $sign_request_id): void
    {
        $this->sign_request_id = $sign_request_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("sign_item_value_ids")
     */
    public function getSignItemValueIds(): ?array
    {
        return $this->sign_item_value_ids;
    }

    /**
     * @param OdooRelation[]|null $sign_item_value_ids
     */
    public function setSignItemValueIds(?array $sign_item_value_ids): void
    {
        $this->sign_item_value_ids = $sign_item_value_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSignItemValueIds(OdooRelation $item): bool
    {
        if (null === $this->sign_item_value_ids) {
            return false;
        }

        return in_array($item, $this->sign_item_value_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSignItemValueIds(OdooRelation $item): void
    {
        if ($this->hasSignItemValueIds($item)) {
            return;
        }

        if (null === $this->sign_item_value_ids) {
            $this->sign_item_value_ids = [];
        }

        $this->sign_item_value_ids[] = $item;
    }

    /**
     * @return string
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string|null $sms_token
     */
    public function setSmsToken(?string $sms_token): void
    {
        $this->sms_token = $sms_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("access_via_link")
     */
    public function isAccessViaLink(): ?bool
    {
        return $this->access_via_link;
    }

    /**
     * @param bool|null $access_via_link
     */
    public function setAccessViaLink(?bool $access_via_link): void
    {
        $this->access_via_link = $access_via_link;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("role_id")
     */
    public function getRoleId(): ?OdooRelation
    {
        return $this->role_id;
    }

    /**
     * @param OdooRelation|null $role_id
     */
    public function setRoleId(?OdooRelation $role_id): void
    {
        $this->role_id = $role_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sms_number")
     */
    public function getSmsNumber(): ?string
    {
        return $this->sms_number;
    }

    /**
     * @param string|null $sms_number
     */
    public function setSmsNumber(?string $sms_number): void
    {
        $this->sms_number = $sms_number;
    }

    /**
     * @return string|null
     *
     * @SerializedName("sms_token")
     */
    public function getSmsToken(): ?string
    {
        return $this->sms_token;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.request.item';
    }
}
