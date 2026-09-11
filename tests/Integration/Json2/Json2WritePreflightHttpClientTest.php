<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2TransportException;
use FluxSE\OdooApiClient\Api\Json2\Json2Client;
use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Codec;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\NetworkExceptionInterface;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;

final class Json2WritePreflightHttpClientTest extends TestCase
{
    #[DataProvider('unsafePreflightProvider')]
    public function testAnUnsafeServerPreflightPreventsTheWrite(Response $preflightResponse): void
    {
        $httpClient = new RecordingHttpClient([$preflightResponse]);
        $client = $this->client($httpClient);

        try {
            $client->call('res.partner', 'create', ['vals_list' => [['name' => 'never sent']]]);
            self::fail('The unsafe server response should prevent the write.');
        } catch (\LogicException $exception) {
            self::assertStringNotContainsString('integration-secret', $exception->getMessage());
        }

        self::assertCount(1, $httpClient->getRequests());
        self::assertSame(
            '/proxy/json/2/ir.module.module/search_read',
            $httpClient->getRequests()[0]->getUri()->getPath(),
        );
    }

    /** @return iterable<string, array{Response}> */
    public static function unsafePreflightProvider(): iterable
    {
        yield 'wrong server version' => [new Response(200, [], '[{"installed_version":"18.0"}]')];
        yield 'invalid JSON response' => [new Response(200, [], '{not-json')];
        yield 'invalid response shape' => [new Response(200, [], '[]')];
        yield 'HTTP or rights refusal' => [new Response(403, [], '{"message":"integration-secret"}')];
    }

    public function testAReadOnlyCallDoesNotTriggerTheWritePreflight(): void
    {
        $httpClient = new RecordingHttpClient([new Response(200, [], '[]')]);
        $client = $this->client($httpClient);

        $client->call('res.partner', 'search', ['domain' => []]);

        self::assertCount(1, $httpClient->getRequests());
        self::assertSame('/proxy/json/2/res.partner/search', $httpClient->getRequests()[0]->getUri()->getPath());
    }

    public function testAnActionCannotBypassTheServerPreflight(): void
    {
        $httpClient = new RecordingHttpClient([new Response(403, [], '{"message":"denied"}')]);
        $client = $this->client($httpClient);

        $this->expectException(\LogicException::class);
        try {
            $client->call('account.move', 'action_post', ['ids' => [41]]);
        } finally {
            self::assertCount(1, $httpClient->getRequests());
            self::assertSame(
                '/proxy/json/2/ir.module.module/search_read',
                $httpClient->getRequests()[0]->getUri()->getPath(),
            );
        }
    }

    public function testSuccessfulPreflightRunsOnceBeforeMutations(): void
    {
        $httpClient = new RecordingHttpClient([
            new Response(200, [], '[{"installed_version":"19.0"}]'),
            new Response(200, [], '[41]'),
            new Response(200, [], 'true'),
        ]);
        $client = $this->client($httpClient);

        $client->call('res.partner', 'create', ['vals_list' => [['name' => 'fixture']]]);
        $client->call('res.partner', 'write', ['ids' => [41], 'vals' => ['name' => 'updated']]);

        self::assertSame([
            '/proxy/json/2/ir.module.module/search_read',
            '/proxy/json/2/res.partner/create',
            '/proxy/json/2/res.partner/write',
        ], array_map(
            static fn (Request|\Psr\Http\Message\RequestInterface $request): string => $request->getUri()->getPath(),
            $httpClient->getRequests(),
        ));
    }

    public function testAWriteIsNotReplayedWhenItsResponseIsLost(): void
    {
        $lostRequest = new Request('POST', 'https://odoo.invalid/proxy/json/2/res.partner/create');
        $lostResponse = new class($lostRequest) extends \RuntimeException implements NetworkExceptionInterface {
            public function __construct(private readonly \Psr\Http\Message\RequestInterface $request)
            {
                parent::__construct('response lost integration-secret');
            }

            public function getRequest(): \Psr\Http\Message\RequestInterface
            {
                return $this->request;
            }
        };
        $httpClient = new RecordingHttpClient([
            new Response(200, [], '[{"installed_version":"19.0"}]'),
            $lostResponse,
        ]);
        $client = $this->client($httpClient);

        try {
            $client->call('res.partner', 'create', ['vals_list' => [['name' => 'fixture']]]);
            self::fail('The lost response should remain a transport failure.');
        } catch (Json2TransportException $exception) {
            self::assertStringNotContainsString('integration-secret', $exception->getMessage());
        }

        self::assertCount(2, $httpClient->getRequests(), 'The uncertain write must never be replayed automatically.');
        self::assertSame('/proxy/json/2/res.partner/create', $httpClient->getRequests()[1]->getUri()->getPath());
    }

    private function client(RecordingHttpClient $httpClient): Json2Client
    {
        $factory = new HttpFactory();
        $guard = new Json2WritePreflightHttpClient($httpClient, $factory);

        return new Json2Client(
            $guard,
            $factory,
            $factory,
            new Json2Connection('https://odoo.invalid/proxy', 'integration-secret', 'json2_test_guard'),
            new Json2Codec(),
        );
    }

    public function testChangingTheDatabaseRequiresANewServerPreflight(): void
    {
        $factory = new HttpFactory();
        $httpClient = new RecordingHttpClient([
            new Response(200, [], '[{"installed_version":"19.0"}]'),
            new Response(200, [], 'true'),
            new Response(200, [], '[{"installed_version":"18.0"}]'),
        ]);
        $guard = new Json2WritePreflightHttpClient($httpClient, $factory);
        $first = new Json2Client($guard, $factory, $factory, new Json2Connection('https://odoo.invalid', 'test-key', 'json2_test_first'));
        $second = new Json2Client($guard, $factory, $factory, new Json2Connection('https://odoo.invalid', 'test-key', 'json2_test_second'));
        $first->call('res.partner', 'write', ['ids' => [1], 'vals' => ['name' => 'fixture']]);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('did not prove');
        try {
            $second->call('res.partner', 'write', ['ids' => [1], 'vals' => ['name' => 'never sent']]);
        } finally {
            self::assertCount(3, $httpClient->getRequests());
            self::assertSame('/json/2/ir.module.module/search_read', $httpClient->getRequests()[2]->getUri()->getPath());
        }
    }
}
