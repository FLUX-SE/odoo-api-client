<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : portal.mixin
 * Name : portal.mixin
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Mixin extends Base
{
    /**
     * Portal Access URL
     * Customer Portal URL
     *
     * @var null|string
     */
    private $access_url;

    /**
     * Security Token
     *
     * @var null|string
     */
    private $access_token;

    /**
     * Access warning
     *
     * @var null|string
     */
    private $access_warning;

    /**
     * @return null|string
     */
    public function getAccessUrl(): ?string
    {
        return $this->access_url;
    }

    /**
     * @return null|string
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @return null|string
     */
    public function getAccessWarning(): ?string
    {
        return $this->access_warning;
    }
}
