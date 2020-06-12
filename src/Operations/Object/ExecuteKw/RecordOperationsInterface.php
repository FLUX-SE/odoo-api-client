<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

interface RecordOperationsInterface extends OperationsInterface
{
    public function create(string $modelName, array $model): int;

    public function write(string $modelName, int $id, array $model): array;

    public function unlink(string $modelName, int $id): array;
}
