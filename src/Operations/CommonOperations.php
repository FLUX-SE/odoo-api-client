<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Model\Common\Version;
use Flux\OdooApiClient\Operations\Exception\AuthenticationFailedException;

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

    /**
     * {@inheritDoc}
     *
     * @throws AuthenticationFailedException
     */
    public function authenticate(
        string $database,
        string $username,
        string $password,
        array $userAgentEnv = []
    ): int {
        $response = $this->request(__FUNCTION__, [
                $database,
                $username,
                $password,
                $userAgentEnv,
        ]);

        $body = $this->xmlRpcSerializerHelper->decodeResponseBody(
            $response->getBody()
        );

        if (false === $body) {
            throw new AuthenticationFailedException(sprintf(
                'Unable to found the UID of the user "%s" !',
                $username
            ));
        }

        return $this->deserializeInteger($response);
    }
}
