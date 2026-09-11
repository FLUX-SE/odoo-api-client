<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Operations\Json2\Json2ObjectOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2FacadeIntegrationTest extends Json2IntegrationTestCase
{
    public function testSyntheticAndNativeResponsesRemainDistinct(): void
    {
        $builder = $this->requireJson2Environment()->createBuilder();
        $operations = $builder->buildObjectOperations();
        $synthetic = $operations->execute_kw('res.partner', 'search', [[]], ['limit' => 1]);
        $result = $operations->decode($synthetic);

        self::assertContainsOnly('int', $result);
        self::assertSame($synthetic, $operations->getLastResponse());
        $syntheticPayload = json_decode((string) $synthetic->getBody(), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($syntheticPayload);
        self::assertSame('2.0', $syntheticPayload['jsonrpc'] ?? null);
        self::assertSame(Json2ObjectOperations::COMPATIBILITY_RESPONSE_ID, $syntheticPayload['id'] ?? null);
        self::assertSame($result, $syntheticPayload['result'] ?? null);

        $native = $operations->getJson2Client()->getLastResponse();
        self::assertNotNull($native);
        self::assertNotSame($synthetic, $native);
        self::assertSame($result, $operations->getJson2Client()->decode($native));
        self::assertStringNotContainsString('json2-compat', (string) $native->getBody());
    }

    public function testUidFieldsSearchAndDefaultGetThroughCompatibilityWrappers(): void
    {
        $builder = $this->requireJson2Environment()->createBuilder();
        $operations = $builder->buildObjectOperations();
        self::assertGreaterThan(0, $operations->retrieveUid());
        self::assertSame($operations->retrieveUid(), $operations->retrieveUid(), 'The resolved UID is cached per facade.');

        $fieldOptions = new FieldsGetOptions();
        $fieldOptions->setAttributes(['type', 'required']);
        $fields = $builder->buildInspectionOperations()->fields_get('res.partner', ['name'], $fieldOptions);
        self::assertArrayHasKey('name', $fields);

        $searched = $builder->buildRecordListOperations()->search('res.partner');
        self::assertContainsOnly('int', $searched);

        $arguments = new Arguments();
        $arguments->addArgument(['name', 'company_id']);
        $defaults = $builder->buildRecordListOperations()->execute_kw_action(
            'res.partner',
            'default_get',
            $arguments,
        );
        self::assertIsArray($defaults);
    }
}
