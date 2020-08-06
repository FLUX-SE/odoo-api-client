<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class OdooRelationDenormalizer implements DenormalizerInterface
{
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        if (false === is_array($data)) {
            return false;
        }

        if (empty($data)) {
            return false;
        }

        if (count($data) > 2) {
            return false;
        }

        return true;
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (false === is_array($data)) {
            throw new InvalidArgumentException('The data should be an array !');
        }

        if (false === is_int($data[0] ?? null)) {
            throw new InvalidArgumentException(
                'The first element of the $data array should be an integer value !'
            );
        }

        return new OdooRelation($data[0], $data[1] ?? null);
    }
}