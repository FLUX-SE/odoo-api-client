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
    /** @return array<string, bool> */
    public function getSupportedTypes(?string $format): array
    {
        return [OdooRelation::class => false];
    }

    /** @param array<string, mixed> $context */
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

    /** @param array<string, mixed> $context */
    public function denormalize($data, $type, $format = null, array $context = []): OdooRelation
    {
        if (false === is_array($data)) {
            throw new InvalidArgumentException('The data must be an array!');
        }

        /** @var int|string|false|null $id */
        $id = $data[0] ?? null;
        if ($id === null || false === is_numeric($id)) {
            throw new InvalidArgumentException(
                'The first element of the $data array must be an integer value!'
            );
        }

        /** @var string|false|null $displayName */
        $displayName = $data[1] ?? null;
        $displayName = false === $displayName ? null : (string) $displayName; // Something false is returned by the API
        return new OdooRelation((int) $id, $displayName);
    }
}
