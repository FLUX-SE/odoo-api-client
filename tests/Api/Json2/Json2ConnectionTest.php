<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Api\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use GuzzleHttp\Psr7\HttpFactory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class Json2ConnectionTest extends TestCase
{
    public function testItPreservesAReverseProxyPrefixAndAddsAuthentication(): void
    {
        $factory = new HttpFactory();
        $connection = new Json2Connection('https://odoo.example/proxy/root/', 'test-api-key', 'tenant-db');

        self::assertSame(
            'https://odoo.example/proxy/root/json/2/res.partner/search_read',
            $connection->getEndpointUri('res.partner', 'search_read')
        );
        self::assertSame('https://odoo.example/proxy/root', $connection->getBaseUri());
        self::assertSame('tenant-db', $connection->getDatabase());
        self::assertSame('https://odoo.example/proxy/root', (string) $connection);

        $request = $connection->applyToRequest($factory->createRequest('POST', 'https://odoo.example'));
        self::assertSame('Bearer test-api-key', $request->getHeaderLine('Authorization'));
        self::assertSame('tenant-db', $request->getHeaderLine('X-Odoo-Database'));
    }

    public function testDatabaseHeaderIsOptionalAndKeyRotationReturnsAnIsolatedConnection(): void
    {
        $factory = new HttpFactory();
        $first = new Json2Connection('http://localhost:8069', 'first-key');
        $second = $first->withApiKey('second-key');

        $request = $factory->createRequest('POST', 'http://localhost:8069');
        self::assertSame('Bearer first-key', $first->applyToRequest($request)->getHeaderLine('Authorization'));
        self::assertSame('Bearer second-key', $second->applyToRequest($request)->getHeaderLine('Authorization'));
        self::assertSame('', $first->applyToRequest($request)->getHeaderLine('X-Odoo-Database'));
    }

    public function testBaseUriAndDatabaseCanBeReplacedWithoutExposingOrLosingTheKey(): void
    {
        $factory = new HttpFactory();
        $original = new Json2Connection('https://first.example/prefix', 'private-key', 'first-db');
        $reconfigured = $original
            ->withBaseUri('https://second.example/other-prefix/')
            ->withDatabase('second-db');
        $request = $factory->createRequest('POST', 'https://second.example');

        self::assertSame(
            'https://second.example/other-prefix/json/2/res.users/context_get',
            $reconfigured->getEndpointUri('res.users', 'context_get')
        );
        self::assertSame('second-db', $reconfigured->getDatabase());
        self::assertSame('Bearer private-key', $reconfigured->applyToRequest($request)->getHeaderLine('Authorization'));
        self::assertSame('https://first.example/prefix', $original->getBaseUri());
        self::assertSame('first-db', $original->getDatabase());
    }

    public function testDatabaseCanBeRemovedImmutably(): void
    {
        $factory = new HttpFactory();
        $original = new Json2Connection('https://odoo.example', 'private-key', 'tenant-db');
        $withoutDatabase = $original->withDatabase(null);

        self::assertNull($withoutDatabase->getDatabase());
        self::assertSame(
            '',
            $withoutDatabase
                ->applyToRequest($factory->createRequest('POST', 'https://odoo.example'))
                ->getHeaderLine('X-Odoo-Database')
        );
        self::assertSame('tenant-db', $original->getDatabase());
    }

    /** @return iterable<string, array{string}> */
    public static function invalidBaseUriProvider(): iterable
    {
        yield 'empty' => [''];
        yield 'relative' => ['/proxy'];
        yield 'non HTTP' => ['ftp://odoo.example/proxy'];
        yield 'userinfo' => ['https://user:password@odoo.example/proxy'];
        yield 'query' => ['https://odoo.example/proxy?tenant=one'];
        yield 'fragment' => ['https://odoo.example/proxy#fragment'];
        yield 'dot segment' => ['https://odoo.example/proxy/../other'];
        yield 'encoded dot segment' => ['https://odoo.example/proxy/%2e%2e/other'];
        yield 'backslash' => ['https://odoo.example/proxy\\other'];
        yield 'encoded slash' => ['https://odoo.example/proxy%2fother'];
        yield 'encoded newline' => ['https://odoo.example/proxy%0Aother'];
        yield 'surrounding whitespace' => [' https://odoo.example'];
    }

    #[DataProvider('invalidBaseUriProvider')]
    public function testItRejectsUnsafeBaseUris(string $baseUri): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Json2Connection($baseUri, 'key');
    }

    /** @return iterable<string, array{string, string}> */
    public static function unsafeSegmentProvider(): iterable
    {
        yield 'model slash' => ['res/partner', 'search'];
        yield 'model traversal' => ['res..partner', 'search'];
        yield 'model encoded slash' => ['res%2fpartner', 'search'];
        yield 'model scheme' => ['https:', 'search'];
        yield 'method slash' => ['res.partner', '../search'];
        yield 'method dot' => ['res.partner', 'search.read'];
        yield 'method encoded slash' => ['res.partner', 'search%2fread'];
        yield 'method backslash' => ['res.partner', 'search\\read'];
    }

    #[DataProvider('unsafeSegmentProvider')]
    public function testItRejectsUnsafeModelAndMethodSegments(string $model, string $method): void
    {
        $connection = new Json2Connection('https://odoo.example/proxy', 'key');

        $this->expectException(\InvalidArgumentException::class);
        $connection->getEndpointUri($model, $method);
    }

    /** @return iterable<string, array{string, string|null}> */
    public static function invalidCredentialProvider(): iterable
    {
        yield 'empty key' => ['', null];
        yield 'key with newline' => ["secret\r\nInjected: true", null];
        yield 'key with a space' => ['secret key', null];
        yield 'empty database' => ['key', ''];
        yield 'database newline' => ['key', "db\nInjected: true"];
    }

    #[DataProvider('invalidCredentialProvider')]
    public function testItRejectsUnsafeHeaderValuesWithoutEchoingThem(string $apiKey, ?string $database): void
    {
        try {
            new Json2Connection('https://odoo.example', $apiKey, $database);
            self::fail('An invalid credential was accepted.');
        } catch (\InvalidArgumentException $exception) {
            if ('' !== $apiKey) {
                self::assertStringNotContainsString($apiKey, $exception->getMessage());
            }
            self::assertStringStartsWith('The JSON-2 ', $exception->getMessage());
        }
    }
}
