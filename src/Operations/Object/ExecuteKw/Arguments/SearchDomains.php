<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

final class SearchDomains extends AbstractArguments implements SearchDomainsInterface
{
    use SearchDomainsTrait;

    protected function buildCriteria(
        CriterionInterface $c1
    ): SearchDomainsInterface {

        foreach ($c1->toArray() as $arg) {
            $this->addArgument($arg);
        }

        return $this;
    }
}
