<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Factory;

use FluxSE\OdooApiClient\PropertyAccess\OdooPropertyAccessor;
use FluxSE\OdooApiClient\Serializer\JsonRpc\JsonRpcDecoder;
use FluxSE\OdooApiClient\Serializer\JsonRpc\JsonRpcEncoder;
use FluxSE\OdooApiClient\Serializer\NullableDateTimeDenormalizer;
use FluxSE\OdooApiClient\Serializer\NullOdooRelationDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooNormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationNormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationsDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationSingleDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationsNormalizer;
use FluxSE\OdooApiClient\Serializer\XmlRpc\XmlRpcDecoder;
use FluxSE\OdooApiClient\Serializer\XmlRpc\XmlRpcEncoder;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Extractor\SerializerExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\Mapping\Loader\LoaderInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class SerializerFactory implements SerializerFactoryInterface
{
    private string $dateFormat = 'Y-m-d H:i:s';

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
        $objectNormalizer = $this->setupObjectNormalizer();

        $dateTimeNormalizer = new DateTimeNormalizer([
            DateTimeNormalizer::FORMAT_KEY => $this->dateFormat,
        ]);
        return [
            new ArrayDenormalizer(),
            new OdooRelationsDenormalizer(),
            new NullableDateTimeDenormalizer($dateTimeNormalizer),
            $dateTimeNormalizer,
            new OdooRelationsNormalizer(),
            new OdooRelationNormalizer(),
            new NullOdooRelationDenormalizer(),
            new OdooRelationDenormalizer(),
            new OdooRelationSingleDenormalizer(),
            $objectNormalizer,
        ];
    }

    public function setupEncoders(): array
    {
        return [
            new JsonRpcEncoder(),
            new JsonRpcDecoder(),
            new XmlRpcEncoder(),
            new XmlRpcDecoder(),
        ];
    }

    public function setupObjectNormalizer(): OdooNormalizer
    {
        $loader = new AttributeLoader();

        $classMetadataFactory = new ClassMetadataFactory($loader);
        $metadataAwareNameConverter = new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        return new OdooNormalizer(
            new ObjectNormalizer(
                $classMetadataFactory,
                $metadataAwareNameConverter,
                new OdooPropertyAccessor($propertyAccessor),
                new PropertyInfoExtractor(
                    [
                        new ReflectionExtractor(),
                        new SerializerExtractor($classMetadataFactory),
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
                ),
                null,
                null,
                [
                    // => array to model
                    AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
                    // => model to array
                    AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
                    AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                        return $object->getId() ?? 0;
                    }
                ]
            )
        );
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }
}
