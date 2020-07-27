<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class NullOdooRelationDenormalizer implements DenormalizerInterface
{
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        // Case of null value (false in XMLRPC python API)
        return false === $data;
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (false === $data) {
            return null;
        }

        throw new InvalidArgumentException('The data should be a false boolean !');
    }
}
