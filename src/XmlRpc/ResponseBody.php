<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\XmlRpc;

use LogicException;
use Psr\Http\Message\ResponseInterface;

final class ResponseBody implements ResponseBodyInterface
{
    /** @var ResponseInterface */
    private $response;
    /** @var string */
    private $encoding;

    /** @var mixed|null */
    private $decoded;

    public function __construct(ResponseInterface $response, string $encoding = 'UTF-8')
    {
        $this->response = $response;
        $this->encoding = $encoding;
    }

    public function isFault(): bool
    {
        try {
            $this->decodeArray();
        } catch (LogicException $e) {
            return false;
        }

        return xmlrpc_is_fault($this->decoded);
    }

    /**
     * {@inheritdoc}
     */
    public function decode()
    {
        if (null === $this->decoded) {
            $this->decoded = xmlrpc_decode(
                $this->response->getBody()->__toString(),
                $this->encoding
            );
        }

        return $this->decoded;
    }

    public function decodeArray(): array
    {
        $decoded = $this->decode();

        if (false === is_array($decoded)) {
            throw new LogicException(sprintf('The decoded value should be an array, "%s" found !', gettype($decoded)));
        }

        return (array) $decoded;
    }

    public function decodeBool(): bool
    {
        $decoded = $this->decode();

        if (false === is_bool($decoded)) {
            throw new LogicException(sprintf('The decoded value should be a bool, "%s" found !', gettype($decoded)));
        }

        return (bool) $decoded;
    }

    public function decodeInt(): int
    {
        $decoded = $this->decode();

        if (false === is_int($decoded)) {
            throw new LogicException(sprintf('The decoded value should be an integer, "%s" found !', gettype($decoded)));
        }

        return (int) $decoded;
    }

    public function decodeFloat(): float
    {
        $decoded = $this->decode();

        if (false === is_float($decoded)) {
            throw new LogicException(sprintf('The decoded value should be a float, "%s" found !', gettype($decoded)));
        }

        return (float) $decoded;
    }

    public function decodeString(): string
    {
        $decoded = $this->decode();

        if (false === is_string($decoded)) {
            throw new LogicException(sprintf('The decoded value should be a string, "%s" found !', gettype($decoded)));
        }

        return (string) $decoded;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function setResponse(ResponseInterface $response): void
    {
        $this->response = $response;
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
