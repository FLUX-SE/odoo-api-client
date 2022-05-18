<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class RequestBody implements RequestBodyInterface
{
    private string $method;

    private array $params = [];

    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
