<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

interface RequestBodyInterface
{
    public function getMethod(): string;

    public function setMethod(string $method): void;

    /**
     * @param array{
     *      service: string,
     *      method: string,
     *      args: array<string, mixed>
     *  } $params
     */
    public function setParams(array $params): void;

    /**
     * @return array{
     *      service: string,
     *      method: string,
     *      args: array<string, mixed>
     *  }
     */
    public function getParams(): array;

    /** @param array<string, mixed> $args */
    public function setJsonParams(
        string $service,
        string $method,
        array $args
    ): void;
}
