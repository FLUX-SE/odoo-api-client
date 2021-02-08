<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use Symfony\Component\Serializer\Serializer;

interface ModelManagerInterface
{
    public function persist(BaseInterface $model, ?OptionsInterface $options = null): int;

    public function delete(BaseInterface $model, ?OptionsInterface $options = null): bool;

    public function update(BaseInterface $model, ?OptionsInterface $options = null): bool;

    public function getRecordOperations(): RecordOperationsInterface;

    public function getSerializer(): Serializer;
}
