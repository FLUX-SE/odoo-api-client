<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;

interface ModelManagerInterface
{
    public function persist(BaseInterface $model): int;
}