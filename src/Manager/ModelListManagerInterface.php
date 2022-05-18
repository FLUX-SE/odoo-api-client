<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Symfony\Component\Serializer\Serializer;

interface ModelListManagerInterface
{
    /**
     * @template T of BaseInterface
     * @param class-string<T> $className
     * @return T|null
     */
    public function find(string $className, int $id): ?BaseInterface;

    /**
     * @template T of BaseInterface
     * @param class-string<T> $className
     * @return T|null
     */
    public function findOneBy(string $className, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface;

    /**
     * @template T of BaseInterface
     * @param class-string<T> $className
     * @return T[]
     */
    public function findBy(
        string                      $className,
        ?SearchDomainsInterface     $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    /**
     * @param class-string<BaseInterface> $className
     */
    public function count(string $className, ?SearchDomainsInterface $searchDomains = null): int;

    public function getRecordListOperations(): RecordListOperationsInterface;

    public function getSerializer(): Serializer;
}
