<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class OdooRelationsNormalizer implements NormalizerInterface, NormalizerAwareInterface, ContextAwareNormalizerInterface
{
    use NormalizerAwareTrait;

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        if (false === is_array($data)) {
            return false;
        }

        $normalizeForUpdate = $context[OdooNormalizer::NORMALIZE_FOR_UPDATE] ?? false;
        if (!$normalizeForUpdate) {
            return false;
        }

        foreach ($data as $value) {
            if ($value instanceof OdooRelation) {
                return true;
            }
        }

        return false;
    }

    /**
     * OdooRelation[] $object
     */
    public function normalize($object, $format = null, array $context = []): array
    {
        if (!is_array($object)) {
            throw new NotNormalizableValueException(sprintf(
                'The object should be an array of item being instance of "%s" !',
                OdooRelation::class
            ));
        }

        if ([] === $object) {
            return $object;
        }

        $relations = [];

        foreach ($object as $odooRelation) {
            $normalized = $this->normalizer->normalize($odooRelation, $format, $context);

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
