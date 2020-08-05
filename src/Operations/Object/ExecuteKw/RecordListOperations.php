<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\ArgumentsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Psr\Http\Message\ResponseInterface;

final class RecordListOperations extends AbstractOperations implements RecordListOperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): ResponseInterface {
        $rawArguments = [];
        if (null !== $arguments) {
            $rawArguments = $arguments->toArray();
        }

        $rawOptions = [];
        if (null !== $options) {
            $rawOptions = $options->toArray();
        }

        return $this->getObjectOperations()->execute_kw(
            $modelName,
            $methodName,
            [$rawArguments],
            $rawOptions
        );
    }

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
        ?SearchDomainsInterface $searchDomains = null
    ): int {
        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
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
            $modelName,
            __FUNCTION__,
            $searchDomains,
            $searchReadOptions
        );
        return $this->getObjectOperations()->decode($response);
    }
}
