<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;

interface RecordListOperationsInterface extends OperationsInterface
{
    public function search(
        string $modelName,
        array $criteria = [[]],
        ?SearchOptionsInterface $searchOptions = null
    ): array;

    public function search_count(
        string $modelName,
        array $criteria = [[]]
    ): int;

    public function search_read(
        string $modelName,
        array $criteria = [[]],
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    public function read(
        string $modelName,
        array $criteria = [[]],
        ?ReadOptionsInterface $readOptions = null
    ): array;
}
