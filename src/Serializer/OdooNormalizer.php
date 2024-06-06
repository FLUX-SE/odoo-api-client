<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Api\FaultInterface;
use FluxSE\OdooApiClient\Api\RequestBodyInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Common\Version;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class OdooNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    public function __construct(private ObjectNormalizer $decoratedObjectNormalizer)
    {
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            BaseInterface::class => true,
            RequestBodyInterface::class => true,
            FaultInterface::class => true,
            Version::class => true,
        ];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return $this->decoratedObjectNormalizer->denormalize($data, $type, $format, $context);
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->decoratedObjectNormalizer->supportsDenormalization($data, $type, $format, $context);
    }

    public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return $this->decoratedObjectNormalizer->normalize($object, $format, $context);
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $this->decoratedObjectNormalizer->supportsNormalization($data, $format, $context);
    }

    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->decoratedObjectNormalizer->setSerializer($serializer);
    }
}
