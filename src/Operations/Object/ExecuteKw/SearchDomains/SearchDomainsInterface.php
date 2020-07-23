<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains;

interface SearchDomainsInterface
{
    /** @var string */
    public const LOGIC_AND = '&';
    /** @var string */
    public const LOGIC_NOT = '!';
    /** @var string */
    public const LOGIC_OR = '|';

    public function toArray(): array;

    public function addCriterion(CriterionInterface $c1): SearchDomainsInterface;

    public function addAndCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface;

    public function addOrCriteria(CriterionInterface $c1, CriterionInterface $c2): SearchDomainsInterface;

    public function addNotCriteria(CriterionInterface $c1): SearchDomainsInterface;
}
