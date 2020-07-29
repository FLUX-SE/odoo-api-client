<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

interface RecordOperationsInterface extends OperationsInterface
{
    public function create(string $modelName, array $model): int;

    /**
     * @param string $modelName
     * @param int[] $ids
     * @param array $model
     *
     * @return bool
     */
    public function write(string $modelName, array $ids, array $model): bool;

    /**
     * @param string $modelName
     * @param int[] $ids
     *
     * @return bool
     */
    public function unlink(string $modelName, array $ids): bool;
}
