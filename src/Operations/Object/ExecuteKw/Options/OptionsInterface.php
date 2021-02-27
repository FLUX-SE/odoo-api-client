<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface OptionsInterface
{
    public function toArray(): array;

    /**
     * @param array|string|bool|int|float|null $option
     */
    public function addOption(string $name, $option): void;

    public function removeOption(string $name): void;

    /**
     * @return array|string|bool|int|float|null
     */
    public function getOption(string $name);

    public function getOptions(): array;

    public function setOptions(array $options): void;
}
