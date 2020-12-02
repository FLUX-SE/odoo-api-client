<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

trait SearchDomainsTrait
{
    abstract protected function buildCriteria(
        CriterionInterface $c1
    ): SearchDomainsInterface;

    public function addAndCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria(Criterion::and($c1, $c2));
    }

    public function addOrCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria(Criterion::or($c1, $c2));
    }

    public function addNotCriterion(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria(Criterion::not($c1));
    }

    public function addCriterion(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria($c1);
    }
}
