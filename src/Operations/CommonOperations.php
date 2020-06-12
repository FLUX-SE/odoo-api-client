<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

final class CommonOperations extends AbstractOperations implements CommonOperationsInterface
{
    public function getEndpointPath(): string
    {
        return '/common';
    }

    public function version(): array
    {
        $responseBody = $this->request(__FUNCTION__);

        return $responseBody->decodeArray();
    }

    public function about(): string
    {
        $responseBody = $this->request(__FUNCTION__);

        return $responseBody->decodeString();
    }

    public function aboutExtended(): array
    {
        $responseBody = $this->request('about', [true]);

        return $responseBody->decodeArray();
    }

    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int {
        $responseBody = $this->request(__FUNCTION__, [
                $database,
                $username,
                $password,
                $userAgentEnv,
        ]);

        return $responseBody->decodeInt();
    }
}
