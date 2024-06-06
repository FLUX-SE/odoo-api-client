<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class NullableDateTimeDenormalizer implements DenormalizerInterface
{
    public function __construct(private DenormalizerInterface $dateTimeNormalizer)
    {
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            \DateTimeInterface::class => false,
            \DateTimeImmutable::class => false,
            \DateTime::class => false,
        ];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return null;
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        if (!\is_string($data) || '' === trim($data)) {
            return $this->dateTimeNormalizer->supportsDenormalization($data, $type, $format);
        }

        return false;
    }
}
