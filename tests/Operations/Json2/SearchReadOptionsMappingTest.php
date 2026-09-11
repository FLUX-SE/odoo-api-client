<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\HttpClient\Json2\RecordingHttpClient;

final class SearchReadOptionsMappingTest extends TestCase
{
    public function testSearchReadLoadNullReachesTheJson2RequestBodyThroughTheRealWrapper(): void
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse(200)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream('[]'));
        $httpClient = new RecordingHttpClient([$response]);
        $builder = new Json2ApiClientBuilder(
            new Json2Connection('https://odoo.example.test/prefix', 'api-key', 'test-db'),
            'compatibility-label',
            'api-key',
        );
        $builder->setHttpClient($httpClient);
        $options = new SearchReadOptions();
        $options->addOption('load', null);

        self::assertSame(
            [],
            $builder->buildRecordListOperations()->search_read('res.partner', new SearchDomains(), $options),
        );

        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests);
        self::assertSame(
            [
                'domain' => [],
                'offset' => 0,
                'order' => null,
                'limit' => null,
                'fields' => [],
                'load' => null,
            ],
            json_decode((string) $requests[0]->getBody(), true, flags: JSON_THROW_ON_ERROR),
        );
        self::assertSame(
            'https://odoo.example.test/prefix/json/2/res.partner/search_read',
            (string) $requests[0]->getUri(),
        );
    }
}
