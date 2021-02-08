<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use Symfony\Component\Serializer\Serializer;

interface ModelManagerInterface
{
    public function persist(BaseInterface $model, ?OptionsInterface $options = null): int;

    public function delete(BaseInterface $model, ?OptionsInterface $options = null): bool;

    public function update(BaseInterface $model, ?OptionsInterface $options = null): bool;

    public function getRecordOperations(): RecordOperationsInterface;

    public function getSerializer(): Serializer;
}
