<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2;

use FluxSE\OdooApiClient\Api\Json2\Exception\Json2DecodingException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2HttpException;
use FluxSE\OdooApiClient\Api\Json2\Exception\Json2TransportException;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Codec;
use FluxSE\OdooApiClient\Serializer\Json2\Json2CodecInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class Json2Client implements Json2ClientInterface
{
    public const USER_AGENT = 'flux-se/odoo-api-client JSON-2';

    private ?ResponseInterface $lastResponse = null;

    private Json2CodecInterface $codec;

    public function __construct(
        private ClientInterface $httpClient,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private Json2Connection $connection,
        ?Json2CodecInterface $codec = null,
    ) {
        $this->codec = $codec ?? new Json2Codec();
    }

    public function call(string $model, string $method, array $parameters = []): ResponseInterface
    {
        $payload = $this->codec->encode($parameters);
        $request = $this->requestFactory
            ->createRequest('POST', $this->connection->getEndpointUri($model, $method))
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withHeader('User-Agent', self::USER_AGENT)
            ->withBody($this->streamFactory->createStream($payload));
        $request = $this->connection->applyToRequest($request);
        $this->lastResponse = null;

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface) {
            throw new Json2TransportException();
        }

        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            try {
                $response = $this->makeBodyReReadable($response);
            } catch (Json2DecodingException) {
                $this->lastResponse = $response;

                throw new Json2HttpException($response);
            }

            $this->lastResponse = $response;

            throw $this->createHttpException($response);
        }

        $this->lastResponse = $this->makeBodyReReadable($response);

        return $this->lastResponse;
    }

    public function decode(ResponseInterface $response): mixed
    {
        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            try {
                $response = $this->makeBodyReReadable($response);
            } catch (Json2DecodingException) {
                $this->lastResponse = $response;

                throw new Json2HttpException($response);
            }

            $this->lastResponse = $response;

            throw $this->createHttpException($response);
        }

        $response = $this->makeBodyReReadable($response);
        $this->lastResponse = $response;

        return $this->decodeBody($response);
    }

    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }

    private function createHttpException(ResponseInterface $response): Json2HttpException
    {
        $errorName = null;

        try {
            $decoded = $this->decodeBody($response);
            if (is_array($decoded) && isset($decoded['name']) && is_string($decoded['name'])) {
                $errorName = $decoded['name'];
            }
        } catch (Json2DecodingException) {
            // A proxy HTML page or an empty error still retains its status and response.
        }

        return new Json2HttpException($response, $errorName);
    }

    private function decodeBody(ResponseInterface $response): mixed
    {
        $body = $response->getBody();

        try {
            if ($body->isSeekable()) {
                $body->rewind();
            }
            $payload = $body->getContents();
            if ($body->isSeekable()) {
                $body->rewind();
            }
        } catch (\Throwable) {
            throw new Json2DecodingException();
        }

        return $this->codec->decode($payload);
    }

    private function makeBodyReReadable(ResponseInterface $response): ResponseInterface
    {
        $body = $response->getBody();
        if ($body->isSeekable()) {
            try {
                $body->rewind();

                return $response;
            } catch (\Throwable) {
                // Fall through and copy a readable body when a stream misreports seekability.
            }
        }

        try {
            $contents = $body->getContents();
        } catch (\Throwable) {
            throw new Json2DecodingException();
        }

        return $response->withBody($this->streamFactory->createStream($contents));
    }
}
