<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer\Factory;

use Symfony\Component\Serializer\Serializer;

interface SerializerFactoryInterface
{
    public function create(): Serializer;

    public function setupNormalizers(): array;

    public function setupEncoders(): array;
}