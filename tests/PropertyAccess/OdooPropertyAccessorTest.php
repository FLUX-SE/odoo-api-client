<?php

namespace Tests\FluxSE\OdooApiClient\PropertyAccess;

use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\PropertyAccess\OdooPropertyAccessor;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Tests\FluxSE\OdooApiClient\PropertyAccess\Model\Foo;

class OdooPropertyAccessorTest extends TestCase
{
    private PropertyAccessorInterface $propertyAccessor;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();

        $this->propertyAccessor = $serializerFactory->setupPropertyAccessor();
    }

    public function testConstruct(): void
    {
        self::assertInstanceOf(OdooPropertyAccessor::class, $this->propertyAccessor);
    }

    public function testSetValueFalseValueBecomeNull(): void
    {
        $object = new Foo();
        $object->setActivityState('aString');
        $this->propertyAccessor->setValue($object, 'activityState', false);

        self::assertInstanceOf(Foo::class, $object); // Needed for PHPStan :(
        self::assertEquals(null, $object->getActivityState());
    }

    public function testGetValueOdooRelationValueBecomeNull(): void
    {
        $object = new Foo();
        $object->setMoveId(new OdooRelation());
        $value = $this->propertyAccessor->getValue($object, 'moveId');

        self::assertEquals(new OdooRelation(), $object->getMoveId());
        self::assertNull($value);
    }
}
