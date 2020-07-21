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
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_1920;

    /**
     * Image 1024
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_1024;

    /**
     * Image 512
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_512;

    /**
     * Image 256
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_256;

    /**
     * Image 128
     * Searchable : yes
     * Sortable : no
     *
     * @var int|null
     */
    private $image_128;

    /**
     * @return int|null
     */
    public function getImage1920(): ?int
    {
        return $this->image_1920;
    }

    /**
     * @param int|null $image_1920
     */
    public function setImage1920(?int $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return int|null
     */
    public function getImage1024(): ?int
    {
        return $this->image_1024;
    }

    /**
     * @param int|null $image_1024
     */
    public function setImage1024(?int $image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return int|null
     */
    public function getImage512(): ?int
    {
        return $this->image_512;
    }

    /**
     * @param int|null $image_512
     */
    public function setImage512(?int $image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return int|null
     */
    public function getImage256(): ?int
    {
        return $this->image_256;
    }

    /**
     * @param int|null $image_256
     */
    public function setImage256(?int $image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return int|null
     */
    public function getImage128(): ?int
    {
        return $this->image_128;
    }

    /**
     * @param int|null $image_128
     */
    public function setImage128(?int $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'image.mixin';
    }
}
