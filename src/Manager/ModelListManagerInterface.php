<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomainsInterface;

interface ModelListManagerInterface
{
    public function find(string $class, int $id): ?BaseInterface;

    public function findOneBy(string $class, SearchDomainsInterface $searchDomains): ?BaseInterface;

    /**
     * @param string $class
     * @param SearchDomainsInterface $searchDomains
     * @param SearchReadOptionsInterface $searchReadOptions
     *
     * @return BaseInterface[]
     */
    public function findBy(
        string $class,
        SearchDomainsInterface $searchDomains,
        SearchReadOptionsInterface $searchReadOptions
    ): array;
}
