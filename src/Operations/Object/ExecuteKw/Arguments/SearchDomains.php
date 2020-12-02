<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

final class SearchDomains extends AbstractArguments implements SearchDomainsInterface
{
    use SearchDomainsTrait;

    protected function buildCriteria(
        CriterionInterface $c1
    ): SearchDomainsInterface {
        if (count($this->arguments) === 2) {
            $this->setArguments([
                $this->arguments[0],
                $c1::LOGIC_AND,
                $this->arguments[1],
            ]);
        }

        foreach ($c1->toArray() as $arg) {
            $this->addArgument($arg);
        }

        return $this;
    }
}
