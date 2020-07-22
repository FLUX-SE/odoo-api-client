<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomainsInterface;

interface RecordListOperationsInterface extends OperationsInterface
{
    public function search(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): array;

    public function search_count(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null
    ): int;

    public function search_read(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    public function read(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?ReadOptionsInterface $readOptions = null
    ): array;
}
