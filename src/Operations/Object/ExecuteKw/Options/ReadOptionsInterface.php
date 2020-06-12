<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface ReadOptionsInterface extends OptionsInterface
{
    public function removeField(string $field): bool;

    public function hasField(string $field): bool;

    /**
     * @param string[] $fields
     */
    public function setFields(array $fields): void;

    /**
     * @return string[]
     */
    public function getFields(): array;

    public function addField(string $field): bool;
}
