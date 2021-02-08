<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Sequence;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sequence.mixin
 * ---
 * Name : sequence.mixin
 * ---
 * Info :
 * Mechanism used to have an editable sequence number.
 *
 *         Be careful of how you use this regarding the prefixes. More info in the
 *         docstring of _get_last_sequence.
 */
final class Mixin extends Base
{
    /**
     * Sequence Prefix
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $sequence_prefix;

    /**
     * Sequence Number
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence_number;

    /**
     * @return string|null
     *
     * @SerializedName("sequence_prefix")
     */
    public function getSequencePrefix(): ?string
    {
        return $this->sequence_prefix;
    }

    /**
     * @param string|null $sequence_prefix
     */
    public function setSequencePrefix(?string $sequence_prefix): void
    {
        $this->sequence_prefix = $sequence_prefix;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence_number")
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequence_number;
    }

    /**
     * @param int|null $sequence_number
     */
    public function setSequenceNumber(?int $sequence_number): void
    {
        $this->sequence_number = $sequence_number;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sequence.mixin';
    }
}
