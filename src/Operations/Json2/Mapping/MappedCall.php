<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

final class MappedCall
{
    /** @param array<string, mixed> $parameters */
    public function __construct(
        private readonly string $model,
        private readonly string $method,
        private readonly array $parameters,
        private readonly ReturnRule $returnRule = ReturnRule::IDENTITY,
        private readonly ?MethodSignature $signature = null,
    ) {
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /** @return array<string, mixed> */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getReturnRule(): ReturnRule
    {
        return $this->returnRule;
    }

    public function getSignature(): ?MethodSignature
    {
        return $this->signature;
    }
}
