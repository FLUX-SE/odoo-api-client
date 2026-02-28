<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\OdooRelationsNormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\TestModel\V16\Object\Account\Move\Line as LineV16;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Move\Line as LineV17;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Move\Line as LineV18;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Move\Line as LineV19;

class OdooRelationsNormalizerTest extends TestCase
{
    private Serializer $serializer;

    private int $odooVersion;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();

        // Determine Odoo version from available Line class
        if (class_exists(LineV16::class)) {
            $this->odooVersion = 16;
        } elseif (class_exists(LineV17::class)) {
            $this->odooVersion = 17;
        } elseif (class_exists(LineV18::class)) {
            $this->odooVersion = 18;
        } else {
            $this->odooVersion = 19;
        }
    }

    /**
     * Get the appropriate Line class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getLineClass(): string
    {
        /** @var class-string<BaseInterface> $lineClass */
        $lineClass = match (true) {
            $this->odooVersion <= 16 => LineV16::class,
            $this->odooVersion <= 17 => LineV17::class,
            $this->odooVersion <= 18 => LineV18::class,
            default => LineV19::class,
        };

        return $lineClass;
    }

    public function testNormalize(): void
    {
        $object = $this->createLineWithTax();

        $arr = $this->serializer->normalize($object);

        self::assertEquals([
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

        self::assertEquals([
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

        self::assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [],
            'display_type' => '',
        ], $arr);

        $arr = $this->serializer->normalize($object);

        self::assertEquals([
            'move_id' => false,
            'currency_id' => false,
            'tax_ids' => [10],
            'display_type' => '',
        ], $arr);
    }

    private function createLineWithTax(): BaseInterface
    {
        $lineClass = $this->getLineClass();
        $line = new $lineClass(new OdooRelation(false), new OdooRelation(false), '');
        self::assertTrue(method_exists($line, 'addTaxIds'));
        $line->addTaxIds(new OdooRelation(10));

        return $line;
    }
}
