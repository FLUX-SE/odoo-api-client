<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

use LogicException;

trait FieldsGetTrait
{
    abstract public function addOption(string $name, $option): void;

    abstract public function getOption(string $name);

    public function __construct()
    {
        $this->setAttributes([]);
    }

    public function getAttributes(): array
    {
        $attributes = $this->getOption(FieldsGetOptionsInterface::FIELD_NAME_ATTRIBUTES);

        if (is_array($attributes)) {
            return $attributes;
        }

        throw new LogicException(sprintf(
            'The attributes should be an array "%s" retrieved !',
            gettype($attributes)
        ));
    }

    public function setAttributes(array $attributes): void
    {
        $this->addOption(FieldsGetOptionsInterface::FIELD_NAME_ATTRIBUTES, $attributes);
    }

    public function addAttribute(string $attribute): bool
    {
        if (false === $this->hasAttribute($attribute)) {
            $attributes = $this->getAttributes();
            $attributes[] = $attribute;
            $this->setAttributes($attributes);

            return true;
        }

        return false;
    }

    public function removeAttribute(string $attribute): bool
    {
        $attributes = $this->getAttributes();
        $index = array_search($attribute, $attributes);
        if (false !== $index) {
            unset($attributes[$index]);
            $this->setAttributes($attributes);

            return true;
        }

        return false;
    }

    public function hasAttribute(string $attribute): bool
    {
        return in_array($attribute, $this->getAttributes());
    }
}
