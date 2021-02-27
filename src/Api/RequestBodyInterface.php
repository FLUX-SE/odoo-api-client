<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

interface RequestBodyInterface
{
    public function getMethod(): string;

    public function setMethod(string $method): void;

    /**
     */
    public function setParams(array $params): void;

    /**
     */
    public function getParams(): array;
}
