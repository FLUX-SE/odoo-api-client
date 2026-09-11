<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration\Fixture;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CapturingHttpClient implements ClientInterface
{
    /** @var RequestInterface[] */
    private array $requests = [];

    /** @param ResponseInterface[] $responses */
    public function __construct(private array $responses)
    {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;

        $response = array_shift($this->responses);
        if (null === $response) {
            throw new \RuntimeException('No fake response remains.');
        }

        return $response;
    }

    /** @return RequestInterface[] */
    public function getRequests(): array
    {
        return $this->requests;
    }
}
