<?php

namespace Tests\FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\OdooRelationsNormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\Serializer\Model\Foo;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner;

class OdooNormalizerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();
    }

    public function testNormalizeForUpdate(): void
    {
        $object = new Partner(
            new OdooRelation(false),
            new OdooRelation(false),
        );
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        $this->assertEquals([
            'message_ids' => [],
            'property_account_payable_id' => false,
            'property_account_receivable_id' => false,
        ], $arr);
    }
    public function testNormalizeForUpdateWithNullData(): void
    {
        $object = new Partner(
            new OdooRelation(null),
            new OdooRelation(null),
        );
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        $this->assertEquals([
            'message_ids' => [],
        ], $arr);
    }
    public function testNormalize(): void
    {
        $object = new Partner(
            new OdooRelation(false),
            new OdooRelation(false),
        );
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object);

        $this->assertEquals([
            'message_ids' => [
                10,
                20,
                30,
            ],
            'property_account_payable_id' => false,
            'property_account_receivable_id' => false,
        ], $arr);
    }
    public function testNormalizeWithNullData(): void
    {
        $object = new Partner(
            new OdooRelation(null),
            new OdooRelation(null),
        );
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object);

        $this->assertEquals([
            'message_ids' => [
                10,
                20,
                30,
            ],
        ], $arr);
    }

    public function testDenormalizeFalsePseudoType(): void
    {
        // when denormalizing some data into an object where an attribute uses the false pseudo type
        /** @var Foo $object */
        $object = $this->serializer->denormalize(['id' => 2], Foo::class);

        // then the attribute that declared false was filled correctly
        $this->assertEquals(2, $object->getId());
    }
}
