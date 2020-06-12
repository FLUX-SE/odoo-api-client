<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\XmlRpc;

final class RequestBody implements RequestBodyInterface
{
    /** @var string */
    private $method;
    /** @var array */
    private $params;
    /** @var string */
    private $encoding;

    public function __construct(string $method, array $params = [], string $encoding = 'UTF-8')
    {
        $this->method = $method;
        $this->params = $params;
        $this->encoding = $encoding;
    }

    public function encode(): string
    {
        return xmlrpc_encode_request(
            $this->method,
            $this->params,
            [
                'version' => 'xmlrpc',
                'encoding' => $this->encoding,
            ]
        );
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getEncoding(): string
    {
        return $this->encoding;
    }

    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }
}
