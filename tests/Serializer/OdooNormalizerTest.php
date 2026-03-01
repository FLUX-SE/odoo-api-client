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
use Tests\FluxSE\OdooApiClient\Serializer\Model\Foo;

class OdooNormalizerTest extends TestCase
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

    public function testNormalizeForUpdate(): void
    {
        $object = $this->createPartner(new OdooRelation(false), new OdooRelation(false));
        self::assertTrue(method_exists($object, 'setMessageIds'));
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        if (method_exists($object, 'getAutopostBills')) {
            self::assertEquals([
                'message_ids' => [],
                'autopost_bills' => 'never',
            ], $arr);
        } else {
            self::assertEquals([
                'message_ids' => [],
                'property_account_payable_id' => false,
                'property_account_receivable_id' => false,
            ], $arr);
        }
    }
    public function testNormalizeForUpdateWithNullData(): void
    {
        $object = $this->createPartner(new OdooRelation(null), new OdooRelation(null));
        self::assertTrue(method_exists($object, 'setMessageIds'));
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object, null, [
            OdooRelationsNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);

        if (method_exists($object, 'getAutopostBills')) {
            self::assertEquals([
                'message_ids' => [],
                'autopost_bills' => 'never',
            ], $arr);
        } else {
            self::assertEquals([
                'message_ids' => [],
            ], $arr);
        }
    }
    public function testNormalize(): void
    {
        $object = $this->createPartner(new OdooRelation(false), new OdooRelation(false));
        self::assertTrue(method_exists($object, 'setMessageIds'));
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object);

        if (method_exists($object, 'getAutopostBills')) {
            self::assertEquals([
                'message_ids' => [
                    10,
                    20,
                    30,
                ],
                'autopost_bills' => 'never',
            ], $arr);
        } else {
            self::assertEquals([
                'message_ids' => [
                    10,
                    20,
                    30,
                ],
                'property_account_payable_id' => false,
                'property_account_receivable_id' => false,
            ], $arr);
        }
    }
    public function testNormalizeWithNullData(): void
    {
        $object = $this->createPartner(new OdooRelation(null), new OdooRelation(null));
        self::assertTrue(method_exists($object, 'setMessageIds'));
        $object->setMessageIds([
            new OdooRelation(10),
            new OdooRelation(20),
            new OdooRelation(30),
        ]);

        $arr = $this->serializer->normalize($object);

        if (method_exists($object, 'getAutopostBills')) {
            self::assertEquals([
                'message_ids' => [
                    10,
                    20,
                    30,
                ],
                'autopost_bills' => 'never',
            ], $arr);
        } else {
            self::assertEquals([
                'message_ids' => [
                    10,
                    20,
                    30,
                ],
            ], $arr);
        }
    }

    public function testDenormalizeFalsePseudoType(): void
    {
        // when denormalizing some data into an object where an attribute uses the false pseudo type
        /** @var Foo $object */
        $object = $this->serializer->denormalize(['id' => 2], Foo::class);

        // then the attribute that declared false was filled correctly
        self::assertEquals(2, $object->getId());
    }

    private function createPartner(OdooRelation $payableRel, OdooRelation $receivableRel): BaseInterface
    {
        $partnerClass = $this->getResPartnerClass();
        $reflexion = new \ReflectionClass($partnerClass);
        $constructor = $reflexion->getConstructor();
        self::assertNotNull($constructor);

        if (count($constructor->getParameters()) === 1) {
            return new $partnerClass('never');
        }

        return new $partnerClass($payableRel, $receivableRel);
    }
}
