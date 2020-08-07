<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class OdooNormalizer extends ObjectNormalizer
{
    /**
     * @param object $object
     * @param string $attribute
     * @param mixed $value
     * @param string|null $format
     * @param array $context
     */
    protected function setAttributeValue(object $object, string $attribute, $value, string $format = null, array $context = []): void
    {
        /**
         * Override to set null when original value is false
         *
         * Because null value is transformed to false by Odoo API
         * There is no other way to do it simply with any features given by Symfony Serializer
         */

        parent::setAttributeValue($object, $attribute, $value, $format, $context);

        if (false !== $value) {
            return;
        }

        try {
            $newValue = parent::getAttributeValue($object, $attribute, $format, $context);
        } catch (NoSuchPropertyException $e) {
            // ignore not found properties like the setAttributeValue above
            return;
        }

        if ($value === $newValue) {
            return;
        }

        parent::setAttributeValue($object, $attribute, null, $format, $context);
    }
}