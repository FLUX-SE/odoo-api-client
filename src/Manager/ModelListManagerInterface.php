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
     * @psalm-param class-string<T> $class
     * @return T|BaseInterface|null
     */
    public function find(string $class, int $id): ?BaseInterface;

    /**
     * @template T of BaseInterface
     * @psalm-param class-string<T> $class
     * @return T|BaseInterface|null
     */
    public function findOneBy(string $class, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface;

    /**
     * @template T of BaseInterface
     * @psalm-param class-string<T> $class
     * @psalm-return T[]|BaseInterface[]
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
