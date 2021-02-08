<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

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

    public function setDatabase(string $database): void;

    public function setUsername(string $username): void;

    public function setPassword(string $password): void;
}
