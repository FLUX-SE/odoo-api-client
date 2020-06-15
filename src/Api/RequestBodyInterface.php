<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

interface RequestBodyInterface
{
    public function getMethod(): string;

    public function setMethod(string $method): void;

    /**
     * @param array $params
     */
    public function setParams(array $params): void;

    /**
     * @return array
     */
    public function getParams(): array;
}
