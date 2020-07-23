<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;

interface ModelManagerInterface
{
    public function persist(BaseInterface $model): int;

    public function delete(BaseInterface $model): void;

    public function update(BaseInterface $model): BaseInterface;
}
