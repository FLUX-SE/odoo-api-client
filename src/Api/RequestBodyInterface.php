<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

interface RequestBodyInterface
{
    public function getMethod(): string;

    public function setMethod(string $method): void;

    /**
     * @param mixed[] $params
     */
    public function setParams(array $params): void;

    /**
     * @return mixed[]
     */
    public function getParams(): array;

    /** @param mixed[] $args */
    public function setJsonParams(
        string $service,
        string $method,
        array $args
    ): void;
}
