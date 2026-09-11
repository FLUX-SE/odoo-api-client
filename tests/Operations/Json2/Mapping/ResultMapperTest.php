<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\CallMapper;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidMappedResultException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MappedCall;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ResultMapper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ResultMapperTest extends TestCase
{
    #[DataProvider('identityResultProvider')]
    public function testIdentityResultsAreNeverCoerced(mixed $result): void
    {
        $call = new MappedCall('custom.model', 'native_method', []);

        self::assertSame($result, (new ResultMapper())->map($call, $result));
    }

    /** @return iterable<string, array{mixed}> */
    public static function identityResultProvider(): iterable
    {
        yield 'null' => [null];
        yield 'false' => [false];
        yield 'zero' => [0];
        yield 'float' => [1.5];
        yield 'empty list' => [[]];
        yield 'business object containing result and error keys' => [['result' => 0, 'error' => false]];
    }

    public function testAUnitaryLegacyCreateReturnsItsOnlyIntegerId(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [['name' => 'Ada']]);

        self::assertSame(17, (new ResultMapper())->map($call, [17]));
    }

    public function testAMultipleCreatePreservesAOneElementIdList(): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [[['name' => 'Ada']]]);

        self::assertSame([17], (new ResultMapper())->map($call, [17]));
    }

    #[DataProvider('invalidSingleCreateResultProvider')]
    public function testAUnitaryCreateRequiresExactlyOneIntegerId(mixed $result): void
    {
        $call = $this->mapper()->map('res.partner', 'create', [['name' => 'Ada']]);
        $this->expectException(InvalidMappedResultException::class);

        (new ResultMapper())->map($call, $result);
    }

    /** @return iterable<string, array{mixed}> */
    public static function invalidSingleCreateResultProvider(): iterable
    {
        yield 'null' => [null];
        yield 'scalar id' => [12];
        yield 'empty list' => [[]];
        yield 'too many ids' => [[1, 2]];
        yield 'string id' => [['12']];
        yield 'associative array' => [['id' => 12]];
    }

    private function mapper(): CallMapper
    {
        return new CallMapper(new MethodSignatureRegistry());
    }
}
