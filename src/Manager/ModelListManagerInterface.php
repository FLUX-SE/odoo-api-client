<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Symfony\Component\Serializer\Serializer;

interface ModelListManagerInterface
{
    public function find(string $class, int $id): ?BaseInterface;

    public function findOneBy(string $class, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface;

    /**
     * @return BaseInterface[]
     */
    public function findBy(
        string $class,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    public function count(string $class, ?SearchDomainsInterface $searchDomains = null): int;

    public function getRecordListOperations(): RecordListOperationsInterface;

    public function getSerializer(): Serializer;
}
