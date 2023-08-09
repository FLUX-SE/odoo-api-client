<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class NullableDateTimeDenormalizer implements DenormalizerInterface
{
    public function __construct(private DenormalizerInterface $dateTimeNormalizer)
    {
    }

    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return null;
    }

    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        if (!\is_string($data) || '' === trim($data)) {
            return $this->dateTimeNormalizer->supportsDenormalization($data, $type, $format);
        }

        return false;
    }
}
