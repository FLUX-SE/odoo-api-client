<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\ArgumentsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use Psr\Http\Message\ResponseInterface;

interface OperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): ResponseInterface;

    public function execute_kw_action(
        string $modelName,
        string $actionName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): string|int|bool|array;

    public function getObjectOperations(): ObjectOperationsInterface;
}
