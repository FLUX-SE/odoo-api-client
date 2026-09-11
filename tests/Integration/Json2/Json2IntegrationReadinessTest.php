<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapperInterface;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2IntegrationReadinessTest extends Json2IntegrationTestCase
{
    public function testReadEnvironmentAndNativeDependenciesAreReady(): void
    {
        $environment = $this->requireJson2Environment();

        self::assertTrue(interface_exists(Json2ClientInterface::class));
        self::assertTrue(interface_exists(CallMapperInterface::class));
        self::assertStringContainsString('/json/2/', $environment->createConnection()->getEndpointUri('res.partner', 'search'));
    }

    public function testWriteEnvironmentRequiresItsIndependentOptIn(): void
    {
        $environment = $this->requireJson2Environment(true);

        self::assertNotSame('', $environment->runId());
    }
}
