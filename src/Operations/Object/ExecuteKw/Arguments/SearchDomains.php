<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

final class SearchDomains extends AbstractArguments implements SearchDomainsInterface
{
    use SearchDomainsTrait;

    protected function buildCriteria(
        CriterionInterface $c1,
        string $logic = null,
        CriterionInterface $c2 = null
    ): SearchDomainsInterface {
        if (null !== $logic) {
            $this->addArgument($logic);
        }

        $this->addArgument($c1->toArray());

        if (null !== $c2) {
            $this->addArgument($c2->toArray());
        }

        return $this;
    }
}
