<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

interface ArgumentsInterface
{
    public function toArray(): array;

    public function addArgument(array|string|bool|int|float|null $argument): void;

    public function getArguments(): array;

    public function setArguments(array $arguments): void;
}
