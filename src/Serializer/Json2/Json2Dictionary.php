<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Json2;

/**
 * Explicit JSON object value for dictionaries whose empty PHP representation
 * would otherwise be indistinguishable from an empty JSON list.
 */
final class Json2Dictionary implements \JsonSerializable
{
    /** @var array<string, mixed> */
    private readonly array $values;

    /** @param array<string, mixed> $values */
    public function __construct(array $values = [])
    {
        $this->values = $this->validate($values);
    }

    /**
     * @param array<mixed> $values
     * @return array<string, mixed>
     */
    private function validate(array $values): array
    {
        foreach (array_keys($values) as $name) {
            if (!is_string($name)) {
                throw new \InvalidArgumentException('A JSON-2 dictionary must have string keys.');
            }
        }

        /** @var array<string, mixed> $values */

        return $values;
    }

    public function jsonSerialize(): object
    {
        return (object) $this->values;
    }
}
