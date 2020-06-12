<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

interface CommonOperationsInterface extends OperationsInterface
{
    public function version(): array;

    public function about(): string;

    public function aboutExtended(): array;

    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int;
}
