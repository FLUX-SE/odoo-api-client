<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Model\Common\Version;

interface CommonOperationsInterface extends OperationsInterface
{
    public function version(): Version;

    public function about(): string;

    public function aboutExtended(): array;

    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int;
}
