<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;

interface RecordListOperationsInterface extends OperationsInterface
{
    public function search(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): array;

    public function search_count(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): int;

    public function search_read(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    /**
     * @param int[] $ids
     */
    public function read(
        string $modelName,
        array $ids = [],
        ?ReadOptionsInterface $readOptions = null
    ): array;
}
