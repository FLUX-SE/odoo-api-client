<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Image;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : image.mixin
 * ---
 * Name : image.mixin
 * ---
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
abstract class Mixin extends Base
{
    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_128;

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1920")
     */
    public function getImage1920()
    {
        return $this->image_1920;
    }

    /**
     * @param mixed|null $image_1920
     */
    public function setImage1920($image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024()
    {
        return $this->image_1024;
    }

    /**
     * @param mixed|null $image_1024
     */
    public function setImage1024($image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_512")
     */
    public function getImage512()
    {
        return $this->image_512;
    }

    /**
     * @param mixed|null $image_512
     */
    public function setImage512($image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_256")
     */
    public function getImage256()
    {
        return $this->image_256;
    }

    /**
     * @param mixed|null $image_256
     */
    public function setImage256($image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_128")
     */
    public function getImage128()
    {
        return $this->image_128;
    }

    /**
     * @param mixed|null $image_128
     */
    public function setImage128($image_128): void
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
