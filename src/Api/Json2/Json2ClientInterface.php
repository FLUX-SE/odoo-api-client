<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2;

use Psr\Http\Message\ResponseInterface;

interface Json2ClientInterface
{
    /** @param array<string, mixed> $parameters */
    public function call(string $model, string $method, array $parameters = []): ResponseInterface;

    public function decode(ResponseInterface $response): mixed;

    public function getLastResponse(): ?ResponseInterface;
}
