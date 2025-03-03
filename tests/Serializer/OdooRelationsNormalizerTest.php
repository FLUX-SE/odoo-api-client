<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\OdooRelationsNormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move\Line;

class OdooRelationsNormalizerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();
    }

    public function testNormalize(): void
    {
        $object = $this->createLineWithTax();

        $arr = $this->serializer->normalize($object);

        $this->assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [10],
            'display_type' => '',
        ], $arr);
    }

    public function testNormalizeForUpdate(): void
    {
        $object = $this->createLineWithTax();

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        $this->assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [],
            'display_type' => '',
        ], $arr);
    }

    public function testNormalizeForUpdateThenNot(): void
    {
        $object = $this->createLineWithTax();

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        $this->assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [],
            'display_type' => '',
        ], $arr);

        $arr = $this->serializer->normalize($object);

        $this->assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [10],
            'display_type' => '',
        ], $arr);
    }

    private function createLineWithTax(): Line
    {
        $line = new Line(new OdooRelation(false), new OdooRelation(false), '');

        $line->addTaxIds(new OdooRelation(10));

        return $line;
    }
}
