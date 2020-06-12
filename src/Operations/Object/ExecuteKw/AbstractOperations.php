<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\ObjectOperationsInterface;

abstract class AbstractOperations implements OperationsInterface
{
    /** @var ObjectOperationsInterface */
    private $objectOperations;

    public function __construct(ObjectOperationsInterface $objectOperations)
    {
        $this->objectOperations = $objectOperations;
    }

    public function getObjectOperations(): ObjectOperationsInterface
    {
        return $this->objectOperations;
    }
}
