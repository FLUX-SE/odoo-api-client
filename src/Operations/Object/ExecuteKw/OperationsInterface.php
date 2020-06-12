<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\ObjectOperationsInterface;

interface OperationsInterface
{
    public function getObjectOperations(): ObjectOperationsInterface;
}
