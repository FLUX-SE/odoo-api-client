<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Snailmail;

use FluxSE\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : snailmail.confirm
 * ---
 * Name : snailmail.confirm
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Confirm extends Base
{
    /**
     * Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $model_name;

    /**
     * @return string|null
     *
     * @SerializedName("model_name")
     */
    public function getModelName(): ?string
    {
        return $this->model_name;
    }

    /**
     * @param string|null $model_name
     */
    public function setModelName(?string $model_name): void
    {
        $this->model_name = $model_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'snailmail.confirm';
    }
}
