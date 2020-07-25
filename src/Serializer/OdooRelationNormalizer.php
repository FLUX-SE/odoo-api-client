<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class OdooRelationNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        if ($type !== OdooRelation::class) {
            return false;
        }

        // Case of null value (false in XMLRPC python API)
        if (false === $data) {
            return true;
        }

        // Case of many2many relation
        if (is_int($data)) {
            return true;
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
        if (false === $data) {
            return null;
        }

        if (is_int($data)) {
            return new OdooRelation($data);
        }

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
