<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

interface ArgumentsInterface
{
    /** @return mixed[] */
    public function toArray(): array;

    /** @param mixed[]|string|bool|int|float|null $argument */
    public function addArgument(array|string|bool|int|float|null $argument): void;

    /** @return mixed[] */
    public function getArguments(): array;

    /** @param mixed[] $arguments */
    public function setArguments(array $arguments): void;
}
