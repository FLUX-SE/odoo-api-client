<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class SerializerBuilder
{
    public function build(): Serializer
    {
        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                null,
                null,
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

        return new Serializer(
            $normalizers,
            [
                'xml' => new XmlEncoder(),
            ]
        );
    }
}
