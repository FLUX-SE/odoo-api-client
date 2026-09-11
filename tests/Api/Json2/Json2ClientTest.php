<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Api\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2DecodingException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2HttpException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2TransportException;
use FluxSE\OdooApiClient\Api\Json2\Json2Client;
use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Dictionary;
use GuzzleHttp\Psr7\FnStream;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\NoSeekStream;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;

final class Json2ClientTest extends TestCase
{
    public function testItSendsOneNamedJsonRequestAndKeepsTheNativeResponse(): void
    {
        $factory = new HttpFactory();
        $httpClient = new RecordingHttpClient([
            $factory->createResponse(200)->withBody($factory->createStream('[41]')),
        ]);
        $client = $this->createClient($httpClient, 'test-key', 'tenant-db');

        $response = $client->call('res.partner', 'create', [
            'vals_list' => [['name' => 'Été']],
            'context' => [],
        ]);

        self::assertSame([41], $client->decode($response));
        self::assertSame('[41]', (string) $response->getBody());
        self::assertSame($response, $client->getLastResponse());
        self::assertCount(1, $httpClient->getRequests());

        $request = $httpClient->getRequests()[0];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://odoo.example/proxy/json/2/res.partner/create', (string) $request->getUri());
        self::assertSame('Bearer test-key', $request->getHeaderLine('Authorization'));
        self::assertSame('tenant-db', $request->getHeaderLine('X-Odoo-Database'));
        self::assertSame('application/json; charset=utf-8', $request->getHeaderLine('Content-Type'));
        self::assertSame(Json2Client::USER_AGENT, $request->getHeaderLine('User-Agent'));
        self::assertSame('{"vals_list":[{"name":"Été"}],"context":{}}', (string) $request->getBody());
        self::assertStringNotContainsString('jsonrpc', (string) $request->getBody());
        self::assertStringNotContainsString('uid', (string) $request->getBody());
    }

    public function testItOmitsTheDatabaseHeaderWhenItIsNotConfigured(): void
    {
        $factory = new HttpFactory();
        $httpClient = new RecordingHttpClient([$factory->createResponse(200)->withBody($factory->createStream('true'))]);

        $this->createClient($httpClient)->call('res.partner', 'write', ['ids' => [1], 'vals' => []]);

        self::assertSame('', $httpClient->getRequests()[0]->getHeaderLine('X-Odoo-Database'));
    }

    public function testExplicitEmptyCreateAndWriteDictionariesHaveTheCorrectWireShape(): void
    {
        $factory = new HttpFactory();
        $httpClient = new RecordingHttpClient([
            $factory->createResponse(200)->withBody($factory->createStream('[41]')),
            $factory->createResponse(200)->withBody($factory->createStream('true')),
        ]);
        $client = $this->createClient($httpClient);

        $client->call('res.partner', 'create', ['vals_list' => [new Json2Dictionary()]]);
        $client->call('res.partner', 'write', ['ids' => [41], 'vals' => new Json2Dictionary()]);

        self::assertSame('{"vals_list":[{}]}', (string) $httpClient->getRequests()[0]->getBody());
        self::assertSame('{"ids":[41],"vals":{}}', (string) $httpClient->getRequests()[1]->getBody());
    }

    public function testASeekableResponseBodyIsRewoundAfterEveryDecode(): void
    {
        $factory = new HttpFactory();
        $response = $factory->createResponse(200)->withBody($factory->createStream('{"value":7}'));
        $httpClient = new RecordingHttpClient([$response]);
        $client = $this->createClient($httpClient);
        $received = $client->call('res.partner', 'read');

        self::assertSame(['value' => 7], $client->decode($received));
        self::assertSame(['value' => 7], $client->decode($received));
        self::assertSame('{"value":7}', $received->getBody()->getContents());
    }

    public function testANonSeekableResponseIsCopiedBeforeItIsReturned(): void
    {
        $factory = new HttpFactory();
        $body = new NoSeekStream($factory->createStream('[5,8]'));
        $httpClient = new RecordingHttpClient([$factory->createResponse(200)->withBody($body)]);
        $client = $this->createClient($httpClient);

        $response = $client->call('res.partner', 'search');

        self::assertTrue($response->getBody()->isSeekable());
        self::assertSame([5, 8], $client->decode($response));
        $lastResponse = $client->getLastResponse();
        self::assertNotNull($lastResponse);
        self::assertSame('[5,8]', (string) $lastResponse->getBody());
    }

    public function testDecodeNormalizesAndStoresAnExternallyProvidedNonSeekableResponse(): void
    {
        $factory = new HttpFactory();
        $client = $this->createClient(new RecordingHttpClient([]));
        $response = $factory->createResponse(200)->withBody(new NoSeekStream($factory->createStream('null')));

        self::assertNull($client->decode($response));
        $lastResponse = $client->getLastResponse();
        self::assertNotNull($lastResponse);
        self::assertTrue($lastResponse->getBody()->isSeekable());
        self::assertSame('null', (string) $lastResponse->getBody());
    }

    /** @return iterable<string, array{int}> */
    public static function errorStatusProvider(): iterable
    {
        yield 'unauthorized' => [401];
        yield 'forbidden' => [403];
        yield 'not found' => [404];
        yield 'unprocessable' => [422];
        yield 'rate limited' => [429];
        yield 'server error' => [500];
    }

    #[DataProvider('errorStatusProvider')]
    public function testItPreservesStructuredHttpErrors(int $statusCode): void
    {
        $factory = new HttpFactory();
        $response = $factory->createResponse($statusCode)->withBody($factory->createStream(
            '{"name":"odoo.exceptions.AccessError","message":"denied","arguments":["private"],"debug":"trace"}'
        ));
        $httpClient = new RecordingHttpClient([$response]);
        $client = $this->createClient($httpClient);

        try {
            $client->call('res.partner', 'search');
            self::fail('An HTTP error was accepted.');
        } catch (Json2HttpException $exception) {
            self::assertSame($statusCode, $exception->getStatusCode());
            self::assertSame('odoo.exceptions.AccessError', $exception->getErrorName());
            self::assertSame($client->getLastResponse(), $exception->getResponse());
            self::assertSame(sprintf('The JSON-2 request failed with HTTP status %d.', $statusCode), $exception->getMessage());
            self::assertCount(1, $httpClient->getRequests());
        }
    }

    /** @return iterable<string, array{string}> */
    public static function nonJsonErrorProvider(): iterable
    {
        yield 'proxy HTML' => ['<html>Bad gateway</html>'];
        yield 'malformed JSON' => ['{"name":'];
        yield 'empty body' => [''];
    }

    #[DataProvider('nonJsonErrorProvider')]
    public function testNonJsonErrorBodiesRemainHttpErrors(string $body): void
    {
        $factory = new HttpFactory();
        $response = $factory->createResponse(502)->withBody($factory->createStream($body));
        $client = $this->createClient(new RecordingHttpClient([$response]));

        try {
            $client->call('res.partner', 'search');
            self::fail('An HTTP error was accepted.');
        } catch (Json2HttpException $exception) {
            self::assertSame(502, $exception->getStatusCode());
            self::assertNull($exception->getErrorName());
            self::assertSame($body, (string) $exception->getResponse()->getBody());
        }
    }

    /** @return iterable<string, array{int}> */
    public static function unreadableErrorStatusProvider(): iterable
    {
        yield 'client error' => [401];
        yield 'server error' => [500];
    }

    #[DataProvider('unreadableErrorStatusProvider')]
    public function testAnUnreadableErrorBodyDoesNotHideTheHttpStatus(int $status): void
    {
        $factory = new HttpFactory();
        $body = FnStream::decorate($factory->createStream('unavailable'), [
            'isSeekable' => static fn (): bool => false,
            'isReadable' => static fn (): bool => false,
            'getContents' => static function (): never {
                throw new \RuntimeException('The body cannot be read.');
            },
        ]);
        $response = $factory->createResponse($status)->withBody($body);
        $client = $this->createClient(new RecordingHttpClient([$response]));

        try {
            $client->call('res.partner', 'search');
            self::fail('An HTTP error was accepted.');
        } catch (Json2HttpException $exception) {
            self::assertSame($status, $exception->getStatusCode());
            self::assertSame($response, $exception->getResponse());
            self::assertSame($response, $client->getLastResponse());
            self::assertNull($exception->getErrorName());
        }
    }

    public function testItDoesNotFollowRedirectsOrRetry(): void
    {
        $factory = new HttpFactory();
        $response = $factory->createResponse(307)->withHeader('Location', 'https://attacker.invalid/collect');
        $httpClient = new RecordingHttpClient([$response]);
        $client = $this->createClient($httpClient, 'redirect-secret');

        $this->expectException(Json2HttpException::class);
        try {
            $client->call('res.partner', 'write');
        } finally {
            self::assertCount(1, $httpClient->getRequests());
            self::assertSame('odoo.example', $httpClient->getRequests()[0]->getUri()->getHost());
        }
    }

    public function testItDoesNotLeakReflectedSecretsFromHttpErrors(): void
    {
        $sentinel = 'SENTINEL-API-KEY-4711';
        $factory = new HttpFactory();
        $response = $factory->createResponse(401)->withBody($factory->createStream(json_encode([
            'name' => $sentinel,
            'message' => $sentinel,
            'arguments' => [$sentinel],
            'context' => ['token' => $sentinel],
            'debug' => $sentinel,
        ], JSON_THROW_ON_ERROR)));
        $client = $this->createClient(new RecordingHttpClient([$response]), $sentinel);

        try {
            $client->call('res.partner', 'search');
            self::fail('An HTTP error was accepted.');
        } catch (Json2HttpException $exception) {
            self::assertSame($sentinel, $exception->getErrorName());
            self::assertStringNotContainsString($sentinel, $exception->getMessage());
            self::assertStringNotContainsString($sentinel, (string) $exception);
            self::assertStringNotContainsString($sentinel, print_r($exception, true));
            self::assertStringNotContainsString($sentinel, var_export($exception, true));
        }
    }

    public function testTransportErrorsAreSanitizedAndNeverRetried(): void
    {
        $sentinel = 'SENTINEL-NETWORK-KEY-9831';
        $factory = new HttpFactory();
        $request = $factory->createRequest('POST', 'https://odoo.example')
            ->withHeader('Authorization', 'Bearer ' . $sentinel);
        $networkException = new class($request, $sentinel) extends \RuntimeException implements NetworkExceptionInterface {
            public function __construct(private RequestInterface $request, string $message)
            {
                parent::__construct($message);
            }

            public function getRequest(): RequestInterface
            {
                return $this->request;
            }
        };
        $httpClient = new RecordingHttpClient([$networkException]);
        $client = $this->createClient($httpClient, $sentinel);

        try {
            $client->call('res.partner', 'search');
            self::fail('A transport error was accepted.');
        } catch (Json2TransportException $exception) {
            self::assertStringNotContainsString($sentinel, $exception->getMessage());
            self::assertStringNotContainsString($sentinel, (string) $exception);
            self::assertNull($exception->getPrevious());
            self::assertNull($client->getLastResponse());
            self::assertCount(1, $httpClient->getRequests());
        }
    }

    /** @return iterable<string, array{int, string}> */
    public static function invalidSuccessBodyProvider(): iterable
    {
        yield 'empty 204' => [204, ''];
        yield 'empty 200' => [200, '  '];
        yield 'malformed 200' => [200, '{"broken":'];
    }

    #[DataProvider('invalidSuccessBodyProvider')]
    public function testUnexpectedEmptyOrMalformedSuccessBodiesFailOnDecode(int $status, string $body): void
    {
        $factory = new HttpFactory();
        $response = $factory->createResponse($status)->withBody($factory->createStream($body));
        $client = $this->createClient(new RecordingHttpClient([$response]));

        $response = $client->call('res.partner', 'read');

        $this->expectException(Json2DecodingException::class);
        $client->decode($response);
    }

    private function createClient(
        RecordingHttpClient $httpClient,
        string $apiKey = 'test-key',
        ?string $database = null,
    ): Json2Client {
        $factory = new HttpFactory();

        return new Json2Client(
            $httpClient,
            $factory,
            $factory,
            new Json2Connection('https://odoo.example/proxy', $apiKey, $database)
        );
    }
}
