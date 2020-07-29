<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

final class RecordOperations extends AbstractOperations implements RecordOperationsInterface
{
    public function create(string $modelName, array $model): int
    {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            $model
        );

        return $this->getObjectOperations()->deserializeInteger($response);
    }

    public function write(string $modelName, array $ids, array $model): bool
    {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            [
                $ids,
                $model,
            ]
        );

        return $this->getObjectOperations()->deserializeBoolean($response);
    }

    public function unlink(string $modelName, array $ids): bool
    {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            [
                $ids,
            ]
        );

        return $this->getObjectOperations()->deserializeBoolean($response);
    }
}
