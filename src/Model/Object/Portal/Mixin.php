<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : portal.mixin
 * Name : portal.mixin
 *
 * The base model, which is implicitly inherited by all models.
 */
final class Mixin extends Base
{
    /**
     * Portal Access URL
     *
     * @var string
     */
    private $access_url;

    /**
     * Security Token
     *
     * @var string
     */
    private $access_token;

    /**
     * Access warning
     *
     * @var string
     */
    private $access_warning;

    /**
     * @return string
     */
    public function getAccessUrl(): string
    {
        return $this->access_url;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @return string
     */
    public function getAccessWarning(): string
    {
        return $this->access_warning;
    }
}
