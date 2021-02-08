<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

interface SearchDomainsInterface extends ArgumentsInterface
{
    public function addCriterion(CriterionInterface $c1): SearchDomainsInterface;

    public function addAndCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface;

    public function addOrCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface;

    public function addNotCriterion(CriterionInterface $c1): SearchDomainsInterface;
}
