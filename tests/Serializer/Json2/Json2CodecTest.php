<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2DecodingException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2EncodingException;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Codec;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Dictionary;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class Json2CodecTest extends TestCase
{
    public function testItEncodesNamedParametersWithoutChangingListSemantics(): void
    {
        $codec = new Json2Codec();
        $parameters = [
            'ids' => [3, 5],
            'domain' => [['active', '=', true]],
            'vals' => ['name' => 'Été', 'active' => false, 'ratio' => 1.0, 'parent_id' => null],
            'commands' => [[6, 0, [1, 2]]],
            'context' => [],
            'empty_list' => [],
            'empty_dictionary' => new \stdClass(),
        ];

        self::assertSame(
            '{"ids":[3,5],"domain":[["active","=",true]],"vals":{"name":"Été","active":false,"ratio":1.0,"parent_id":null},"commands":[[6,0,[1,2]]],"context":{},"empty_list":[],"empty_dictionary":{}}',
            $codec->encode($parameters)
        );
    }

    public function testAnEmptyRequestRootIsAnObject(): void
    {
        self::assertSame('{}', (new Json2Codec())->encode([]));
    }

    public function testAnExplicitEmptyDictionaryDoesNotChangeEmptyListValues(): void
    {
        self::assertSame(
            '{"vals":{},"ids":[],"domain":[]}',
            (new Json2Codec())->encode([
                'vals' => new Json2Dictionary(),
                'ids' => [],
                'domain' => [],
            ])
        );
    }

    /** @return iterable<string, array{string, mixed}> */
    public static function jsonRootProvider(): iterable
    {
        yield 'object' => ['{"name":"Ada"}', ['name' => 'Ada']];
        yield 'business result and error keys' => ['{"result":1,"error":false}', ['result' => 1, 'error' => false]];
        yield 'array' => ['[1,"two",false,null]', [1, 'two', false, null]];
        yield 'integer' => ['12', 12];
        yield 'float' => ['1.0', 1.0];
        yield 'string' => ['"hello"', 'hello'];
        yield 'boolean' => ['false', false];
        yield 'null' => ['null', null];
    }

    #[DataProvider('jsonRootProvider')]
    public function testItDecodesEveryJsonRootWithoutRpcEnvelopeHandling(string $payload, mixed $expected): void
    {
        self::assertSame($expected, (new Json2Codec())->decode($payload));
    }

    /** @return iterable<string, array{string}> */
    public static function invalidPayloadProvider(): iterable
    {
        yield 'empty' => [''];
        yield 'whitespace' => [" \n\t"];
        yield 'malformed' => ['{"broken":'];
        yield 'too deep' => ['[[[1]]]'];
    }

    #[DataProvider('invalidPayloadProvider')]
    public function testItRejectsEmptyMalformedOrTooDeepResponses(string $payload): void
    {
        $codec = str_contains($payload, '[[[') ? new Json2Codec(2) : new Json2Codec();

        $this->expectException(Json2DecodingException::class);
        $codec->decode($payload);
    }

    public function testItRejectsInvalidNamedKeys(): void
    {
        $codec = new Json2Codec();

        $this->expectException(\InvalidArgumentException::class);
        /** @phpstan-ignore-next-line Testing runtime validation outside the documented contract. */
        $codec->encode([0 => 'not named']);
    }

    /** @return iterable<string, array{mixed}> */
    public static function unencodableValueProvider(): iterable
    {
        yield 'invalid UTF-8' => ["\xB1\x31"];
        yield 'infinity' => [INF];
        yield 'not a number' => [NAN];
    }

    #[DataProvider('unencodableValueProvider')]
    public function testItReportsEncodingErrorsWithoutDumpingValues(mixed $value): void
    {
        try {
            (new Json2Codec())->encode(['value' => $value]);
            self::fail('An unencodable value was accepted.');
        } catch (Json2EncodingException $exception) {
            self::assertSame('The JSON-2 request parameters could not be encoded.', $exception->getMessage());
        }
    }

    public function testDepthMustBePositive(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Json2Codec(0);
    }
}
