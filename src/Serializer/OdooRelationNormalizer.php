<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class OdooRelationNormalizer implements NormalizerInterface
{
    public function supportsNormalization($data, string $format = null): bool
    {
        return $data instanceof OdooRelation;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        if ($object instanceof OdooRelation) {
            return $object->getId();
        }

        throw new InvalidArgumentException(sprintf(
            'The object should be an instance of "%s" !',
            OdooRelation::class
        ));
    }
}
