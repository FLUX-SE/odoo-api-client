<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;

final class RecordListOperations extends AbstractOperations implements RecordListOperationsInterface
{
    public function search(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): array {
        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $searchDomains,
            $searchOptions
        );
        return $this->getObjectOperations()->decode($response);
    }

    public function search_count(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): int {
        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $searchDomains,
            $searchOptions
        );
        return $this->getObjectOperations()->deserializeInteger($response);
    }

    public function read(
        string $modelName,
        array $ids = [],
        ?ReadOptionsInterface $readOptions = null
    ): array {
        $options = [];
        if (null !== $readOptions) {
            $options = $readOptions->toArray();
        }

        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            [$ids],
            $options
        );
        return $this->getObjectOperations()->decode($response);
    }

    public function search_read(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array {
        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $searchDomains,
            $searchReadOptions
        );
        return $this->getObjectOperations()->decode($response);
    }
}
