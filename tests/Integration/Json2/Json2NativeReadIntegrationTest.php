<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2NativeReadIntegrationTest extends Json2IntegrationTestCase
{
    public function testTheConnectedServerIsOdoo19(): void
    {
        $client = $this->nativeClient();
        $response = $client->call('ir.module.module', 'search_read', [
            'domain' => [['name', '=', 'base']],
            'fields' => ['installed_version'],
            'limit' => 1,
        ]);
        $modules = $client->decode($response);

        self::assertIsArray($modules);
        self::assertCount(1, $modules, 'The disposable database must have the base module installed.');
        self::assertIsArray($modules[0]);
        self::assertArrayHasKey('installed_version', $modules[0]);
        self::assertIsString($modules[0]['installed_version']);
        self::assertStringStartsWith('19.', $modules[0]['installed_version']);
    }

    public function testNativeSearchCountSearchReadAndRead(): void
    {
        $client = $this->nativeClient();
        $searchResponse = $client->call('res.partner', 'search', [
            'domain' => [],
            'limit' => 1,
        ]);
        $ids = $client->decode($searchResponse);
        self::assertIsArray($ids);
        self::assertContainsOnly('int', $ids);

        $count = $client->decode($client->call('res.partner', 'search_count', ['domain' => []]));
        self::assertIsInt($count);
        self::assertGreaterThanOrEqual(count($ids), $count);

        $records = $client->decode($client->call('res.partner', 'search_read', [
            'domain' => [],
            'fields' => ['id', 'display_name'],
            'limit' => 1,
        ]));
        self::assertIsArray($records);
        self::assertLessThanOrEqual(1, count($records));

        if ([] !== $ids) {
            $read = $client->decode($client->call('res.partner', 'read', [
                'ids' => [$ids[0]],
                'fields' => ['id', 'display_name'],
            ]));
            self::assertIsArray($read);
            self::assertCount(1, $read);
            self::assertIsArray($read[0]);
            self::assertSame($ids[0], $read[0]['id'] ?? null);
        }
    }

    public function testNativeFieldsDefaultsAndCurrentUserContext(): void
    {
        $client = $this->nativeClient();
        $fields = $client->decode($client->call('res.partner', 'fields_get', [
            'allfields' => ['name', 'company_id'],
            'attributes' => ['type', 'required'],
        ]));
        self::assertIsArray($fields);
        self::assertArrayHasKey('name', $fields);

        $defaults = $client->decode($client->call('res.partner', 'default_get', [
            'fields' => ['name', 'company_id'],
        ]));
        self::assertIsArray($defaults);

        $context = $client->decode($client->call('res.users', 'context_get'));
        self::assertIsArray($context);
        self::assertIsInt($context['uid'] ?? null);

        $forwardedContext = [];
        foreach (['lang', 'tz', 'allowed_company_ids'] as $name) {
            if (array_key_exists($name, $context)) {
                $forwardedContext[$name] = $context[$name];
            }
        }
        $contextualResult = $client->decode($client->call('res.partner', 'search', [
            'domain' => [],
            'limit' => 1,
            'context' => $forwardedContext,
        ]));
        self::assertIsArray($contextualResult);
    }

    private function nativeClient(): Json2ClientInterface
    {
        return $this->requireJson2Environment()->createBuilder()->buildJson2Client();
    }
}
