<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\HttPlug\Plugin;

use Flux\OdooApiClient\XmlRpc\ResponseBody;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class OdooApiErrorPlugin implements Plugin
{
    /** @var Plugin */
    private $errorPluginDecorated;

    public function __construct(Plugin $errorPluginDecorated)
    {
        $this->errorPluginDecorated = $errorPluginDecorated;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $errorNext = function (RequestInterface $request) use ($next, $first) {
            return $this->errorPluginDecorated->handleRequest($request, $next, $first);
        };

        return $errorNext($request)->then(function (ResponseInterface $response) use ($request) {
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

        $responseBody = new ResponseBody($response);
        if (false === $responseBody->isFault()) {
            return $response;
        }

        $body = $responseBody->decodeArray();

        throw new ClientErrorException(
            sprintf("%s\n\n%s", $body['faultCode'], $body['faultString']),
            $request,
            $response
        );
    }
}
