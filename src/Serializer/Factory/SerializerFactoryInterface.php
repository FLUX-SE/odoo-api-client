<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Factory;

use FluxSE\OdooApiClient\Serializer\OdooNormalizer;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Serializer\Serializer;

interface SerializerFactoryInterface
{
    public function create(): Serializer;

    public function setupNormalizers(): array;

    public function setupEncoders(): array;

    public function setupObjectNormalizer(): OdooNormalizer;

    public function setupPropertyAccessor(): PropertyAccessorInterface;
}
