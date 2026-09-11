<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Json2\Exception\Json2CompatibilityException;
use FluxSE\OdooApiClient\Operations\Json2\Exception\Json2UnsupportedCallException;
use FluxSE\OdooApiClient\Operations\Json2\Json2ObjectOperations;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodScope;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignature;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperations;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration\Fixture\ThirdPartyExecuteKwOperations;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;

final class Json2ObjectOperationsTest extends TestCase
{
    public function testCreateActionAndBusinessEnvelopeKeysUseSyntheticResponses(): void
    {
        $httpClient = new RecordingHttpClient([
            $this->response('[73]', ['ETag' => 'native', 'Content-Encoding' => 'gzip']),
            $this->response('false'),
            $this->response('{"result":"business","error":{"code":0}}'),
        ]);
        $builder = $this->builder($httpClient);
        $recordOperations = $builder->buildRecordOperations();

        self::assertSame(73, $recordOperations->create('res.partner', ['name' => 'Ada']));

        $arguments = new Arguments();
        $arguments->addArgument(73);
        self::assertFalse($recordOperations->execute_kw_action('account.move', 'action_post', $arguments));

        $response = $builder->buildObjectOperations()->execute_kw('x.custom', 'named_method');
        self::assertSame(
            ['result' => 'business', 'error' => ['code' => 0]],
            $builder->buildObjectOperations()->decode($response),
        );
        $envelope = json_decode((string) $response->getBody(), true);
        self::assertIsArray($envelope);
        self::assertSame(Json2ObjectOperations::COMPATIBILITY_RESPONSE_ID, $envelope['id']);
        self::assertFalse($response->hasHeader('ETag'));
        self::assertFalse($response->hasHeader('Content-Encoding'));
        self::assertSame((string) strlen((string) $response->getBody()), $response->getHeaderLine('Content-Length'));

        $requests = $httpClient->getRequests();
        self::assertSame(['vals_list' => [['name' => 'Ada']]], json_decode((string) $requests[0]->getBody(), true));
        self::assertSame(['ids' => [73]], json_decode((string) $requests[1]->getBody(), true));
    }

    public function testUidIsLazyCachedAndIdentityChangesInvalidateState(): void
    {
        $httpClient = new RecordingHttpClient([
            $this->response('{"uid":12,"lang":"fr_FR"}'),
            $this->response('{"uid":19}'),
            $this->response('{"uid":27}'),
            $this->response('{"uid":31}'),
        ]);
        $operations = $this->builder($httpClient)->buildObjectOperations();

        self::assertSame(12, $operations->retrieveUid());
        self::assertSame(12, $operations->retrieveUid());
        self::assertCount(1, $httpClient->getRequests());

        $operations->setUsername('asserted@example.test');
        self::assertNull($operations->getLastResponse());
        self::assertSame(19, $operations->retrieveUid());

        $operations->setDatabase('other-db');
        self::assertSame(27, $operations->retrieveUid());
        self::assertSame('other-db', $httpClient->getRequests()[2]->getHeaderLine('X-Odoo-Database'));

        $operations->setPassword('replacement-key');
        self::assertSame(31, $operations->retrieveUid());
        self::assertSame('Bearer replacement-key', $httpClient->getRequests()[3]->getHeaderLine('Authorization'));
    }

    public function testBaseUriRequestGrammarAccessorsAndUnsupportedCapabilities(): void
    {
        $httpClient = new RecordingHttpClient([$this->response('5')]);
        $operations = $this->builder($httpClient)->buildObjectOperations();

        self::assertSame('/object', $operations->getEndpointPath());
        self::assertSame('object', $operations->getService());
        self::assertFalse($operations->getApiRequestMaker()->isJsonRpc());
        self::assertFalse($operations->getApiRequestMaker()->isXmlRpc());
        self::assertSame($operations->getRequestBodyFactory(), $operations->getRequestBodyFactory());
        self::assertSame($operations->getRpcSerializerHelper(), $operations->getRpcSerializerHelper());

        $operations->setBaseUri(Psr17FactoryDiscovery::findUriFactory()->createUri('https://second.example.test/proxy'));
        $response = $operations->request('execute_kw', ['x.custom', 'named_method']);
        self::assertSame(5, $operations->deserializeInteger($response));
        self::assertSame('https://second.example.test/proxy/json/2/x.custom/named_method', (string) $httpClient->getRequests()[0]->getUri());
        self::assertSame($response, $operations->getApiRequestMaker()->getLastResponse());

        try {
            $operations->getApiRequestMaker()->request('', Psr17FactoryDiscovery::findStreamFactory()->createStream('{}'));
            self::fail('The raw compatibility request maker must reject RPC-shaped calls.');
        } catch (Json2UnsupportedCallException) {
        }

        $this->expectException(Json2UnsupportedCallException::class);
        $operations->request('execute_kw', ['model' => 'x.custom', 'method' => 'named_method']);
    }

    public function testDedicatedInspectionAndThirdPartyOperationsAreComposed(): void
    {
        $httpClient = new RecordingHttpClient([
            $this->response('{"name":{"type":"char"}}'),
            $this->response('9'),
        ]);
        $builder = $this->builder($httpClient);
        $builder->setRegistry(new MethodSignatureRegistry([
            new MethodSignature('x.custom', 'named_method', MethodScope::MODEL, ['payload'], ['payload']),
        ]));
        $options = new FieldsGetOptions();
        $options->setAttributes(['type']);

        self::assertSame(
            ['name' => ['type' => 'char']],
            $builder->buildInspectionOperations()->fields_get('res.partner', ['name'], $options),
        );
        self::assertSame(
            ['allfields' => ['name'], 'attributes' => ['type']],
            json_decode((string) $httpClient->getRequests()[0]->getBody(), true),
        );

        $thirdParty = $builder->buildExecuteKwOperations(ThirdPartyExecuteKwOperations::class);
        self::assertSame(9, $thirdParty->execute_kw_action('x.custom', 'named_method'));
        self::assertSame(['payload' => []], json_decode((string) $httpClient->getRequests()[1]->getBody(), true));
        self::assertSame($builder->buildObjectOperations(), $thirdParty->getObjectOperations());
    }

    public function testNullAndFloatCannotCrossHistoricalResultContract(): void
    {
        foreach (['null', '1.25'] as $payload) {
            $operations = $this->builder(new RecordingHttpClient([$this->response($payload)]))->buildObjectOperations();

            try {
                $operations->execute_kw('x.custom', 'named_method');
                self::fail('An incompatible native result must not be coerced.');
            } catch (Json2CompatibilityException $exception) {
                self::assertStringNotContainsString('credential-sentinel', $exception->getMessage());
                self::assertNull($operations->getLastResponse());
            }
        }
    }

    public function testClientErrorsRetainHistoricalFamilyWithoutSensitiveRequestOrResponse(): void
    {
        $response = $this->response('{"name":"AccessError","debug":"credential-sentinel"}')
            ->withStatus(403)
            ->withHeader('Authorization', 'Bearer credential-sentinel');
        $operations = $this->builder(new RecordingHttpClient([$response]))->buildObjectOperations();

        try {
            $operations->execute_kw('x.custom', 'named_method');
            self::fail('A 4xx response must fail.');
        } catch (ClientErrorException $exception) {
            self::assertSame(403, $exception->getCode());
            self::assertStringNotContainsString('credential-sentinel', $exception->getMessage());
            self::assertFalse($exception->getRequest()->hasHeader('Authorization'));
            self::assertSame('', (string) $exception->getResponse()->getBody());
            self::assertNull($operations->getLastResponse());
        }
    }

    private function builder(RecordingHttpClient $httpClient): Json2ApiClientBuilder
    {
        $builder = new Json2ApiClientBuilder(
            new Json2Connection('https://one.example.test/prefix', 'original-key', 'db-one'),
            'identity@example.test',
            'original-key',
        );
        $builder->setHttpClient($httpClient);

        return $builder;
    }

    /** @param array<string, string> $headers */
    private function response(string $body, array $headers = []): \Psr\Http\Message\ResponseInterface
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse(200);
        foreach ($headers as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return $response->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream($body));
    }
}
