<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\InspectionCallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use PHPUnit\Framework\TestCase;

final class InspectionCallMapperTest extends TestCase
{
    public function testItMapsTheHistoricalFlatFieldListThroughADedicatedEntryPoint(): void
    {
        $mapper = new InspectionCallMapper(new CallMapper(new MethodSignatureRegistry()));

        $call = $mapper->mapFieldsGet(
            'res.partner',
            ['name', 'email'],
            ['attributes' => ['string', 'type']],
        );

        self::assertSame([
            'allfields' => ['name', 'email'],
            'attributes' => ['string', 'type'],
        ], $call->getParameters());
    }

    public function testAnEmptyWrapperFieldListRemainsAnExplicitEmptyAllfieldsList(): void
    {
        $mapper = new InspectionCallMapper(new CallMapper(new MethodSignatureRegistry()));

        self::assertSame(['allfields' => []], $mapper->mapFieldsGet('res.partner')->getParameters());
    }

    public function testItDoesNotGuessWhetherAFlatLowLevelListMeansAllfields(): void
    {
        $mapper = new CallMapper(new MethodSignatureRegistry());

        $call = $mapper->map('res.partner', 'fields_get', ['name', 'email']);

        self::assertSame(['allfields' => 'name', 'attributes' => 'email'], $call->getParameters());
    }

    public function testTheDedicatedEntryPointRejectsNonStringFields(): void
    {
        $mapper = new InspectionCallMapper(new CallMapper(new MethodSignatureRegistry()));
        $this->expectException(InvalidCallMappingException::class);

        $mapper->mapFieldsGet('res.partner', ['name', 12]);
    }
}
