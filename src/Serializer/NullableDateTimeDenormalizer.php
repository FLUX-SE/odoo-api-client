<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class NullableDateTimeDenormalizer implements DenormalizerInterface
{
    public function __construct(private DenormalizerInterface $dateTimeNormalizer)
    {
    }

    /** @return array<string, bool> */
    public function getSupportedTypes(?string $format): array
    {
        return [
            \DateTimeInterface::class => false,
            \DateTimeImmutable::class => false,
            \DateTime::class => false,
        ];
    }

    /** @param array<string, mixed> $context */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return null;
    }

    /** @param array<string, mixed> $context */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        if (!\is_string($data) || '' === trim($data)) {
            return $this->dateTimeNormalizer->supportsDenormalization($data, $type, $format);
        }

        return false;
    }
}
