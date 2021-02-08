<?php

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use PHPUnit\Framework\TestCase;

class CriterionLogicsTest extends TestCase
{
    public function testAnd(): void
    {
        $c1 = Criterion::equal('field1', true);
        $c2 = Criterion::equal('field2', false);

        $c = Criterion::and($c1, $c2);

        $this->assertEquals([
            '&',
            ['field1', '=', true],
            ['field2', '=', false],
        ], $c->toArray());
    }

    public function testOr(): void
    {
        $c1 = Criterion::equal('field1', true);
        $c2 = Criterion::equal('field2', false);

        $c = Criterion::or($c1, $c2);

        $this->assertEquals([
            '|',
            ['field1', '=', true],
            ['field2', '=', false],
        ], $c->toArray());
    }

    public function testNot(): void
    {
        $c1 = Criterion::equal('field1', true);

        $c = Criterion::not($c1);

        $this->assertEquals([
            '!',
            ['field1', '=', true],
        ], $c->toArray());
    }

    public function testMixed2Levels(): void
    {
        $c1_1 = Criterion::equal('field1', true);
        $c2_1 = Criterion::equal('field2', false);

        $c1 = Criterion::and($c1_1, $c2_1);

        $c1_2 = Criterion::equal('field3', true);
        $c2_2 = Criterion::equal('field4', false);

        $c2 = Criterion::and($c1_2, $c2_2);

        $c = Criterion::or($c1, $c2);

        $this->assertEquals([
            '|',
            '&',
            ['field1', '=', true],
            ['field2', '=', false],
            '&',
            ['field3', '=', true],
            ['field4', '=', false],
        ], $c->toArray());
    }

    public function testMixed3Levels(): void
    {
        $c1_1 = Criterion::equal('field1', true);
        $c2_1 = Criterion::equal('field2', false);

        $c1 = Criterion::and($c1_1, $c2_1);

        $c1_2 = Criterion::equal('field3', true);
        $c2_2 = Criterion::equal('field4', false);

        $c2 = Criterion::and($c1_2, $c2_2);

        $c1_3 = Criterion::equal('field5', true);
        $c2_3 = Criterion::equal('field6', false);

        $c3 = Criterion::and($c1_3, $c2_3);

        $c0 = Criterion::or($c1, $c2);
        $c = Criterion::or($c0, $c3);

        $this->assertEquals([
            '|',
            '|',
            '&',
            ['field1', '=', true],
            ['field2', '=', false],
            '&',
            ['field3', '=', true],
            ['field4', '=', false],
            '&',
            ['field5', '=', true],
            ['field6', '=', false],
        ], $c->toArray());
    }
}
