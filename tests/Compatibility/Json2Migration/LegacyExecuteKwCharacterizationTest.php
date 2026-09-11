<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration;

use FluxSE\OdooApiClient\Api\Factory\RequestBodyFactoryInterface;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\ObjectOperations;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration\Fixture\ThirdPartyExecuteKwOperations;

final class LegacyExecuteKwCharacterizationTest extends TestCase
{
    public function testAbsentWrapperArgumentsAreRepresentedByNestedEmptyList(): void
    {
        $calls = [];
        $objectOperations = $this->recordingObjectOperations($calls, []);
        $operations = new RecordListOperations($objectOperations);

        self::assertSame([], $operations->search('res.partner'));
        self::assertSame([
            ['res.partner', 'search', [[]], []],
        ], $calls);
    }

    public function testEmptySearchDomainsKeepTheirIntentionalExtraListLevel(): void
    {
        $calls = [];
        $objectOperations = $this->recordingObjectOperations($calls, []);
        $operations = new RecordListOperations($objectOperations);

        $operations->search('res.partner', new SearchDomains());

        self::assertSame([['res.partner', 'search', [[]], []]], $calls);
    }

    public function testDomainsAndFalsySearchOptionsAreNotFiltered(): void
    {
        $calls = [];
        $objectOperations = $this->recordingObjectOperations($calls, []);
        $operations = new RecordListOperations($objectOperations);
        $domains = new SearchDomains();
        $domains->addCriterion(Criterion::equal('active', false));
        $options = new SearchOptions();
        $options->setOffset(0);
        $options->setLimit(0);
        $options->setOrder(null);

        $operations->search('res.partner', $domains, $options);

        self::assertSame([[
            'res.partner',
            'search',
            [[['active', '=', false]]],
            ['offset' => 0, 'order' => null, 'limit' => 0],
        ]], $calls);
    }

    public function testFieldsGetPassesANonEmptyFieldListAsFlatArguments(): void
    {
        $calls = [];
        $objectOperations = $this->recordingObjectOperations($calls, ['name' => ['type' => 'char']]);
        $operations = new InspectionOperations($objectOperations);

        self::assertSame(
            ['name' => ['type' => 'char']],
            $operations->fields_get('res.partner', ['name', 'email']),
        );
        self::assertSame([[
            'res.partner',
            'fields_get',
            ['name', 'email'],
            [],
        ]], $calls);
    }

    public function testSearchCountForwardsAllSearchOptionsIncludingNeutralDefaults(): void
    {
        $calls = [];
        $objectOperations = $this->recordingObjectOperations($calls, 8);
        $operations = new RecordListOperations($objectOperations);
        $options = new SearchOptions();

        self::assertSame(8, $operations->search_count('res.partner', null, $options));
        self::assertSame([[
            'res.partner',
            'search_count',
            [[]],
            ['offset' => 0, 'order' => null, 'limit' => null],
        ]], $calls);
    }

    public function testObjectOperationsCachesUidAcrossCredentialSetters(): void
    {
        $maker = $this->createMock(OdooApiRequestMakerInterface::class);
        $bodyFactory = $this->createMock(RequestBodyFactoryInterface::class);
        $helper = $this->createMock(RpcSerializerHelperInterface::class);
        $common = $this->createMock(CommonOperationsInterface::class);
        $common->method('getApiRequestMaker')->willReturn($maker);
        $common->method('getRequestBodyFactory')->willReturn($bodyFactory);
        $common->method('getRpcSerializerHelper')->willReturn($helper);
        $common->expects(self::once())
            ->method('authenticate')
            ->with('db-one', 'login-one', 'credential-one')
            ->willReturn(41);
        $operations = new ObjectOperations('db-one', 'login-one', 'credential-one', $common);

        self::assertSame(41, $operations->retrieveUid());
        $operations->setDatabase('db-two');
        $operations->setUsername('login-two');
        $operations->setPassword('credential-two');

        self::assertSame(41, $operations->retrieveUid());
        self::assertSame('db-two', $operations->getDatabase());
        self::assertSame('login-two', $operations->getUsername());
        self::assertSame('credential-two', $operations->getPassword());
    }

    public function testBuilderCachesObjectAndThirdPartyOperationsByClassNotCredentials(): void
    {
        $builder = new OdooApiClientBuilder('https://odoo.invalid');

        $firstObject = $builder->buildObjectOperations('db-one', 'login-one', 'credential-one');
        $secondObject = $builder->buildObjectOperations('db-two', 'login-two', 'credential-two');
        self::assertSame($firstObject, $secondObject);
        self::assertSame('db-one', $secondObject->getDatabase());
        self::assertSame('login-one', $secondObject->getUsername());
        self::assertSame('credential-one', $secondObject->getPassword());

        $firstExtension = $builder->buildExecuteKwOperations(
            ThirdPartyExecuteKwOperations::class,
            'db-one',
            'login-one',
            'credential-one',
        );
        $secondExtension = $builder->buildExecuteKwOperations(
            ThirdPartyExecuteKwOperations::class,
            'db-two',
            'login-two',
            'credential-two',
        );
        self::assertSame($firstExtension, $secondExtension);
        self::assertSame($firstObject, $firstExtension->getObjectOperations());
    }

    /**
     * @param array<int, array{string, string, array<mixed>, array<string, mixed>}> $calls
     * @param array<mixed>|int $decoded
     * @return ObjectOperationsInterface&MockObject
     */
    private function recordingObjectOperations(array &$calls, array|int $decoded): ObjectOperationsInterface
    {
        $objectOperations = $this->createMock(ObjectOperationsInterface::class);
        $objectOperations->method('execute_kw')->willReturnCallback(
            static function (string $model, string $method, array $arguments, array $options) use (&$calls): Response {
                $calls[] = [$model, $method, $arguments, $options];

                return new Response(200, ['Content-Type' => 'application/json'], '{"result":true}');
            },
        );
        $objectOperations->method('decode')->willReturn(is_array($decoded) ? $decoded : []);
        $objectOperations->method('deserializeInteger')->willReturn(is_int($decoded) ? $decoded : 0);

        return $objectOperations;
    }
}
