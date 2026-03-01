<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

final class SearchDomains extends AbstractArguments implements SearchDomainsInterface
{
    use SearchDomainsTrait;

    protected function buildCriteria(
        CriterionInterface $c,
    ): SearchDomainsInterface {
        /** @var mixed[]|bool|float|int|string|null $arg */
        foreach ($c->toArray() as $arg) {
            $this->addArgument($arg);
        }

        return $this;
    }

    public function toArray(): array
    {
        return [parent::toArray()];
    }
}
