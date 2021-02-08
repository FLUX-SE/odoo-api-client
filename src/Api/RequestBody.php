<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class RequestBody implements RequestBodyInterface
{
    /** @var string */
    private $method;
    /** @var array */
    private $params = [];

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

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
