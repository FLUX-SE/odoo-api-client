<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer\Factory;

use Doctrine\Common\Annotations\AnnotationReader;
use Flux\OdooApiClient\Serializer\NullOdooRelationDenormalizer;
use Flux\OdooApiClient\Serializer\OdooRelationDenormalizer;
use Flux\OdooApiClient\Serializer\OdooRelationNormalizer;
use Flux\OdooApiClient\Serializer\OdooRelationsDenormalizer;
use Flux\OdooApiClient\Serializer\XmlRpcDecoder;
use Flux\OdooApiClient\Serializer\XmlRpcEncoder;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Extractor\SerializerExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class SerializerFactory implements SerializerFactoryInterface
{
    /** @var string */
    private $dateFormat = 'Y-m-d H:i:s';

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
            new DateTimeNormalizer([
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

    /**
     * @return ObjectNormalizer
     */
    public function setupObjectNormalizer(): ObjectNormalizer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $metadataAwareNameConverter = new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        return new ObjectNormalizer(
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
                ObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
                // => model to array
                ObjectNormalizer::SKIP_NULL_VALUES => true,
                ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                    return $object->getId() ?? 0;
                }
            ],
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
