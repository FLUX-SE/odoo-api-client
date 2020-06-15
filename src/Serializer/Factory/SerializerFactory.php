<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer\Factory;

use Flux\OdooApiClient\Serializer\XmlRpcDecoder;
use Flux\OdooApiClient\Serializer\XmlRpcEncoder;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class SerializerFactory implements SerializerFactoryInterface
{
    public function create(): Serializer
    {
        $normalizers = $this->setupNormalizers();

        $encoders = $this->setupEncoders();

        return new Serializer(
            $normalizers,
            $encoders
        );
    }

    public function setupNormalizers(): array
    {
        return [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                null,
                new CamelCaseToSnakeCaseNameConverter(),
                null,
                new PropertyInfoExtractor(
                    [
                        new ReflectionExtractor(),
                    ],
                    [
                        new PhpDocExtractor(),
                        new ReflectionExtractor(),
                    ],
                    [
                        new PhpDocExtractor(),
                    ],
                    [
                        new ReflectionExtractor(),
                    ],
                    [
                        new ReflectionExtractor(),
                    ]
                )
            ),
        ];
    }

    public function setupEncoders(): array
    {
        return [
            new XmlRpcEncoder(),
            new XmlRpcDecoder(),
        ];
    }
}
