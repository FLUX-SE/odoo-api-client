<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface FieldsGetOptionsInterface extends OptionsInterface
{
    public function removeAttribute(string $attribute): bool;

    /**
     * @return string[]
     */
    public function getAttributes(): array;

    public function addAttribute(string $attribute): bool;

    /**
     * @param string[] $attributes
     */
    public function setAttributes(array $attributes): void;

    public function hasAttribute(string $attribute): bool;
}
