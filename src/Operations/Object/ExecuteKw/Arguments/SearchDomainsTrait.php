<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

trait SearchDomainsTrait
{
    abstract protected function buildCriteria(
        CriterionInterface $c1,
        string $logic = null,
        CriterionInterface $c2 = null
    ): SearchDomainsInterface;

    public function addAndCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_AND, $c2);
    }

    public function addOrCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_OR, $c2);
    }

    public function addNotCriterion(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_NOT);
    }

    public function addCriterion(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria($c1);
    }
}
