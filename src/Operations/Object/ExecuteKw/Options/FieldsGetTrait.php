<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

use Webmozart\Assert\Assert;

trait FieldsGetTrait
{
    public function __construct()
    {
        $this->setAttributes([]);
    }

    public function getAttributes(): array
    {
        /** @var string[] $attributes */
        $attributes = $this->getOption(FieldsGetOptionsInterface::FIELD_NAME_ATTRIBUTES);

        Assert::allString($attributes, sprintf(
            'The attribut values should be an array of strings, "%s" found ! : %s',
            '%s',
            print_r($attributes, true)
        ));

        return $attributes;
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
        $index = array_search($attribute, $attributes, true);
        if (false !== $index) {
            unset($attributes[$index]);
            $this->setAttributes($attributes);

            return true;
        }

        return false;
    }

    public function hasAttribute(string $attribute): bool
    {
        return in_array($attribute, $this->getAttributes(), true);
    }
}
