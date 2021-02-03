<?php

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use PHPUnit\Framework\TestCase;

class CriterionOperatorsTest extends TestCase
{
    public function testEqual(): void
    {
        $c = Criterion::equal('field1', true);

        $this->assertEquals([
            ['field1', '=', true]
        ], $c->toArray());
    }

    public function testChildOf(): void
    {
        $c = Criterion::child_of('field1', true);

        $this->assertEquals([
            ['field1', 'child_of', true]
        ], $c->toArray());
    }

    public function testEqualIlike(): void
    {
        $c = Criterion::equal_ilike('field1', true);

        $this->assertEquals([
            ['field1', '=ilike', true]
        ], $c->toArray());
    }

    public function testEqualLike(): void
    {
        $c = Criterion::equal_like('field1', true);

        $this->assertEquals([
            ['field1', '=like', true]
        ], $c->toArray());
    }

    public function testGreaterThan(): void
    {
        $c = Criterion::greater_than('field1', true);

        $this->assertEquals([
            ['field1', '>', true]
        ], $c->toArray());
    }

    public function testGreaterThanEqual(): void
    {
        $c = Criterion::greater_than_equal('field1', true);

        $this->assertEquals([
            ['field1', '>=', true]
        ], $c->toArray());
    }

    public function testIlike(): void
    {
        $c = Criterion::ilike('field1', true);

        $this->assertEquals([
            ['field1', 'ilike', true]
        ], $c->toArray());
    }

    public function testIn(): void
    {
        $c = Criterion::in('field1', [true]);

        $this->assertEquals([
            ['field1', 'in', [true]]
        ], $c->toArray());
    }

    public function testLessThan(): void
    {
        $c = Criterion::less_than('field1', true);

        $this->assertEquals([
            ['field1', '<', true]
        ], $c->toArray());
    }

    public function testLessThanEqual(): void
    {
        $c = Criterion::less_than_equal('field1', true);

        $this->assertEquals([
            ['field1', '<=', true]
        ], $c->toArray());
    }

    public function testLike(): void
    {
        $c = Criterion::like('field1', true);

        $this->assertEquals([
            ['field1', 'like', true]
        ], $c->toArray());
    }

    public function testNotEqual(): void
    {
        $c = Criterion::not_equal('field1', true);

        $this->assertEquals([
            ['field1', '!=', true]
        ], $c->toArray());
    }

    public function testNotIlike(): void
    {
        $c = Criterion::not_ilike('field1', true);

        $this->assertEquals([
            ['field1', 'not ilike', true]
        ], $c->toArray());
    }

    public function testNotIn(): void
    {
        $c = Criterion::not_in('field1', [true]);

        $this->assertEquals([
            ['field1', 'not in', [true]]
        ], $c->toArray());
    }

    public function testNotLike(): void
    {
        $c = Criterion::not_like('field1', true);

        $this->assertEquals([
            ['field1', 'not like', true]
        ], $c->toArray());
    }

    public function testParentOf(): void
    {
        $c = Criterion::parent_of('field1', true);

        $this->assertEquals([
            ['field1', 'parent_of', true]
        ], $c->toArray());
    }

    public function testUnsetEqual(): void
    {
        $c = Criterion::unset_equal('field1', true);

        $this->assertEquals([
            ['field1', '=?', true]
        ], $c->toArray());
    }
}
