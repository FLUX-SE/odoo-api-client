<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains;

final class SearchDomains implements SearchDomainsInterface
{
    /** @var array */
    private $criteria = [];

    public function toArray(): array
    {
        if (empty($this->criteria)) {
            return [[]];
        }

        return $this->criteria;
    }

    private function buildCriteria(
        CriterionInterface $c1,
        string $logic = null,
        CriterionInterface $c2 = null
    ): self {
        if (null !== $logic) {
            $this->criteria[] = $logic;
        }

        $this->criteria[] = $c1->toArray();

        if (null !== $c2) {
            $this->criteria[] = $c2->toArray();
        }

        return $this;
    }

    public function addAndCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_AND, $c2);
    }

    public function addOrCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_OR, $c2);
    }

    public function addNotCriteria(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria($c1, self::LOGIC_NOT);
    }

    public function addCriterion(CriterionInterface $c1): SearchDomainsInterface
    {
        return $this->buildCriteria($c1);
    }
}