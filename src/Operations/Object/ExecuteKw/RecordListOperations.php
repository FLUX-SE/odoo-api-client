<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomainsInterface;
use Psr\Http\Message\ResponseInterface;

final class RecordListOperations extends AbstractOperations implements RecordListOperationsInterface
{
    private function execute_kw(
        string $methodName,
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?OptionsInterface $mixedOptions = null
    ): ResponseInterface {
        $arguments = [];
        if (null !== $searchDomains) {
            $arguments = $searchDomains->toArray();
        }

        $options = [];
        if (null !== $mixedOptions) {
            $options = $mixedOptions->toArray();
        }

        return $this->getObjectOperations()->execute_kw(
            $modelName,
            $methodName,
            [$arguments],
            $options
        );
    }

    public function search(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): array {
        $response = $this->execute_kw(
            __FUNCTION__,
            $modelName,
            $searchDomains,
            $searchOptions
        );
        return $this->getObjectOperations()->decode($response);
    }

    public function search_count(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null
    ): int {
        $response = $this->execute_kw(
            __FUNCTION__,
            $modelName,
            $searchDomains
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
            __FUNCTION__,
            $modelName,
            $searchDomains,
            $searchReadOptions
        );
        return $this->getObjectOperations()->decode($response);
    }
}
