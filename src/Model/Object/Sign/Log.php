<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.log
 * ---
 * Name : sign.log
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
final class Log extends Base
{
    /**
     * Log Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $log_date;

    /**
     * Sign Request
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
     * Sign Request Item
     * ---
     * Relation : many2one (sign.request.item)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Request\Item
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $sign_request_item_id;

    /**
     * User
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Partner
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
     * IP address of the visitor
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $ip;

    /**
     * Inalterability Hash
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $log_hash;

    /**
     * User token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $token;

    /**
     * Action Performed
     * ---
     * Selection :
     *     -> create (Creation)
     *     -> open (View/Download)
     *     -> save (Save)
     *     -> sign (Signature)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $action;

    /**
     * State of the request on action log
     * ---
     * Selection :
     *     -> sent (Before Signature)
     *     -> signed (After Signature)
     *     -> canceled (Canceled)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $request_state;

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
     * @param DateTimeInterface $log_date Log Date
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sign_request_id Sign Request
     *        ---
     *        Relation : many2one (sign.request)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Request
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $ip IP address of the visitor
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $action Action Performed
     *        ---
     *        Selection :
     *            -> create (Creation)
     *            -> open (View/Download)
     *            -> save (Save)
     *            -> sign (Signature)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $request_state State of the request on action log
     *        ---
     *        Selection :
     *            -> sent (Before Signature)
     *            -> signed (After Signature)
     *            -> canceled (Canceled)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        DateTimeInterface $log_date,
        OdooRelation $sign_request_id,
        string $ip,
        string $action,
        string $request_state
    ) {
        $this->log_date = $log_date;
        $this->sign_request_id = $sign_request_id;
        $this->ip = $ip;
        $this->action = $action;
        $this->request_state = $request_state;
    }

    /**
     * @param string|null $log_hash
     */
    public function setLogHash(?string $log_hash): void
    {
        $this->log_hash = $log_hash;
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
     * @param string $request_state
     */
    public function setRequestState(string $request_state): void
    {
        $this->request_state = $request_state;
    }

    /**
     * @return string
     *
     * @SerializedName("request_state")
     */
    public function getRequestState(): string
    {
        return $this->request_state;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     *
     * @SerializedName("action")
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("token")
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("log_hash")
     */
    public function getLogHash(): ?string
    {
        return $this->log_hash;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("log_date")
     */
    public function getLogDate(): DateTimeInterface
    {
        return $this->log_date;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param DateTimeInterface $log_date
     */
    public function setLogDate(DateTimeInterface $log_date): void
    {
        $this->log_date = $log_date;
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
     * @return OdooRelation|null
     *
     * @SerializedName("sign_request_item_id")
     */
    public function getSignRequestItemId(): ?OdooRelation
    {
        return $this->sign_request_item_id;
    }

    /**
     * @param OdooRelation|null $sign_request_item_id
     */
    public function setSignRequestItemId(?OdooRelation $sign_request_item_id): void
    {
        $this->sign_request_item_id = $sign_request_item_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
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
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
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
     * @return float|null
     *
     * @SerializedName("longitude")
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     *
     * @SerializedName("ip")
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.log';
    }
}
