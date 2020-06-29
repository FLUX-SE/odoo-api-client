<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Image;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : image.mixin
 * Name : image.mixin
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Mixin extends Base
{
    /**
     * Image
     *
     * @var null|int
     */
    private $image_1920;

    /**
     * Image 1024
     *
     * @var null|int
     */
    private $image_1024;

    /**
     * Image 512
     *
     * @var null|int
     */
    private $image_512;

    /**
     * Image 256
     *
     * @var null|int
     */
    private $image_256;

    /**
     * Image 128
     *
     * @var null|int
     */
    private $image_128;

    /**
     * @return null|int
     */
    public function getImage1920(): ?int
    {
        return $this->image_1920;
    }

    /**
     * @return null|int
     */
    public function getImage1024(): ?int
    {
        return $this->image_1024;
    }

    /**
     * @return null|int
     */
    public function getImage512(): ?int
    {
        return $this->image_512;
    }

    /**
     * @return null|int
     */
    public function getImage256(): ?int
    {
        return $this->image_256;
    }

    /**
     * @return null|int
     */
    public function getImage128(): ?int
    {
        return $this->image_128;
    }
}
