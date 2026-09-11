<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2HttpException;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodScope;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignature;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2EndToEndIntegrationTest extends Json2IntegrationTestCase
{
    public function testAnInvalidKeyIsRejected(): void
    {
        $environment = $this->requireJson2Environment();
        $key = 'intentionally-invalid-integration-key';
        $client = (new Json2ApiClientBuilder($environment->createConnection()->withApiKey($key), apiKey: $key))->buildJson2Client();
        try {
            $client->call('res.users', 'context_get');
            self::fail('An invalid API key was accepted.');
        } catch (Json2HttpException $error) {
            self::assertSame(401, $error->getStatusCode());
        }
    }

    public function testARestrictedUserCannotReadAccountingMoves(): void
    {
        $environment = $this->requireJson2Environment();
        $key = $this->requiredFixtureVariable('ODOO_JSON2_RESTRICTED_API_KEY');
        $client = (new Json2ApiClientBuilder($environment->createConnection()->withApiKey($key), apiKey: $key))->buildJson2Client();
        try {
            $client->call('account.move', 'search', ['domain' => []]);
            self::fail('The restricted user unexpectedly has accounting access.');
        } catch (Json2HttpException $error) {
            self::assertSame(403, $error->getStatusCode());
            self::assertSame('odoo.exceptions.AccessError', $error->getErrorName());
        }
    }

    public function testCustomMethodsWorkNativelyAndWithAnExplicitSignature(): void
    {
        $environment = $this->requireJson2Environment(true);
        $builder = $environment->createWriteBuilder();
        $builder->setRegistry(new MethodSignatureRegistry([
            new MethodSignature('json2.fixture', 'calculate_total', MethodScope::MODEL, ['lines'], ['lines', 'context'], ['lines']),
        ]));
        $native = $builder->buildJson2Client();
        self::assertSame(3.5, $native->decode($native->call('json2.fixture', 'calculate_total', ['lines' => [1.5, 2]])));
        $facade = $builder->buildObjectOperations();
        self::assertSame(3, $facade->deserializeInteger($facade->execute_kw('json2.fixture', 'calculate_total', [[1, 2]])));
        $context = ['lang' => 'en_US', 'allowed_company_ids' => [(int) $this->requiredFixtureVariable('ODOO_JSON2_PAYMENT_COMPANY_ID')]];
        self::assertSame($context, $native->decode($native->call('json2.fixture', 'inspect_context', ['context' => $context])));
    }

    public function testMultipleCreateAndReadsAgreeWithHistoricalRpc(): void
    {
        $environment = $this->requireJson2Environment(true);
        $builder = $environment->createWriteBuilder();
        $native = $builder->buildJson2Client();
        $ids = $native->decode($native->call('json2.fixture', 'create', ['vals_list' => [
            ['name' => 'First ' . $environment->runId()], ['name' => 'Second ' . $environment->runId()],
        ]]));
        self::assertIsArray($ids);
        self::assertCount(2, $ids);
        self::assertContainsOnly('int', $ids);
        try {
            $rpc = (new OdooApiClientBuilder($environment->host()))->buildObjectOperations(
                $environment->database(),
                $this->requiredFixtureVariable('ODOO_JSON2_LOGIN'),
                $this->requiredFixtureVariable('ODOO_JSON2_API_KEY'),
            );
            $fields = ['id', 'name'];
            $expected = $native->decode($native->call('json2.fixture', 'read', ['ids' => $ids, 'fields' => $fields]));
            self::assertSame($expected, $rpc->decode($rpc->execute_kw('json2.fixture', 'read', [$ids], ['fields' => $fields])));
            $facade = $builder->buildObjectOperations();
            $domain = [['id', 'in', $ids]];
            self::assertSame($expected, $facade->decode($facade->execute_kw('json2.fixture', 'search_read', [$domain, $fields, 0, 2, 'id'], ['load' => null])));
            self::assertSame($ids, $facade->decode($facade->execute_kw('json2.fixture', 'search', [$domain, 0, 2, 'id'])));
            self::assertSame(1, $facade->deserializeInteger($facade->execute_kw('json2.fixture', 'search_count', [$domain, 1])));
        } finally {
            $native->call('json2.fixture', 'unlink', ['ids' => $ids]);
        }
    }

    private function requiredFixtureVariable(string $name): string
    {
        $value = getenv($name);
        if (!is_string($value) || '' === $value) {
            self::markTestSkipped('The Docker fixture variable ' . $name . ' is required.');
        }

        return $value;
    }
}
