<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Builder\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\PhpGenerator\ModelFixer\SelectionTypeDefaultValueAdder;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriInterface;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;
use Tests\FluxSE\OdooApiClient\Operations\Json2\Fixture\Json2TestModel;

final class Json2ApiClientBuilderTest extends TestCase
{
    public function testADetachedFacadeCannotRewriteTheActiveBuilderConfiguration(): void
    {
        $httpClient = new RecordingHttpClient([$this->response('1')]);
        $builder = $this->builder('https://active.example.test', 'initial-db', 'initial-key', $httpClient);
        $detachedFacade = $builder->buildObjectOperations();

        $builder->setSerializer($builder->buildSerializer());
        $activeFacade = $builder->buildObjectOperations();
        $detachedFacade->getApiRequestMaker()->setBaseUri($this->uri('https://retired.example.test'));
        $detachedFacade->setDatabase('retired-db');
        $detachedFacade->setPassword('retired-key');
        $detachedFacade->setUsername('retired-label');

        $nativeClient = $builder->buildJson2Client();
        self::assertSame(1, $nativeClient->decode($nativeClient->call('x.custom', 'named_method')));
        self::assertSame('initial-db', $activeFacade->getDatabase());
        self::assertSame('initial-key', $activeFacade->getPassword());
        self::assertSame('', $activeFacade->getUsername());
        self::assertSame('https://active.example.test', (string) $activeFacade->getApiRequestMaker()->getBaseUri());
        self::assertSame('https://active.example.test/json/2/x.custom/named_method', (string) $httpClient->getRequests()[0]->getUri());
        self::assertSame('initial-db', $httpClient->getRequests()[0]->getHeaderLine('X-Odoo-Database'));
        self::assertSame('Bearer initial-key', $httpClient->getRequests()[0]->getHeaderLine('Authorization'));
    }

    public function testManagersOperateWithoutNetworkAndPreserveModelShapes(): void
    {
        $httpClient = new RecordingHttpClient([
            $this->response('[41]'),
            $this->response('true'),
            $this->response('true'),
            $this->response('[{"id":41,"name":"Ada"}]'),
            $this->response('[]'),
            $this->response('7'),
            $this->response('[{"id":42,"name":"Grace"}]'),
        ]);
        $builder = $this->builder('https://manager.example.test', 'db-manager', 'key-manager', $httpClient);
        $modelManager = $builder->buildModelManager();
        $listManager = $builder->buildModelListManager();

        $model = new Json2TestModel('Ada');
        self::assertSame(41, $modelManager->persist($model));
        $model->setId(41);
        $model->setName('Ada Lovelace');
        self::assertTrue($modelManager->update($model));
        self::assertTrue($modelManager->delete($model));

        $found = $listManager->find(Json2TestModel::class, 41);
        self::assertInstanceOf(Json2TestModel::class, $found);
        self::assertSame('Ada', $found->getName());
        self::assertNull($listManager->find(Json2TestModel::class, 999));
        self::assertSame(7, $listManager->count(Json2TestModel::class, new SearchDomains()));

        $options = new SearchReadOptions();
        $options->setOffset(5);
        $options->setLimit(10);
        $options->setOrder('name');
        $options->addOption('context', ['allowed_company_ids' => [2], 'lang' => 'fr_FR']);
        $models = $listManager->findBy(Json2TestModel::class, null, $options);
        self::assertCount(1, $models);
        self::assertSame('Grace', $models[0]->getName());

        $request = $httpClient->getRequests()[6];
        $parameters = json_decode((string) $request->getBody(), true);
        self::assertIsArray($parameters);
        self::assertSame(5, $parameters['offset']);
        self::assertSame(10, $parameters['limit']);
        self::assertSame('name', $parameters['order']);
        self::assertSame(['allowed_company_ids' => [2], 'lang' => 'fr_FR'], $parameters['context']);
        self::assertIsArray($parameters['fields']);
        self::assertContains('id', $parameters['fields']);
        self::assertContains('name', $parameters['fields']);
    }

    public function testDefaultValueProviderKeepsItsHistoricalClientErrorFallback(): void
    {
        $httpClient = new RecordingHttpClient([$this->response('{"name":"AccessError"}')->withStatus(403)]);
        $builder = $this->builder('https://generator.example.test', 'db-generator', 'key-generator', $httpClient);
        $fixer = new SelectionTypeDefaultValueAdder($builder->buildRecordListOperations());
        $structure = ['state' => ['type' => 'selection']];

        $fixer->fix('x.test', $structure);

        self::assertSame(['state' => ['type' => 'selection']], $structure);
        self::assertCount(1, $httpClient->getRequests());
    }

    public function testTwoBuildersKeepHostsDatabasesAndCredentialsIsolated(): void
    {
        $firstHttp = new RecordingHttpClient([$this->response('1'), $this->response('2')]);
        $secondHttp = new RecordingHttpClient([$this->response('3')]);
        $first = $this->builder('https://first.example.test/a', 'first-db', 'first-key', $firstHttp);
        $second = $this->builder('https://second.example.test/b', 'second-db', 'second-key', $secondHttp);

        self::assertSame(1, $first->buildObjectOperations()->deserializeInteger(
            $first->buildObjectOperations()->execute_kw('x.custom', 'named_method'),
        ));
        self::assertSame(3, $second->buildObjectOperations()->deserializeInteger(
            $second->buildObjectOperations()->execute_kw('x.custom', 'named_method'),
        ));

        $first->buildObjectOperations()->setPassword('first-replaced');
        self::assertSame(2, $first->buildObjectOperations()->deserializeInteger(
            $first->buildObjectOperations()->execute_kw('x.custom', 'named_method'),
        ));

        self::assertSame('Bearer first-replaced', $firstHttp->getRequests()[1]->getHeaderLine('Authorization'));
        self::assertSame('Bearer second-key', $secondHttp->getRequests()[0]->getHeaderLine('Authorization'));
        self::assertSame('first-db', $firstHttp->getRequests()[1]->getHeaderLine('X-Odoo-Database'));
        self::assertSame('second-db', $secondHttp->getRequests()[0]->getHeaderLine('X-Odoo-Database'));
        self::assertStringStartsWith('https://first.example.test/a/', (string) $firstHttp->getRequests()[1]->getUri());
        self::assertStringStartsWith('https://second.example.test/b/', (string) $secondHttp->getRequests()[0]->getUri());
    }

    public function testFacadeReconfigurationBecomesTheBuildersSourceOfTruthAcrossResets(): void
    {
        $firstHttp = new RecordingHttpClient([$this->response('11')]);
        $builder = $this->builder('https://old.example.test/proxy', 'old-db', 'old-key', $firstHttp);
        $nativeBeforeRotation = $builder->buildJson2Client();
        $operations = $builder->buildObjectOperations();

        $operations->getApiRequestMaker()->setBaseUri($this->uri('https://new.example.test/new-proxy'));
        $operations->setDatabase('new-db');
        $operations->setPassword('new-key');
        $operations->setUsername('new-label');

        $nativeAfterRotation = $builder->buildJson2Client();
        self::assertNotSame($nativeBeforeRotation, $nativeAfterRotation);
        self::assertSame(11, $nativeAfterRotation->decode(
            $nativeAfterRotation->call('x.custom', 'named_method'),
        ));
        self::assertRequestUsesConfiguration(
            $firstHttp->getRequests()[0],
            'https://new.example.test/new-proxy/json/2/x.custom/named_method',
            'new-db',
            'new-key',
        );

        $secondHttp = new RecordingHttpClient([$this->response('12'), $this->response('13')]);
        $builder->setHttpClient($secondHttp);
        $rebuiltOperations = $builder->buildObjectOperations();

        self::assertNotSame($operations, $rebuiltOperations);
        self::assertSame('new-db', $rebuiltOperations->getDatabase());
        self::assertSame('new-key', $rebuiltOperations->getPassword());
        self::assertSame('new-label', $rebuiltOperations->getUsername());
        self::assertSame('https://new.example.test/new-proxy', (string) $rebuiltOperations->getApiRequestMaker()->getBaseUri());
        self::assertSame(12, $rebuiltOperations->deserializeInteger(
            $rebuiltOperations->execute_kw('x.custom', 'named_method'),
        ));

        $nativeAfterReset = $builder->buildJson2Client();
        self::assertSame(13, $nativeAfterReset->decode(
            $nativeAfterReset->call('x.custom', 'named_method'),
        ));
        foreach ($secondHttp->getRequests() as $request) {
            self::assertRequestUsesConfiguration(
                $request,
                'https://new.example.test/new-proxy/json/2/x.custom/named_method',
                'new-db',
                'new-key',
            );
        }
    }

    public function testOnlyTheCurrentGenerationSynchronizesStateAndCaches(): void
    {
        $firstHttp = new RecordingHttpClient([
            $this->response('{"uid":21}'),
            $this->response('{"uid":22}'),
            $this->response('7'),
            $this->response('{"uid":23}'),
        ]);
        $builder = $this->builder('https://initial.example.test', 'initial-db', 'initial-key', $firstHttp);
        $firstFacade = $builder->buildObjectOperations();
        $firstFacade->getApiRequestMaker()->setBaseUri($this->uri('https://current.example.test/proxy'));
        $firstFacade->setDatabase('current-db');
        $firstFacade->setPassword('current-key');
        $firstFacade->setUsername('current-label');

        self::assertSame(21, $firstFacade->retrieveUid());
        self::assertNotNull($firstFacade->getLastResponse());

        $builder->setRegistry($builder->buildRegistry());
        $secondFacade = $builder->buildObjectOperations();
        self::assertNotSame($firstFacade, $secondFacade);
        self::assertNull($secondFacade->getLastResponse());
        self::assertSame(22, $secondFacade->retrieveUid());
        $secondLastResponse = $secondFacade->getApiRequestMaker()->getLastResponse();
        self::assertNotNull($secondLastResponse);

        $firstFacade->getApiRequestMaker()->setBaseUri($this->uri('https://retired.example.test'));
        $firstFacade->setDatabase('retired-db');
        $firstFacade->setPassword('retired-key');
        $firstFacade->setUsername('retired-label');
        self::assertNull($firstFacade->getLastResponse());
        self::assertSame($secondLastResponse, $secondFacade->getApiRequestMaker()->getLastResponse());

        $nativeAfterDetachedMutation = $builder->buildJson2Client();
        self::assertSame(7, $nativeAfterDetachedMutation->decode(
            $nativeAfterDetachedMutation->call('x.custom', 'named_method'),
        ));
        self::assertRequestUsesConfiguration(
            $firstHttp->getRequests()[2],
            'https://current.example.test/proxy/json/2/x.custom/named_method',
            'current-db',
            'current-key',
        );

        $builder->setSerializer($builder->buildSerializer());
        $thirdFacade = $builder->buildObjectOperations();
        self::assertNull($thirdFacade->getLastResponse());
        self::assertSame('current-label', $thirdFacade->getUsername());
        self::assertSame(23, $thirdFacade->retrieveUid());

        $secondHttp = new RecordingHttpClient([
            $this->response('{"uid":24}'),
            $this->response('8'),
        ]);
        $builder->setHttpClient($secondHttp);
        $fourthFacade = $builder->buildObjectOperations();
        self::assertNull($fourthFacade->getLastResponse());
        self::assertSame(24, $fourthFacade->retrieveUid());

        $nativeAfterClientReset = $builder->buildJson2Client();
        self::assertSame(8, $nativeAfterClientReset->decode(
            $nativeAfterClientReset->call('x.custom', 'named_method'),
        ));
        foreach ($secondHttp->getRequests() as $request) {
            self::assertRequestUsesConfiguration(
                $request,
                str_ends_with((string) $request->getUri(), '/context_get')
                    ? 'https://current.example.test/proxy/json/2/res.users/context_get'
                    : 'https://current.example.test/proxy/json/2/x.custom/named_method',
                'current-db',
                'current-key',
            );
        }
    }

    private function builder(
        string $host,
        string $database,
        string $apiKey,
        RecordingHttpClient $httpClient,
    ): Json2ApiClientBuilder {
        $builder = new Json2ApiClientBuilder(new Json2Connection($host, $apiKey, $database), '', $apiKey);
        $builder->setHttpClient($httpClient);

        return $builder;
    }

    public function testADetachedFacadeKeepsItsOwnTransportWhenReconfigured(): void
    {
        $oldHttp = new RecordingHttpClient([$this->response('1')]);
        $newHttp = new RecordingHttpClient([]);
        $builder = $this->builder('https://old.example.test', 'old-db', 'test-key', $oldHttp);
        $detached = $builder->buildObjectOperations();
        $builder->setHttpClient($newHttp);
        $detached->setDatabase('other-db');
        $detached->execute_kw('res.partner', 'search_count', [[]]);

        self::assertCount(1, $oldHttp->getRequests());
        self::assertCount(0, $newHttp->getRequests());
        self::assertSame($oldHttp, $detached->getApiRequestMaker()->getHttpClient());
    }

    private function response(string $body): \Psr\Http\Message\ResponseInterface
    {
        return Psr17FactoryDiscovery::findResponseFactory()
            ->createResponse(200)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream($body));
    }

    private function uri(string $uri): UriInterface
    {
        return Psr17FactoryDiscovery::findUriFactory()->createUri($uri);
    }

    private function assertRequestUsesConfiguration(
        \Psr\Http\Message\RequestInterface $request,
        string $uri,
        string $database,
        string $apiKey,
    ): void {
        self::assertSame($uri, (string) $request->getUri());
        self::assertSame($database, $request->getHeaderLine('X-Odoo-Database'));
        self::assertSame('Bearer ' . $apiKey, $request->getHeaderLine('Authorization'));
    }
}
