<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Model\Common\Version;

interface CommonOperationsInterface extends OperationsInterface
{
    public function version(): Version;

    public function about(): string;

    public function aboutExtended(): array;

    /**
     * @param string $database
     * @param string $username
     * @param string $password
     * @param array $userAgentEnv
     *
     * @return int
     */
    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int;
}
