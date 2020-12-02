<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

abstract class AbstractArguments implements ArgumentsInterface
{
    /** @var array */
    protected $arguments = [];

    public function toArray(): array
    {
        return array_values($this->arguments);
    }

    public function addArgument($argument): void
    {
        $this->arguments[] = $argument;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }
}
