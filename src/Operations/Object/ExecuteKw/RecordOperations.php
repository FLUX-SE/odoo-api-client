<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;

final class RecordOperations extends AbstractOperations implements RecordOperationsInterface
{
    public function create(string $modelName, array $model, ?OptionsInterface $options = null): int
    {
        $arguments = new Arguments();
        $arguments->addArgument($model);

        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $arguments,
            $options
        );

        return $this->getObjectOperations()->deserializeInteger($response);
    }

    public function write(string $modelName, array $ids, array $model, ?OptionsInterface $options = null): bool
    {
        $arguments = new Arguments();
        $arguments->setArguments([
            $ids,
            $model,
        ]);

        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $arguments,
            $options
        );

        return $this->getObjectOperations()->deserializeBoolean($response);
    }

    public function unlink(string $modelName, array $ids, ?OptionsInterface $options = null): bool
    {
        $arguments = new Arguments();
        $arguments->setArguments([
            $ids,
        ]);

        $response = $this->execute_kw(
            $modelName,
            __FUNCTION__,
            $arguments,
            $options
        );

        return $this->getObjectOperations()->deserializeBoolean($response);
    }
}
