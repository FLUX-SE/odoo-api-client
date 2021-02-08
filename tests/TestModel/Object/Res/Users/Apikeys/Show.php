<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Res\Users\Apikeys;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.users.apikeys.show
 * ---
 * Name : res.users.apikeys.show
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Show extends Base
{
    /**
     * Key
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $key;

    /**
     * @return string|null
     *
     * @SerializedName("key")
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.users.apikeys.show';
    }
}
