<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final class OdooDateTimeNormalizer extends DateTimeNormalizer
{
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        if (false === $data) {
            return null;
        }

        return parent::denormalize($data, $type, $format, $context);
    }
}
