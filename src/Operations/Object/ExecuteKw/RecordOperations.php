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

        return $response->decodeInt();
    }

    public function write(string $modelName, int $id, array $model): array
    {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            [
                [$id],
                $model,
            ]
        );

        return $response->decodeArray();
    }

    public function unlink(string $modelName, int $id): array
    {
        $response = $this->getObjectOperations()->execute_kw(
            $modelName,
            __FUNCTION__,
            [
                [$id],
            ]
        );

        return $response->decodeArray();
    }
}
