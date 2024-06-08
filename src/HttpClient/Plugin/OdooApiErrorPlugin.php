<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\HttpClient\Plugin;

use FluxSE\OdooApiClient\Api\Fault;
use FluxSE\OdooApiClient\Api\FaultInterface;
use FluxSE\OdooApiClient\Api\JsonFault;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class OdooApiErrorPlugin implements Plugin
{
    public function __construct(
        private Plugin $errorPluginDecorated,
        private RpcSerializerHelperInterface $rpcSerializerHelper
    ) {
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $errorNext = function (RequestInterface $request) use ($next, $first): Promise {
            return $this->errorPluginDecorated->handleRequest($request, $next, $first);
        };

        return $errorNext($request)->then(function (ResponseInterface $response) use ($request): ResponseInterface {
            return $this->transformResponseToException($request, $response);
        });
    }

    /**
     * Transform response to an error if possible.
     *
     * @param RequestInterface  $request  Request of the call
     * @param ResponseInterface $response Response of the call
     *
     * @throws ClientErrorException If response status code is a 200 and response body
     *
     * @return ResponseInterface If status code is not in 200 return response
     */
    private function transformResponseToException(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if (200 !== $response->getStatusCode()) {
            return $response;
        }

        $fault = $this->getFaultResponse($response);
        if (null === $fault) {
            return $response;
        }

        throw new ClientErrorException(
            sprintf(
                "Fault code: %s\nMessage:\n%s",
                $fault->getFaultCode(),
                $fault->getFaultString()
            ),
            $request,
            $response
        );
    }

    private function getFaultResponse(ResponseInterface $response): ?FaultInterface
    {
        if (str_contains($response->getHeaderLine('Content-Type'), 'application/json')) {
            return $this->getJsonFaultResponse($response);
        }

        if (str_contains($response->getHeaderLine('Content-Type'), 'application/xml')) {
            return $this->getXmlFaultResponse($response);
        }

        return null;
    }

    private function getJsonFaultResponse(ResponseInterface $response): ?FaultInterface
    {
        $body = $response->getBody()->__toString();
        if (preg_match('#[\'"]jsonrpc[\'"]: ?[\'"]2.0[\'"],[^{]+[\'"]error[\'"]:#si', $body)) {
            return $this->rpcSerializerHelper->deserializeResponseBody($response->getBody(), JsonFault::class);
        }

        return null;
    }

    private function getXmlFaultResponse(ResponseInterface $response): ?FaultInterface
    {
        $body = $response->getBody()->__toString();
        if (preg_match('#<methodResponse>.*<fault>#s', $body)) {
            return $this->rpcSerializerHelper->deserializeResponseBody($response->getBody(), Fault::class);
        }

        return null;
    }
}
