<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\Factory;

use Doctrine\Common\Annotations\AnnotationReader;
use FluxSE\OdooApiClient\Serializer\NullOdooRelationDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooDateTimeNormalizer;
use FluxSE\OdooApiClient\Serializer\OdooNormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationDenormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationNormalizer;
use FluxSE\OdooApiClient\Serializer\OdooRelationsDenormalizer;
use FluxSE\OdooApiClient\Serializer\XmlRpcDecoder;
use FluxSE\OdooApiClient\Serializer\XmlRpcEncoder;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Extractor\SerializerExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
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

        return [
            new ArrayDenormalizer(),
            new OdooDateTimeNormalizer([
                DateTimeNormalizer::FORMAT_KEY => $this->dateFormat,
            ]),
            new OdooRelationNormalizer(),
            new NullOdooRelationDenormalizer(),
            new OdooRelationDenormalizer(),
            new OdooRelationsDenormalizer(),
            $objectNormalizer,
        ];
    }

    public function setupEncoders(): array
    {
        return [
            new XmlRpcEncoder(),
            new XmlRpcDecoder(),
        ];
    }

    public function setupObjectNormalizer(): OdooNormalizer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $metadataAwareNameConverter = new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        return new OdooNormalizer(
            $classMetadataFactory,
            $metadataAwareNameConverter,
            null,
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
                AbstractObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                    return $object->getId() ?? 0;
                }
            ]
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
