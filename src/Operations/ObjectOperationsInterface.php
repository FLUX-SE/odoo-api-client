<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Psr\Http\Message\ResponseInterface;

interface ObjectOperationsInterface extends OperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        array $arguments = [],
        array $options = []
    ): ResponseInterface;

    public function retrieveUid(): int;
}
