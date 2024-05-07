<?php

namespace Tests\FluxSE\OdooApiClient\Serializer;

use DateTimeImmutable;
use DateTimeInterface;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\Serializer\Model\Foo;

class OdooDateTimeNormalizerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $serializerFactory = new SerializerFactory();
        $this->serializer = $serializerFactory->create();
    }

    public function testDenormalize(): void
    {
        $date = '2023-07-24';

        $arr = $this->serializer->denormalize($date, DateTimeInterface::class);

        $this->assertEquals(new DateTimeImmutable('2023-07-24'), $arr);
    }

    public function testDenormalizeInObject(): void
    {
        $arr = [
            'date' => '2023-07-24',
        ];

        $foo = $this->serializer->denormalize($arr, Foo::class);

        $expectedFoo = new Foo();

        $expectedFoo->setDate(new DateTimeImmutable('2023-07-24'));
        $this->assertEquals($expectedFoo, $foo);
    }

    public function testDenormalizeInObjectWithFalse(): void
    {
        $arr = [
            'date' => false,
        ];

        $partner = $this->serializer->denormalize($arr, Foo::class);

        $expectedFoo = new Foo();
        // $expectedFoo->setDate(null);
        $this->assertEquals($expectedFoo, $partner);
    }
}
