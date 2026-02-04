<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Factory;

use FluxSE\OdooApiClient\Serializer\OdooNormalizer;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

interface SerializerFactoryInterface
{
    public function create(): Serializer;

    /**
     * @return array<array-key, NormalizerInterface|DenormalizerInterface>
     */
    public function setupNormalizers(): array;

    /**
     * @return array<array-key, EncoderInterface|DecoderInterface>
     */
    public function setupEncoders(): array;

    public function setupObjectNormalizer(): OdooNormalizer;

    public function setupPropertyAccessor(): PropertyAccessorInterface;
}
