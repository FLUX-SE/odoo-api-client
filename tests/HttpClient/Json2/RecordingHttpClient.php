<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\HttpClient\Json2;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class RecordingHttpClient implements ClientInterface
{
    /** @var RequestInterface[] */
    private array $requests = [];

    /** @param list<ResponseInterface|ClientExceptionInterface> $results */
    public function __construct(private array $results)
    {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;
        $result = array_shift($this->results);

        if ($result instanceof ClientExceptionInterface) {
            throw $result;
        }

        if (null === $result) {
            throw new \LogicException('No fake JSON-2 response remains.');
        }

        return $result;
    }

    /** @return RequestInterface[] */
    public function getRequests(): array
    {
        return $this->requests;
    }
}
