<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class OdooRelationsDenormalizer implements DenormalizerInterface
{
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        return is_int($data);
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (is_int($data)) {
            return new OdooRelation($data);
        }

        throw new InvalidArgumentException('The data should be an integer !');
    }
}
