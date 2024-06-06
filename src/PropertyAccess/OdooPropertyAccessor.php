<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PropertyAccess;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyAccess\PropertyPathInterface;

final class OdooPropertyAccessor implements PropertyAccessorInterface
{
    public function __construct(private PropertyAccessorInterface $decoratedPropertyAccessor)
    {
    }

    public function setValue(object|array &$objectOrArray, PropertyPathInterface|string $propertyPath, mixed $value): void
    {
        /**
         * Override to set null when original value is false
         *
         * Because null value is transformed to false by Odoo API
         * There is no other way to do it simply with any features given by Symfony Serializer
         */

        $this->decoratedPropertyAccessor->setValue($objectOrArray, $propertyPath, $value);

        if (false !== $value) {
            return;
        }

        $newValue = $this->decoratedPropertyAccessor->getValue($objectOrArray, $propertyPath);

        if (false === $newValue) {
            return;
        }

        // set null instead of false
        $this->decoratedPropertyAccessor->setValue($objectOrArray, $propertyPath, null);
    }

    public function getValue(object|array $objectOrArray, PropertyPathInterface|string $propertyPath): mixed
    {
        /**
         * Specific case of normalized data returned as null instead of being just transformed
         */
        $value = $this->decoratedPropertyAccessor->getValue($objectOrArray, $propertyPath);

        if (false === $value instanceof OdooRelation) {
            return $value;
        }

        if (null !== $value->getCommand()) {
            return $value;
        }

        if (null !== $value->getId()) {
            return $value;
        }

        return null;
    }

    public function isWritable(object|array $objectOrArray, PropertyPathInterface|string $propertyPath): bool
    {
        return $this->decoratedPropertyAccessor->isWritable($objectOrArray, $propertyPath);
    }

    public function isReadable(object|array $objectOrArray, PropertyPathInterface|string $propertyPath): bool
    {
        return $this->decoratedPropertyAccessor->isReadable($objectOrArray, $propertyPath);
    }
}
