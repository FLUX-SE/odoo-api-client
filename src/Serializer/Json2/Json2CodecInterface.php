<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Json2;

interface Json2CodecInterface
{
    /** @param array<string, mixed> $parameters */
    public function encode(array $parameters): string;

    public function decode(string $payload): mixed;
}
