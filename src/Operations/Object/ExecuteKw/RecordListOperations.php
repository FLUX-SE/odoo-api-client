<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;

final class RecordListOperations extends AbstractOperations implements RecordListOperationsInterface
{
    public function search(
        string $modelName,
        array $criteria = [[]],
        ?SearchOptionsInterface $searchOptions = null
    ): array {
        $options = [];
        if (null !== $searchOptions) {
            $options = $searchOptions->toArray();
        }

        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $criteria,
            $options
        );

        return $response->decodeArray();
    }

    public function search_count(
        string $modelName,
        array $criteria = [[]]
    ): int {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $criteria
        );

        return $response->decodeInt();
    }

    public function read(
        string $modelName,
        array $criteria = [[]],
        ?ReadOptionsInterface $readOptions = null
    ): array {
        $options = [];
        if (null !== $readOptions) {
            $options = $readOptions->toArray();
        }

        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $criteria,
            $options
        );

        return $response->decodeArray();
    }

    public function search_read(
        string $modelName,
        array $criteria = [[]],
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array {
        $options = [];
        if (null !== $searchReadOptions) {
            $options = $searchReadOptions->toArray();
        }

        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $criteria,
            $options
        );

        return $response->decodeArray();
    }
}
