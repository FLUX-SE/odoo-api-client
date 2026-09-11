<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactory;
use FluxSE\OdooApiClient\Api\OdooApiRequestMaker;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\CommonOperations;
use FluxSE\OdooApiClient\Serializer\JsonRpc\JsonRpcSerializerHelper;
use FluxSE\OdooApiClient\Serializer\XmlRpc\XmlRpcSerializerHelper;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration\Fixture\CapturingHttpClient;

final class LegacyRpcCharacterizationTest extends TestCase
{
    #[DataProvider('basePathProvider')]
    public function testProtocolPredicatesCurrentlyAcceptEverySyntacticallyValidPath(
        string $path,
        bool $expectedJson,
        bool $expectedXml,
    ): void {
        $factory = new HttpFactory();
        $requestMaker = new OdooApiRequestMaker(
            new CapturingHttpClient([new Response()]),
            $factory,
            $factory->createUri('https://odoo.invalid' . $path),
        );

        // This deliberately freezes a known defect: preg_match() returning 0 is
        // compared with false, so both predicates are true for a non-match.
        self::assertSame($expectedJson, $requestMaker->isJsonRpc());
        self::assertSame($expectedXml, $requestMaker->isXmlRpc());
    }

    /** @return iterable<string, array{string, bool, bool}> */
    public static function basePathProvider(): iterable
    {
        yield 'jsonrpc' => ['/jsonrpc', true, true];
        yield 'xmlrpc' => ['/xmlrpc/2', true, true];
        yield 'unrelated' => ['/not-rpc', true, true];
    }

    public function testRequestMakerPreservesBodyTracksLastResponseAndUsesMutableBaseUri(): void
    {
        $factory = new HttpFactory();
        $response = new Response(207, ['X-Fixture' => 'rpc'], 'fixture-response');
        $client = new CapturingHttpClient([$response]);
        $requestMaker = new OdooApiRequestMaker(
            $client,
            $factory,
            $factory->createUri('https://first.invalid/proxy/jsonrpc'),
        );

        self::assertNull($requestMaker->getLastResponse());
        $requestMaker->setBaseUri($factory->createUri('https://second.invalid/root/xmlrpc/2'));
        $actual = $requestMaker->request('/common', $factory->createStream('request-body'));

        self::assertSame($response, $actual);
        self::assertSame($response, $requestMaker->getLastResponse());
        self::assertSame($client, $requestMaker->getHttpClient());
        self::assertSame($factory, $requestMaker->getRequestFactory());
        self::assertSame('https://second.invalid/root/xmlrpc/2/common', (string) $client->getRequests()[0]->getUri());
        self::assertSame('request-body', (string) $client->getRequests()[0]->getBody());
    }

    public function testBuilderDefaultsToJsonRpcAndXmlRpcRemainsExplicit(): void
    {
        $jsonBuilder = new OdooApiClientBuilder('https://odoo.invalid/proxy/');
        self::assertSame(OdooApiRequestMakerInterface::BASE_JSONRPC_PATH, $jsonBuilder->getBasePath());
        self::assertSame('https://odoo.invalid/proxy/jsonrpc', (string) $jsonBuilder->buildBaseUri());
        self::assertInstanceOf(JsonRpcSerializerHelper::class, $jsonBuilder->buildRpcSerializerHelper());

        $xmlBuilder = new OdooApiClientBuilder(
            'https://odoo.invalid/proxy',
            OdooApiRequestMakerInterface::BASE_XMLRPC_PATH,
        );
        self::assertSame('https://odoo.invalid/proxy/xmlrpc/2', (string) $xmlBuilder->buildBaseUri());
        self::assertInstanceOf(XmlRpcSerializerHelper::class, $xmlBuilder->buildRpcSerializerHelper());
    }

    public function testBuilderSettersDoNotInvalidateAlreadyBuiltConnectionObjects(): void
    {
        $builder = new OdooApiClientBuilder('https://first.invalid');
        $firstUri = $builder->buildBaseUri();
        $firstMaker = $builder->buildApiRequestMaker();
        $firstHelper = $builder->buildRpcSerializerHelper();

        $builder->setBaseHostname('https://second.invalid');
        $builder->setBasePath(OdooApiRequestMakerInterface::BASE_XMLRPC_PATH);

        self::assertSame($firstUri, $builder->buildBaseUri());
        self::assertSame('https://first.invalid/jsonrpc', (string) $builder->buildBaseUri());
        self::assertSame($firstMaker, $builder->buildApiRequestMaker());
        self::assertSame($firstHelper, $builder->buildRpcSerializerHelper());
        self::assertInstanceOf(JsonRpcSerializerHelper::class, $builder->buildRpcSerializerHelper());
    }

    public function testJsonRpcRequestUsesCallEnvelopeAndLogicalService(): void
    {
        $factory = new HttpFactory();
        $client = new CapturingHttpClient([new Response(200, [], '{"result":"ok"}')]);
        $builder = new OdooApiClientBuilder('https://odoo.invalid');
        $builder->setHttpClient($client);
        $operations = $builder->buildCommonOperations();

        $response = $operations->request('about', [true]);
        $wire = json_decode((string) $client->getRequests()[0]->getBody(), true, 512, JSON_THROW_ON_ERROR);

        self::assertSame('common', $operations->getService());
        self::assertSame('/common', $operations->getEndpointPath());
        self::assertSame($builder->buildApiRequestMaker(), $operations->getApiRequestMaker());
        self::assertSame($builder->buildRequestBodyFactory(), $operations->getRequestBodyFactory());
        self::assertSame($builder->buildRpcSerializerHelper(), $operations->getRpcSerializerHelper());
        self::assertSame('https://odoo.invalid/jsonrpc', (string) $client->getRequests()[0]->getUri());
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'call',
            'params' => ['service' => 'common', 'method' => 'about', 'args' => [true]],
        ], $wire);
        self::assertSame('ok', $operations->deserializeString($response));
    }

    public function testExplicitXmlRpcCurrentlyStillTakesTheJsonDispatchBranch(): void
    {
        $factory = new HttpFactory();
        // The polyfill uses null here to encode an XML-RPC response rather than a request.
        // @phpstan-ignore-next-line argument.type
        $client = new CapturingHttpClient([new Response(200, [], xmlrpc_encode_request(null, 'ok'))]);
        $requestMaker = new OdooApiRequestMaker(
            $client,
            $factory,
            $factory->createUri('https://odoo.invalid/xmlrpc/2'),
        );
        $builder = new OdooApiClientBuilder('https://odoo.invalid', OdooApiRequestMakerInterface::BASE_XMLRPC_PATH);
        $helper = $builder->buildRpcSerializerHelper();
        $operations = new CommonOperations(
            $requestMaker,
            new RequestBodyFactory(RequestBody::class),
            $helper,
        );

        $response = $operations->request('about', [true]);
        $request = $client->getRequests()[0];

        // Both protocol predicates currently return true, so request() selects
        // jsonRpcRequest() first even though the XML codec was selected.
        self::assertSame('https://odoo.invalid/xmlrpc/2', (string) $request->getUri());
        self::assertStringContainsString('<methodName>call</methodName>', (string) $request->getBody());
        self::assertStringContainsString('<string>common</string>', (string) $request->getBody());
        self::assertStringContainsString('<string>about</string>', (string) $request->getBody());
        self::assertStringContainsString('<boolean>1</boolean>', (string) $request->getBody());
        self::assertSame('ok', $operations->deserializeString($response));
    }

    public function testJsonRpcDecoderExtractsEnvelopesAndSupportsHistoricalRootTypesOnly(): void
    {
        $factory = new HttpFactory();
        $builder = new OdooApiClientBuilder('https://odoo.invalid');
        $helper = $builder->buildRpcSerializerHelper();

        self::assertSame(['id' => 7], $helper->decodeResponseBody($factory->createStream('{"result":{"id":7}}')));
        self::assertSame(['code' => 42], $helper->decodeResponseBody($factory->createStream('{"error":{"code":42}}')));
        self::assertSame(3, $helper->decodeResponseBody($factory->createStream('3')));
        self::assertSame('value', $helper->decodeResponseBody($factory->createStream('"value"')));
        self::assertTrue($helper->decodeResponseBody($factory->createStream('true')));
    }
}
