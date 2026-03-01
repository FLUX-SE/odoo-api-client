<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use FluxSE\OdooApiClient\Serializer\OdooRelationsNormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\OdooVersionedClassProviderTrait;
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;

class OdooRelationsNormalizerTest extends TestCase
{
    use CommonOperationsTrait,
        OdooVersionedClassProviderTrait;

    private Serializer $serializer;

    private int $odooVersion;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();
        $this->odooVersion = $this->buildCommonOperations()->version()->getServerVersionInfo()[0];
    }

    protected function getOdooVersion(): int
    {
        return $this->odooVersion;
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
        $lineClass = $this->getAccountMoveLineClass();
        $line = new $lineClass(new OdooRelation(false), new OdooRelation(false), '');
        self::assertTrue(method_exists($line, 'addTaxIds'));
        $line->addTaxIds(new OdooRelation(10));

        return $line;
    }
}
