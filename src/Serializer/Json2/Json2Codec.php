<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2DecodingException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2EncodingException;

final class Json2Codec implements Json2CodecInterface
{
    private const DEFAULT_DEPTH = 512;

    /** @var int<1, max> */
    private int $depth;

    public function __construct(int $depth = self::DEFAULT_DEPTH)
    {
        if ($depth < 1) {
            throw new \InvalidArgumentException('The JSON depth must be greater than zero.');
        }

        $this->depth = $depth;
    }

    public function encode(array $parameters): string
    {
        $normalized = $this->normalizeParameters($parameters);

        try {
            // A JSON-2 request is always a named-parameter object, including when empty.
            return json_encode(
                (object) $normalized,
                JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION,
                $this->depth
            );
        } catch (\JsonException) {
            throw new Json2EncodingException();
        }
    }

    /**
     * @param array<mixed> $parameters
     * @return array<string, mixed>
     */
    private function normalizeParameters(array $parameters): array
    {
        $normalized = [];
        foreach ($parameters as $name => $value) {
            if (false === is_string($name) || 1 !== preg_match('/\A[A-Za-z_][A-Za-z0-9_]*\z/D', $name)) {
                throw new \InvalidArgumentException('JSON-2 parameters must have valid named keys.');
            }

            $normalized[$name] = 'context' === $name && [] === $value ? new \stdClass() : $value;
        }

        return $normalized;
    }

    public function decode(string $payload): mixed
    {
        if ('' === trim($payload)) {
            throw new Json2DecodingException();
        }

        try {
            // Objects follow the library convention and are represented as associative arrays.
            return json_decode($payload, true, $this->depth, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            throw new Json2DecodingException();
        }
    }
}
