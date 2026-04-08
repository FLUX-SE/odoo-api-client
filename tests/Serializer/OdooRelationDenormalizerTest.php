<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Serializer;

class OdooRelationDenormalizerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();
    }

    public function testDenormalizeWithIntId(): void
    {
        /** @var OdooRelation $relation */
        $relation = $this->serializer->denormalize([123, 'Test Name'], OdooRelation::class);

        self::assertInstanceOf(OdooRelation::class, $relation);
        self::assertEquals(123, $relation->getId());
        self::assertEquals('Test Name', $relation->getDisplayName());
    }

    public function testDenormalizeWithStringId(): void
    {
        /** @var OdooRelation $relation */
        $relation = $this->serializer->denormalize(['456', 'Test Name'], OdooRelation::class);

        self::assertInstanceOf(OdooRelation::class, $relation);
        self::assertEquals(456, $relation->getId());
        self::assertEquals('Test Name', $relation->getDisplayName());
    }

    public function testDenormalizeWithIdOnly(): void
    {
        /** @var OdooRelation $relation */
        $relation = $this->serializer->denormalize([789, 'Test Name'], OdooRelation::class);

        self::assertInstanceOf(OdooRelation::class, $relation);
        self::assertEquals(789, $relation->getId());
        self::assertEquals('Test Name', $relation->getDisplayName());
    }

    public function testDenormalizeWithEmptyDisplayName(): void
    {
        /** @var OdooRelation $relation */
        $relation = $this->serializer->denormalize([321, ''], OdooRelation::class);

        self::assertInstanceOf(OdooRelation::class, $relation);
        self::assertEquals(321, $relation->getId());
        self::assertEquals('', $relation->getDisplayName());
    }

    public function testDenormalizeWithFalseDisplayName(): void
    {
        /** @var OdooRelation $relation */
        $relation = $this->serializer->denormalize([123, false], OdooRelation::class);

        self::assertInstanceOf(OdooRelation::class, $relation);
        self::assertEquals(123, $relation->getId());
        self::assertNull($relation->getDisplayName());
    }

    public function testDenormalizeWithInvalidId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first element of the $data array must be an integer value!');

        $this->serializer->denormalize(['not-a-number', 'Test Name'], OdooRelation::class);
    }

    public function testDenormalizeWithNullId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first element of the $data array must be an integer value!');

        $this->serializer->denormalize([null, 'Test Name'], OdooRelation::class);
    }

    public function testDenormalizeWithFalseId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first element of the $data array must be an integer value!');

        $this->serializer->denormalize([false, 'Test Name'], OdooRelation::class);
    }
}
