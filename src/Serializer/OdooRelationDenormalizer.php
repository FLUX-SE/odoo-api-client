<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * [123, "Foo"] ==> new OdooRelation(123, "Foo")
 */
final class OdooRelationDenormalizer implements DenormalizerInterface
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

    public function denormalize($data, $type, $format = null, array $context = []): OdooRelation
    {
        if (false === is_array($data)) {
            throw new InvalidArgumentException('The data must be an array!');
        }

        $id = $data[0] ?? null;
        if ($id === null || false === is_numeric($id)) {
            throw new InvalidArgumentException(
                'The first element of the $data array must be an integer value!'
            );
        }

        return new OdooRelation((int) $id, $data[1] ?? null);
    }
}
