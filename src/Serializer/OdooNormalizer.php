<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Api\FaultInterface;
use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Common\Version;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class OdooNormalizer extends ObjectNormalizer
{
    public const NORMALIZE_FOR_UPDATE = 'normalize_for_update';

    public function getSupportedTypes(?string $format): array
    {
        return [
            BaseInterface::class => true,
            RequestBodyInterface::class => true,
            FaultInterface::class => true,
            Version::class => true,
        ];
    }

    protected function setAttributeValue(object $object, string $attribute, mixed $value, string $format = null, array $context = []): void
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

        if (false === $newValue) {
            return;
        }

        parent::setAttributeValue($object, $attribute, null, $format, $context);
    }

    protected function getAttributeValue(object $object, string $attribute, string $format = null, array $context = []): mixed
    {
        /**
         * Specific case of normalized data returned as null instead of being just transformed
         */
        $value = parent::getAttributeValue($object, $attribute, $format, $context);

        $skipNullValue = $context[self::SKIP_NULL_VALUES] ?? $this->defaultContext[self::SKIP_NULL_VALUES] ?? false;
        if (!$skipNullValue) {
            return $value;
        }

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
}
