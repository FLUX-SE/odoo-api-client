<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodScope;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignature;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ReturnRule;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Codec;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Dictionary;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CallMapperTest extends TestCase
{
    /**
     * @param mixed[] $arguments
     * @param array<string, mixed> $options
     * @param array<string, mixed> $expectedParameters
     */
    #[DataProvider('standardCallProvider')]
    public function testItMapsTheCompleteStandardCallMatrix(
        string $model,
        string $method,
        array $arguments,
        array $options,
        array $expectedParameters,
        ReturnRule $expectedReturnRule = ReturnRule::IDENTITY,
    ): void {
        $mappedCall = $this->mapper()->map($model, $method, $arguments, $options);

        self::assertSame($model, $mappedCall->getModel());
        self::assertSame($method, $mappedCall->getMethod());
        self::assertSame($expectedParameters, $mappedCall->getParameters());
        self::assertSame($expectedReturnRule, $mappedCall->getReturnRule());
        self::assertNotNull($mappedCall->getSignature());
    }

    /** @return iterable<string, array{string, string, mixed[], mixed[], array<string, mixed>, 5?: ReturnRule}> */
    public static function standardCallProvider(): iterable
    {
        $domain = [['active', '=', false]];
        $commands = [[6, 0, [4, 7]]];

        yield 'search preserves domain and falsy options' => [
            'res.partner',
            'search',
            [$domain],
            ['offset' => 0, 'limit' => 0, 'order' => null],
            ['domain' => $domain, 'offset' => 0, 'limit' => 0, 'order' => null],
        ];
        yield 'search_count removes only known neutral wrapper options' => [
            'res.partner',
            'search_count',
            [[]],
            ['offset' => 0, 'order' => null, 'limit' => null],
            ['domain' => [], 'limit' => null],
        ];
        yield 'search_read remains one native operation' => [
            'res.partner',
            'search_read',
            [$domain],
            ['fields' => [], 'offset' => 0, 'limit' => 1, 'order' => 'name'],
            ['domain' => $domain, 'fields' => [], 'offset' => 0, 'limit' => 1, 'order' => 'name'],
        ];
        yield 'read maps scalar id to a recordset and preserves null load' => [
            'res.partner',
            'read',
            [7, [], null],
            [],
            ['ids' => [7], 'fields' => [], 'load' => null],
        ];
        yield 'single create wraps one dictionary and records scalar facade rule' => [
            'res.partner',
            'create',
            [['name' => 'Ada', 'category_id' => false, 'tag_ids' => $commands]],
            ['context' => []],
            ['vals_list' => [['name' => 'Ada', 'category_id' => false, 'tag_ids' => $commands]], 'context' => []],
            ReturnRule::SINGLE_CREATED_ID,
        ];
        yield 'multiple create preserves every dictionary' => [
            'res.partner',
            'create',
            [[['name' => 'Ada'], ['name' => 'Grace']]],
            [],
            ['vals_list' => [['name' => 'Ada'], ['name' => 'Grace']]],
            ReturnRule::CREATED_IDS,
        ];
        yield 'write preserves false zero null and relation commands' => [
            'res.partner',
            'write',
            [9, ['active' => false, 'sequence' => 0, 'parent_id' => null, 'tag_ids' => $commands]],
            [],
            ['ids' => [9], 'vals' => ['active' => false, 'sequence' => 0, 'parent_id' => null, 'tag_ids' => $commands]],
        ];
        yield 'unlink preserves an ids list' => [
            'res.partner',
            'unlink',
            [[2, 3]],
            [],
            ['ids' => [2, 3]],
        ];
        yield 'fields_get follows its low-level positional signature' => [
            'res.partner',
            'fields_get',
            [['name', 'email'], ['string', 'type']],
            [],
            ['allfields' => ['name', 'email'], 'attributes' => ['string', 'type']],
        ];
        yield 'default_get uses the Odoo 19 fields name' => [
            'res.partner',
            'default_get',
            [['company_type']],
            [],
            ['fields' => ['company_type']],
        ];
        yield 'check_access_rights keeps false' => [
            'res.partner',
            'check_access_rights',
            ['read'],
            ['raise_exception' => false],
            ['operation' => 'read', 'raise_exception' => false],
        ];
        yield 'action_post maps scalar id only for its exact recordset signature' => [
            'account.move',
            'action_post',
            [42],
            [],
            ['ids' => [42]],
        ];
        yield 'action_create_payments preserves context' => [
            'account.payment.register',
            'action_create_payments',
            [21],
            ['context' => ['active_ids' => [5], 'active_model' => 'account.move']],
            ['ids' => [21], 'context' => ['active_ids' => [5], 'active_model' => 'account.move']],
        ];
    }

    /**
     * @param mixed[] $arguments
     * @param array<string, mixed> $options
     * @param array<string, mixed> $expectedParameters
     */
    #[DataProvider('r2ReproductionProvider')]
    public function testItMapsTheOdoo19OrmCallsFromR2(
        string $method,
        array $arguments,
        array $options,
        array $expectedParameters,
    ): void {
        $call = $this->mapper()->map('res.partner', $method, $arguments, $options);

        self::assertSame($expectedParameters, $call->getParameters());
    }

    /** @return iterable<string, array{string, mixed[], array<string, mixed>, array<string, mixed>}> */
    public static function r2ReproductionProvider(): iterable
    {
        yield 'search positional offset and limit' => [
            'search',
            [[], 0, 10],
            [],
            ['domain' => [], 'offset' => 0, 'limit' => 10],
        ];
        yield 'search_count positional limit' => [
            'search_count',
            [[], 10],
            [],
            ['domain' => [], 'limit' => 10],
        ];
        yield 'search_read named read load' => [
            'search_read',
            [[]],
            ['load' => null],
            ['domain' => [], 'load' => null],
        ];
    }

    /**
     * @param mixed[] $arguments
     * @param array<string, mixed> $expectedParameters
     */
    #[DataProvider('completeOdoo19SearchPositionalsProvider')]
    public function testItPreservesEverySupportedOdoo19SearchPositional(
        string $method,
        array $arguments,
        array $expectedParameters,
    ): void {
        $call = $this->mapper()->map('res.partner', $method, $arguments);

        self::assertSame($expectedParameters, $call->getParameters());
    }

    /** @return iterable<string, array{string, mixed[], array<string, mixed>}> */
    public static function completeOdoo19SearchPositionalsProvider(): iterable
    {
        yield 'search preserves zero and null' => [
            'search',
            [[], 0, 0, null],
            ['domain' => [], 'offset' => 0, 'limit' => 0, 'order' => null],
        ];
        yield 'search_count preserves a zero limit' => [
            'search_count',
            [[], 0],
            ['domain' => [], 'limit' => 0],
        ];
        yield 'search_read preserves empty fields zero and null' => [
            'search_read',
            [[], [], 0, 0, null],
            ['domain' => [], 'fields' => [], 'offset' => 0, 'limit' => 0, 'order' => null],
        ];
    }

    /**
     * @param mixed[] $arguments
     * @param array<string, mixed> $expectedParameters
     */
    #[DataProvider('argumentShapeProvider')]
    public function testItDistinguishesOmittedEmptyNestedEmptyAndNullArguments(
        array $arguments,
        array $expectedParameters,
    ): void {
        $mappedCall = $this->mapper()->map('res.partner', 'search_read', $arguments);

        self::assertSame($expectedParameters, $mappedCall->getParameters());
    }

    /** @return iterable<string, array{mixed[], array<string, mixed>}> */
    public static function argumentShapeProvider(): iterable
    {
        yield 'omitted or empty outer list' => [[], []];
        yield 'nested empty list' => [[[]], ['domain' => []]];
        yield 'explicit null' => [[null], ['domain' => null]];
        yield 'false' => [[false], ['domain' => false]];
        yield 'zero' => [[0], ['domain' => 0]];
    }

    public function testAOneElementMultipleCreateRemainsMultiple(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [[['name' => 'only']]]);

        self::assertSame(['vals_list' => [['name' => 'only']]], $call->getParameters());
        self::assertSame(ReturnRule::CREATED_IDS, $call->getReturnRule());
    }

    public function testAnEmptyDictionaryStillRepresentsAUnitaryLegacyCreate(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [[]]);

        $parameters = $call->getParameters();
        $values = $parameters['vals_list'] ?? null;
        self::assertIsArray($values);
        self::assertInstanceOf(Json2Dictionary::class, $values[0] ?? null);
        self::assertSame('{"vals_list":[{}]}', (new Json2Codec())->encode($parameters));
        self::assertSame(ReturnRule::SINGLE_CREATED_ID, $call->getReturnRule());
    }

    public function testEmptyDictionariesInsideAMultipleCreateRemainDictionaries(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [[[], ['name' => 'Ada']]]);

        $parameters = $call->getParameters();
        $values = $parameters['vals_list'] ?? null;
        self::assertIsArray($values);
        self::assertInstanceOf(Json2Dictionary::class, $values[0] ?? null);
        self::assertSame(
            '{"vals_list":[{},{"name":"Ada"}]}',
            (new Json2Codec())->encode($parameters),
        );
        self::assertSame(ReturnRule::CREATED_IDS, $call->getReturnRule());
    }

    public function testAnEmptyWriteValueDictionaryIsNotEncodedAsAList(): void
    {
        $call = $this->mapper()->map('res.partner', 'write', [[1], []]);

        $parameters = $call->getParameters();
        self::assertInstanceOf(Json2Dictionary::class, $parameters['vals']);
        self::assertSame('{"ids":[1],"vals":{}}', (new Json2Codec())->encode($parameters));
    }

    public function testOtherEmptyCollectionsKeepTheirListSemantics(): void
    {
        $search = $this->mapper()->map('res.partner', 'search_read', [[]], ['fields' => [], 'context' => []]);
        $read = $this->mapper()->map('res.partner', 'read', [[]], ['fields' => []]);

        self::assertSame([], $search->getParameters()['domain']);
        self::assertSame([], $search->getParameters()['fields']);
        self::assertSame([], $search->getParameters()['context']);
        self::assertSame([], $read->getParameters()['ids']);
        self::assertSame([], $read->getParameters()['fields']);
        self::assertSame(
            '{"domain":[],"fields":[],"context":{}}',
            (new Json2Codec())->encode($search->getParameters()),
        );
    }

    public function testANativeNamedCreatePreservesItsListAndReturnCardinality(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [], ['vals_list' => [['name' => 'only']]]);

        self::assertSame(['vals_list' => [['name' => 'only']]], $call->getParameters());
        self::assertSame(ReturnRule::CREATED_IDS, $call->getReturnRule());
    }

    public function testAnUnknownMethodCanBeCalledWithNamedParametersOnly(): void
    {
        $call = $this->mapper()->map(
            'custom.model',
            'compute_answer',
            [],
            ['payload' => [1, 2], 'enabled' => false, 'nothing' => null],
        );

        self::assertSame(
            ['payload' => [1, 2], 'enabled' => false, 'nothing' => null],
            $call->getParameters(),
        );
        self::assertNull($call->getSignature());
    }

    public function testAnUnknownPositionalActionIsRejectedWithoutNameHeuristics(): void
    {
        $this->expectException(InvalidCallMappingException::class);
        $this->expectExceptionMessage('Positional arguments are not supported');

        $this->mapper()->map('custom.model', 'action_looks_familiar', [12]);
    }

    public function testARegisteredCustomModelArrayIsNotTreatedAsARecordset(): void
    {
        $registry = new MethodSignatureRegistry([
            new MethodSignature(
                'custom.model',
                'consume',
                MethodScope::MODEL,
                ['payload'],
                ['payload', 'context'],
                ['payload'],
                provenance: 'custom module',
            ),
        ]);

        $call = (new CallMapper($registry))->map('custom.model', 'consume', [[4, 7]]);

        self::assertSame(['payload' => [4, 7]], $call->getParameters());
    }

    public function testAnExactSearchOverrideUsesItsOwnSignatureAndOptions(): void
    {
        $registry = new MethodSignatureRegistry([
            new MethodSignature(
                'custom.model',
                'search_count',
                MethodScope::MODEL,
                ['query'],
                ['query', 'offset'],
                ['query'],
                provenance: 'custom module',
            ),
        ]);

        $call = (new CallMapper($registry))->map('custom.model', 'search_count', ['all'], ['offset' => 3]);

        self::assertSame(['query' => 'all', 'offset' => 3], $call->getParameters());
    }

    #[DataProvider('invalidSearchCountOptionProvider')]
    public function testSearchCountRejectsNonNeutralUnsupportedOptions(string $name, mixed $value): void
    {
        $this->expectException(InvalidCallMappingException::class);

        $this->mapper()->map('res.partner', 'search_count', [[]], [$name => $value]);
    }

    /** @return iterable<string, array{string, mixed}> */
    public static function invalidSearchCountOptionProvider(): iterable
    {
        yield 'non-zero offset' => ['offset', 1];
        yield 'order expression' => ['order', 'name'];
        yield 'unknown falsy option is not silently discarded' => ['active_test', false];
    }

    public function testPositionAndNameCollisionIsRejectedEvenWhenTheValueIsNull(): void
    {
        $this->expectException(InvalidCallMappingException::class);
        $this->expectExceptionMessage('both positionally and by name');

        $this->mapper()->map('res.partner', 'search_read', [null], ['domain' => []]);
    }

    /** @param mixed[] $arguments */
    #[DataProvider('newPositionalCollisionProvider')]
    public function testNewOdoo19PositionalsCannotCollideWithNamedOptions(
        string $method,
        array $arguments,
        string $option,
        mixed $value,
    ): void {
        $this->expectException(InvalidCallMappingException::class);
        $this->expectExceptionMessage('both positionally and by name');

        $this->mapper()->map('res.partner', $method, $arguments, [$option => $value]);
    }

    /** @return iterable<string, array{string, mixed[], string, mixed}> */
    public static function newPositionalCollisionProvider(): iterable
    {
        yield 'search offset' => ['search', [[], 0], 'offset', 1];
        yield 'search_count limit' => ['search_count', [[], 10], 'limit', 20];
        yield 'search_read null order' => ['search_read', [[], [], 0, 1, null], 'order', null];
    }

    public function testIdsCollisionIsRejectedBeforeRecordsetNormalisation(): void
    {
        $this->expectException(InvalidCallMappingException::class);
        $this->expectExceptionMessage('both positionally and by name');

        $this->mapper()->map('res.partner', 'read', [1], ['ids' => [2]]);
    }

    public function testContextCollisionIsRejectedForAnExplicitCustomSignature(): void
    {
        $registry = new MethodSignatureRegistry([
            new MethodSignature(
                'custom.model',
                'do_it',
                MethodScope::RECORDSET,
                ['ids', 'context'],
                ['ids', 'context'],
                ['ids'],
                provenance: 'custom module',
            ),
        ]);
        $this->expectException(InvalidCallMappingException::class);
        $this->expectExceptionMessage('both positionally and by name');

        (new CallMapper($registry))->map('custom.model', 'do_it', [1, null], ['context' => []]);
    }

    /**
     * @param mixed[] $arguments
     * @param mixed[] $options
     */
    #[DataProvider('invalidStructuralCallProvider')]
    public function testInvalidStructuralCallsAreRejected(
        string $model,
        string $method,
        array $arguments,
        array $options,
    ): void {
        $this->expectException(InvalidCallMappingException::class);

        $this->mapper()->map($model, $method, $arguments, $options);
    }

    /** @return iterable<string, array{string, string, mixed[], mixed[]}> */
    public static function invalidStructuralCallProvider(): iterable
    {
        yield 'associative positional container' => ['res.partner', 'search', ['domain' => []], []];
        yield 'numeric option key' => ['custom.model', 'native', [], [0 => 'value']];
        yield 'too many positionals' => ['res.partner', 'unlink', [[1], true], []];
        yield 'too many search positionals' => ['res.partner', 'search', [[], 0, 10, null, false], []];
        yield 'too many search_count positionals' => ['res.partner', 'search_count', [[], 10, false], []];
        yield 'too many search_read positionals' => ['res.partner', 'search_read', [[], [], 0, 10, null, false], []];
        yield 'unknown search_read read kwarg' => ['res.partner', 'search_read', [[]], ['prefetch_fields' => false]];
        yield 'missing required domain' => ['res.partner', 'search', [], []];
        yield 'missing required values' => ['res.partner', 'create', [], []];
        yield 'invalid scalar create values' => ['res.partner', 'create', ['invalid'], []];
        yield 'invalid multiple create member' => ['res.partner', 'create', [[['name' => 'ok'], false]], []];
        yield 'named create must already be a vals list' => ['res.partner', 'create', [], ['vals_list' => ['name' => 'Ada']]];
        yield 'null recordset ids' => ['res.partner', 'read', [null], []];
        yield 'associative recordset ids' => ['res.partner', 'read', [['id' => 1]], []];
        yield 'non-integer recordset id' => ['res.partner', 'read', [['1']], []];
    }

    private function mapper(): CallMapper
    {
        return new CallMapper(new MethodSignatureRegistry());
    }
}
