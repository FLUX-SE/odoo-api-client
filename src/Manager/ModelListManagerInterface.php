<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomainsInterface;

interface ModelListManagerInterface
{
    public function find(string $class, int $id): ?BaseInterface;

    public function findOneBy(string $class, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface;

    /**
     * @param string $class
     * @param SearchDomainsInterface|null $searchDomains
     * @param SearchReadOptionsInterface|null $searchReadOptions
     *
     * @return BaseInterface[]
     */
    public function findBy(
        string $class,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;
}
