<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

trait FieldsGetTrait
{
    /** @var string[] */
    private $attributes = [];

    protected function getOptionsMap(): array
    {
        return [
            'attributes' => 'getAttributes',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function addAttribute(string $attribute): bool
    {
        if (false === $this->hasAttribute($attribute)) {
            $this->attributes[] = $attribute;

            return true;
        }

        return false;
    }

    public function removeAttribute(string $attribute): bool
    {
        $index = array_search($attribute, $this->attributes);
        if (false !== $index) {
            unset($this->attributes[$index]);

            return true;
        }

        return false;
    }

    public function hasAttribute(string $attribute): bool
    {
        return in_array($attribute, $this->attributes);
    }
}
