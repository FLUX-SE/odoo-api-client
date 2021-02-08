<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\ArgumentsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Psr\Http\Message\ResponseInterface;

interface OperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): ResponseInterface;

    public function getObjectOperations(): ObjectOperationsInterface;
}
