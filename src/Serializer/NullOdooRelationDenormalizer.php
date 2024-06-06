<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * false ==> null
 */
final class NullOdooRelationDenormalizer implements DenormalizerInterface
{
    public function getSupportedTypes(?string $format): array
    {
        return [OdooRelation::class => false];
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        // Case of null value (false in XMLRPC python API)
        return false === $data;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (false === $data) {
            return null;
        }

        throw new InvalidArgumentException('The data should be a false boolean !');
    }
}
