<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\ArgumentsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractOperations implements OperationsInterface
{
    /** @var ObjectOperationsInterface */
    private $objectOperations;

    public function __construct(ObjectOperationsInterface $objectOperations)
    {
        $this->objectOperations = $objectOperations;
    }

    public function execute_kw(
        string $modelName,
        string $methodName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): ResponseInterface {
        $rawArguments = [[]];
        if (null !== $arguments) {
            $rawArguments = $arguments->toArray();
        }

        $rawOptions = [];
        if (null !== $options) {
            $rawOptions = $options->toArray();
        }

        return $this->getObjectOperations()->execute_kw(
            $modelName,
            $methodName,
            $rawArguments,
            $rawOptions
        );
    }

    public function getObjectOperations(): ObjectOperationsInterface
    {
        return $this->objectOperations;
    }
}
