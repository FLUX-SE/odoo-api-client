<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class OdooRelationsNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function supportsNormalization($data, $format = null): bool
    {
        if (false === is_array($data)) {
            return false;
        }

        foreach ($data as $value) {
            if ($value instanceof OdooRelation) {
                return true;
            }
        }

        return false;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        if (false === $this->supportsNormalization($object, $format)) {
            throw new NotNormalizableValueException(sprintf(
                'The object should be an array of item being instance of "%s" !',
                OdooRelation::class
            ));
        }

        if ([] === $object) {
            return $object;
        }

        $normalizeForUpdate = $context[OdooNormalizer::NORMALIZE_FOR_UPDATE] ?? false;
        $relations = [];
        /** @var OdooRelation[] $object */
        foreach ($object as $odooRelation) {
            $normalized = $this->normalizer->normalize($odooRelation, $format, $context);
            if (!$normalizeForUpdate) {
                $relations[] = $normalized;
                continue;
            }

            if (false === $normalized) {
                continue;
            }
            if (is_array($normalized)) {
                $relations[] = $normalized;
            }
        }

        if ([] === $relations) {
            return [];
        }

        return $relations;
    }
}
