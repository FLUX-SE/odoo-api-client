<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : portal.mixin
 * ---
 * Name : portal.mixin
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Mixin extends Base
{
    /**
     * Portal Access URL
     * ---
     * Customer Portal URL
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $access_url;

    /**
     * Security Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $access_token;

    /**
     * Access warning
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $access_warning;

    /**
     * @return string|null
     *
     * @SerializedName("access_url")
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @param string|null $access_url
     */
    public function setAccessUrl(?string $access_url): void
    {
        $this->access_url = $access_url;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_token")
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @param string|null $access_token
     */
    public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("access_warning")
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }

    /**
     * @param string|null $access_warning
     */
    public function setAccessWarning(?string $access_warning): void
    {
        $this->access_warning = $access_warning;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'portal.mixin';
    }
}
