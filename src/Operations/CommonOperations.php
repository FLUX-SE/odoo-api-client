<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Model\Common\Version;

final class CommonOperations extends AbstractOperations implements CommonOperationsInterface
{
    public function getEndpointPath(): string
    {
        return '/common';
    }

    public function version(): Version
    {
        $responseBody = $this->request(__FUNCTION__);

        return $this->deserializeModel($responseBody, Version::class);
    }

    public function about(): string
    {
        $responseBody = $this->request(__FUNCTION__);

        return $this->deserializeString($responseBody);
    }

    public function aboutExtended(): array
    {
        $responseBody = $this->request('about', [true]);

        return $this->deserializeArrayOf($responseBody);
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

        return $this->deserializeInteger($responseBody);
    }
}
