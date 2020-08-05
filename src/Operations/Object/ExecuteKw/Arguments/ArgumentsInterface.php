<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

interface ArgumentsInterface
{
    public function toArray(): array;

    /**
     * @param array|string|bool|int|float|null $argument
     */
    public function addArgument($argument): void;

    public function getArguments(): array;

    public function setArguments(array $arguments): void;
}
