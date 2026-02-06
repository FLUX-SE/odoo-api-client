<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Model\Common\Version;

interface CommonOperationsInterface extends OperationsInterface
{
    public function version(): Version;

    public function about(): string;

    /** @return string[] */
    public function aboutExtended(): array;

    /** @param array<string, string> $userAgentEnv */
    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int;
}
