<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface OptionsInterface
{
    public function toArray(): array;

    public function addOption(string $name, array|string|bool|int|float|null $option): void;

    public function removeOption(string $name): void;

    public function getOption(string $name): array|string|bool|int|float|null;

    public function getOptions(): array;

    public function setOptions(array $options): void;
}
