<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface OptionsInterface
{
    /** @return array<string, mixed> */
    public function toArray(): array;

    /** @param mixed[]|string|bool|int|float|null $option */
    public function addOption(string $name, array|string|bool|int|float|null $option): void;

    public function removeOption(string $name): void;

    /** @return mixed[]|string|bool|int|float|null */
    public function getOption(string $name): array|string|bool|int|float|null;

    /** @return array<string, mixed[]|string|bool|int|float|null> */
    public function getOptions(): array;

    /** @param array<string, mixed[]|string|bool|int|float|null> $options */
    public function setOptions(array $options): void;
}
