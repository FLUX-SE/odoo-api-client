<?php

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use PHPUnit\Framework\TestCase;

class SearchDomainsTest extends TestCase
{
    private SearchDomains $searchDomains;

    protected function setUp(): void
    {
        $this->searchDomains = new SearchDomains();
    }

    public function testAddAndCriteria(): void
    {
        $c1 = Criterion::equal('field1', true);
        $c2 = Criterion::equal('field2', false);
        $this->searchDomains->addAndCriteria($c1, $c2);

        $this->assertEquals([
            '&',
            ['field1', '=', true],
            ['field2', '=', false],
        ], $this->searchDomains->getArguments());
    }

    public function testAddOrCriteria(): void
    {
        $c1 = Criterion::equal('field1', true);
        $c2 = Criterion::equal('field2', false);
        $this->searchDomains->addOrCriteria($c1, $c2);

        $this->assertEquals([
            '|',
            ['field1', '=', true],
            ['field2', '=', false],
        ], $this->searchDomains->getArguments());
    }

    public function testAddNotCriterion(): void
    {
        $c1 = Criterion::equal('field1', true);
        $this->searchDomains->addNotCriterion($c1);

        $this->assertEquals([
            '!',
            ['field1', '=', true],
        ], $this->searchDomains->getArguments());
    }

    public function testAddCriterion(): void
    {
        $c1 = Criterion::equal('field1', true);
        $this->searchDomains->addCriterion($c1);

        $this->assertEquals([
            ['field1', '=', true],
        ], $this->searchDomains->getArguments());
    }
}
