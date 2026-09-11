<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use GuzzleHttp\Psr7\Response;
use LogicException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;

final class Json2IntegrationEnvironmentTest extends TestCase
{
    public function testIntegrationIsOptIn(): void
    {
        $environment = Json2IntegrationEnvironment::fromEnvironment([]);

        self::assertStringContainsString('ODOO_JSON2_INTEGRATION=1', (string) $environment->getMissingReason());
    }

    #[DataProvider('missingVariableProvider')]
    public function testEveryReadPrerequisiteIsRequired(string $missingVariable): void
    {
        $variables = $this->safeVariables();
        unset($variables[$missingVariable]);
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);

        self::assertNotNull($environment->getMissingReason());
    }

    /** @return iterable<string, array{string}> */
    public static function missingVariableProvider(): iterable
    {
        yield 'host' => ['ODOO_JSON2_HOST'];
        yield 'database' => ['ODOO_JSON2_DATABASE'];
        yield 'API key' => ['ODOO_JSON2_API_KEY'];
        yield 'expected version' => ['ODOO_JSON2_EXPECTED_MAJOR'];
        yield 'disposable confirmation' => ['ODOO_JSON2_DISPOSABLE_DATABASE'];
    }

    public function testASecretIsNeverIncludedInAMissingOrSafetyMessage(): void
    {
        $sentinel = 'SENSITIVE_JSON2_SENTINEL';
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_API_KEY'] = $sentinel;
        $variables['ODOO_JSON2_EXPECTED_MAJOR'] = '18';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);

        try {
            $environment->assertSafe();
            self::fail('The unsafe version should have been rejected.');
        } catch (LogicException $exception) {
            self::assertStringNotContainsString($sentinel, $exception->getMessage());
        }
    }

    public function testItRejectsAnyVersionOtherThanOdoo19(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_EXPECTED_MAJOR'] = '20';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('restricted to Odoo major version 19');

        $environment->assertSafe();
    }

    public function testTheDisposableConfirmationMustExactlyMatchTheDatabase(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_DISPOSABLE_DATABASE'] = 'json2_test_other';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('must exactly match');

        $environment->assertSafe();
    }

    public function testTheDatabaseMustHaveTheDedicatedSafetyPrefix(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_DATABASE'] = 'production';
        $variables['ODOO_JSON2_DISPOSABLE_DATABASE'] = 'production';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('must start with');

        $environment->assertSafe();
    }

    public function testWritesRequireASecondOptInAndARunIdentifier(): void
    {
        $environment = Json2IntegrationEnvironment::fromEnvironment($this->safeVariables());

        self::assertStringContainsString('ODOO_JSON2_ALLOW_WRITES=1', (string) $environment->getMissingReason(true));
    }

    public function testASafeWriteEnvironmentPassesWithoutNetworkAccess(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_ALLOW_WRITES'] = '1';
        $variables['ODOO_JSON2_RUN_ID'] = 'ci-123';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);

        $environment->assertSafe(true);

        self::assertSame('https://odoo.invalid/proxy', $environment->host());
        self::assertSame('json2_test_123', $environment->database());
        self::assertSame('ci-123', $environment->runId());
        self::assertSame(
            'https://odoo.invalid/proxy/json/2/res.partner/search',
            $environment->createConnection()->getEndpointUri('res.partner', 'search'),
        );
        self::assertInstanceOf(Json2ApiClientBuilder::class, $environment->createBuilder());
    }

    public function testTheWriteBuilderCannotBypassTheServerPreflight(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_ALLOW_WRITES'] = '1';
        $variables['ODOO_JSON2_RUN_ID'] = 'ci-123';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        $httpClient = new RecordingHttpClient([new Response(200, [], '[{"installed_version":"18.0"}]')]);
        $client = $environment->createWriteBuilder($httpClient)->buildJson2Client();

        try {
            $client->call('res.partner', 'unlink', ['ids' => [41]]);
            self::fail('The wrong server version should prevent the write.');
        } catch (LogicException $exception) {
            self::assertStringContainsString('did not prove', $exception->getMessage());
        }

        self::assertCount(1, $httpClient->getRequests());
        self::assertSame(
            '/proxy/json/2/ir.module.module/search_read',
            $httpClient->getRequests()[0]->getUri()->getPath(),
        );
    }

    public function testTheRegularBuilderCannotWriteWithoutTheSecondOptIn(): void
    {
        $environment = Json2IntegrationEnvironment::fromEnvironment($this->safeVariables());
        $httpClient = new RecordingHttpClient([new Response(200, [], '[{"installed_version":"19.0"}]')]);
        $client = $environment->createBuilder($httpClient)->buildJson2Client();

        try {
            $client->call('res.partner', 'create', ['vals_list' => [['name' => 'never sent']]]);
            self::fail('The missing write opt-in should prevent the write.');
        } catch (LogicException $exception) {
            self::assertStringContainsString('not authorized', $exception->getMessage());
        }

        self::assertSame([], $httpClient->getRequests());
    }

    public function testOptionalActionIdentifiersAreValidatedWithoutEchoingTheirValues(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_ACCOUNT_MOVE_ID'] = '42';
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        self::assertSame(42, $environment->optionalPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_ID'));
        self::assertNull($environment->optionalPositiveInteger('ODOO_JSON2_PAYMENT_REGISTER_ID'));

        $sentinel = 'unsafe-id-secret';
        $variables['ODOO_JSON2_ACCOUNT_MOVE_ID'] = $sentinel;
        $environment = Json2IntegrationEnvironment::fromEnvironment($variables);
        try {
            $environment->optionalPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_ID');
            self::fail('An unsafe action identifier was accepted.');
        } catch (LogicException $exception) {
            self::assertStringNotContainsString($sentinel, $exception->getMessage());
        }
    }

    public function testAnAuthorizedBuilderCannotBeRedirectedToAnotherDatabaseForWrites(): void
    {
        $variables = $this->safeVariables();
        $variables['ODOO_JSON2_ALLOW_WRITES'] = '1';
        $variables['ODOO_JSON2_RUN_ID'] = 'ci-123';
        $http = new RecordingHttpClient([
            new Response(200, [], '[{"installed_version":"19.0"}]'),
            new Response(200, [], 'true'),
        ]);
        $facade = Json2IntegrationEnvironment::fromEnvironment($variables)->createWriteBuilder($http)->buildObjectOperations();
        $facade->setDatabase('not_the_authorized_database');

        $this->expectException(LogicException::class);
        try {
            $facade->execute_kw('res.partner', 'unlink', [[41]]);
        } finally {
            self::assertCount(0, $http->getRequests());
        }
    }

    /** @return array<string, string> */
    private function safeVariables(): array
    {
        return [
            'ODOO_JSON2_INTEGRATION' => '1',
            'ODOO_JSON2_HOST' => 'https://odoo.invalid/proxy',
            'ODOO_JSON2_DATABASE' => 'json2_test_123',
            'ODOO_JSON2_API_KEY' => 'test-only-sentinel',
            'ODOO_JSON2_EXPECTED_MAJOR' => '19',
            'ODOO_JSON2_DISPOSABLE_DATABASE' => 'json2_test_123',
        ];
    }
}
