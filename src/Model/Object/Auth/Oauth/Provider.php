<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Auth\Oauth;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : auth.oauth.provider
 * ---
 * Name : auth.oauth.provider
 * ---
 * Info :
 * Class defining the configuration values of an OAuth2 provider
 */
final class Provider extends Base
{
    /**
     * Provider name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Client ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $client_id;

    /**
     * Authentication URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $auth_endpoint;

    /**
     * Scope
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $scope;

    /**
     * Validation URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $validation_endpoint;

    /**
     * Data URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $data_endpoint;

    /**
     * Allowed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $enabled;

    /**
     * CSS class
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $css_class;

    /**
     * Body
     * ---
     * Link text in Login Dialog
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $body;

    /**
     * Sequence
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

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
     * @param string $name Provider name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $auth_endpoint Authentication URL
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $validation_endpoint Validation URL
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $body Body
     *        ---
     *        Link text in Login Dialog
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $auth_endpoint,
        string $validation_endpoint,
        string $body
    ) {
        $this->name = $name;
        $this->auth_endpoint = $auth_endpoint;
        $this->validation_endpoint = $validation_endpoint;
        $this->body = $body;
    }

    /**
     * @param string|null $css_class
     */
    public function setCssClass(?string $css_class): void
    {
        $this->css_class = $css_class;
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
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     *
     * @SerializedName("body")
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string|null
     *
     * @SerializedName("css_class")
     */
    public function getCssClass(): ?string
    {
        return $this->css_class;
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
     * @param bool|null $enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("enabled")
     */
    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param string|null $data_endpoint
     */
    public function setDataEndpoint(?string $data_endpoint): void
    {
        $this->data_endpoint = $data_endpoint;
    }

    /**
     * @return string|null
     *
     * @SerializedName("data_endpoint")
     */
    public function getDataEndpoint(): ?string
    {
        return $this->data_endpoint;
    }

    /**
     * @param string $validation_endpoint
     */
    public function setValidationEndpoint(string $validation_endpoint): void
    {
        $this->validation_endpoint = $validation_endpoint;
    }

    /**
     * @return string
     *
     * @SerializedName("validation_endpoint")
     */
    public function getValidationEndpoint(): string
    {
        return $this->validation_endpoint;
    }

    /**
     * @param string|null $scope
     */
    public function setScope(?string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * @return string|null
     *
     * @SerializedName("scope")
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string $auth_endpoint
     */
    public function setAuthEndpoint(string $auth_endpoint): void
    {
        $this->auth_endpoint = $auth_endpoint;
    }

    /**
     * @return string
     *
     * @SerializedName("auth_endpoint")
     */
    public function getAuthEndpoint(): string
    {
        return $this->auth_endpoint;
    }

    /**
     * @param string|null $client_id
     */
    public function setClientId(?string $client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("client_id")
     */
    public function getClientId(): ?string
    {
        return $this->client_id;
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
        return 'auth.oauth.provider';
    }
}
