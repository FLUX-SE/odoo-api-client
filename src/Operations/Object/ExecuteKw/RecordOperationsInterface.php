<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;

interface RecordOperationsInterface extends OperationsInterface
{
    public function create(string $modelName, array $model, ?OptionsInterface $options = null): int;

    /**
     * @param int[] $ids
     */
    public function write(string $modelName, array $ids, array $model, ?OptionsInterface $options = null): bool;

    /**
     * @param int[] $ids
     */
    public function unlink(string $modelName, array $ids, ?OptionsInterface $options = null): bool;
}
