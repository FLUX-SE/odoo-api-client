<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use PHPUnit\Framework\TestCase;

abstract class Json2IntegrationTestCase extends TestCase
{
    protected function requireJson2Environment(bool $requiresWrites = false): Json2IntegrationEnvironment
    {
        $environment = Json2IntegrationEnvironment::fromEnvironment();
        $missingReason = $environment->getMissingReason($requiresWrites);
        if (null !== $missingReason) {
            self::markTestSkipped($missingReason);
        }

        $environment->assertSafe($requiresWrites);

        return $environment;
    }
}
