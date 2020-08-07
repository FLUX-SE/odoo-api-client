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
final class Mixin extends Base
{
    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_128;

    /**
     * @return array|null
     *
     * @SerializedName("image_1920")
     */
    public function getImage1920(): ?array
    {
        return $this->image_1920;
    }

    /**
     * @param mixed $item
     */
    public function removeImage512($item): void
    {
        if (null === $this->image_512) {
            $this->image_512 = [];
        }

        if ($this->hasImage512($item)) {
            $index = array_search($item, $this->image_512);
            unset($this->image_512[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function removeImage128($item): void
    {
        if (null === $this->image_128) {
            $this->image_128 = [];
        }

        if ($this->hasImage128($item)) {
            $index = array_search($item, $this->image_128);
            unset($this->image_128[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImage128($item): void
    {
        if ($this->hasImage128($item)) {
            return;
        }

        if (null === $this->image_128) {
            $this->image_128 = [];
        }

        $this->image_128[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage128($item): bool
    {
        if (null === $this->image_128) {
            return false;
        }

        return in_array($item, $this->image_128);
    }

    /**
     * @param array|null $image_128
     */
    public function setImage128(?array $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_128")
     */
    public function getImage128(): ?array
    {
        return $this->image_128;
    }

    /**
     * @param mixed $item
     */
    public function removeImage256($item): void
    {
        if (null === $this->image_256) {
            $this->image_256 = [];
        }

        if ($this->hasImage256($item)) {
            $index = array_search($item, $this->image_256);
            unset($this->image_256[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImage256($item): void
    {
        if ($this->hasImage256($item)) {
            return;
        }

        if (null === $this->image_256) {
            $this->image_256 = [];
        }

        $this->image_256[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage256($item): bool
    {
        if (null === $this->image_256) {
            return false;
        }

        return in_array($item, $this->image_256);
    }

    /**
     * @param array|null $image_256
     */
    public function setImage256(?array $image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_256")
     */
    public function getImage256(): ?array
    {
        return $this->image_256;
    }

    /**
     * @param mixed $item
     */
    public function addImage512($item): void
    {
        if ($this->hasImage512($item)) {
            return;
        }

        if (null === $this->image_512) {
            $this->image_512 = [];
        }

        $this->image_512[] = $item;
    }

    /**
     * @param array|null $image_1920
     */
    public function setImage1920(?array $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage512($item): bool
    {
        if (null === $this->image_512) {
            return false;
        }

        return in_array($item, $this->image_512);
    }

    /**
     * @param array|null $image_512
     */
    public function setImage512(?array $image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_512")
     */
    public function getImage512(): ?array
    {
        return $this->image_512;
    }

    /**
     * @param mixed $item
     */
    public function removeImage1024($item): void
    {
        if (null === $this->image_1024) {
            $this->image_1024 = [];
        }

        if ($this->hasImage1024($item)) {
            $index = array_search($item, $this->image_1024);
            unset($this->image_1024[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImage1024($item): void
    {
        if ($this->hasImage1024($item)) {
            return;
        }

        if (null === $this->image_1024) {
            $this->image_1024 = [];
        }

        $this->image_1024[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage1024($item): bool
    {
        if (null === $this->image_1024) {
            return false;
        }

        return in_array($item, $this->image_1024);
    }

    /**
     * @param array|null $image_1024
     */
    public function setImage1024(?array $image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024(): ?array
    {
        return $this->image_1024;
    }

    /**
     * @param mixed $item
     */
    public function removeImage1920($item): void
    {
        if (null === $this->image_1920) {
            $this->image_1920 = [];
        }

        if ($this->hasImage1920($item)) {
            $index = array_search($item, $this->image_1920);
            unset($this->image_1920[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImage1920($item): void
    {
        if ($this->hasImage1920($item)) {
            return;
        }

        if (null === $this->image_1920) {
            $this->image_1920 = [];
        }

        $this->image_1920[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage1920($item): bool
    {
        if (null === $this->image_1920) {
            return false;
        }

        return in_array($item, $this->image_1920);
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'image.mixin';
    }
}
