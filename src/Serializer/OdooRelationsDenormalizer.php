<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * [1, 4] ==> [new OdooRelation(1), new OdooRelation(4)]
 */
final class OdooRelationsDenormalizer implements DenormalizerInterface
{
    public function getSupportedTypes(?string $format): array
    {
        return [OdooRelation::class => false];
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        if (false === is_array($data)) {
            return false;
        }

        if ($data !== array_filter($data, 'is_int')) {
            return false;
        }

        return true;
    }

    public function denormalize($data, $type, $format = null, array $context = []): array
    {
        if (false === is_array($data)) {
            throw new InvalidArgumentException('The data should be an array !');
        }

        $relations = [];
        foreach ($data as $id) {
            $relations[] = new OdooRelation($id);
        }

        return $relations;
    }
}
