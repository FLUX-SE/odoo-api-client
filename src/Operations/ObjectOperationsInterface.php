<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;

interface ObjectOperationsInterface extends OperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        array $arguments = [],
        array $options = []
    ): ResponseBodyInterface;

    public function retrieveUid(): int;
}
