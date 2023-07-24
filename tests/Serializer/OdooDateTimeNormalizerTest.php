<?php

namespace Tests\FluxSE\OdooApiClient\Serializer;

use DateTimeImmutable;
use DateTimeInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Serializer\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner;

class OdooDateTimeNormalizerTest extends TestCase
{
    /** @var Serializer  */
    private $serializer;

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
            'property_account_payable_id' => 10,
            'property_account_receivable_id' => 11,
        ];

        $partner = $this->serializer->denormalize($arr, Partner::class);

        $expectedPartner = new Partner(
            new OdooRelation(10),
            new OdooRelation(11),
        );
        $expectedPartner->setDate(new DateTimeImmutable('2023-07-24'));
        $this->assertEquals($expectedPartner, $partner);
    }

    public function testDenormalizeInObjectWithFalse(): void
    {
        $arr = [
            'date' => false,
            'property_account_payable_id' => 10,
            'property_account_receivable_id' => 11,
        ];

        $partner = $this->serializer->denormalize($arr, Partner::class);

        $expectedPartner = new Partner(
            new OdooRelation(10),
            new OdooRelation(11),
        );
        // $expectedPartner->setDate(null);
        $this->assertEquals($expectedPartner, $partner);
    }
}
