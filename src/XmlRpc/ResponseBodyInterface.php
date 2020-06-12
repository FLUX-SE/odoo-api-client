<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\XmlRpc;

use Psr\Http\Message\ResponseInterface;

interface ResponseBodyInterface
{
    /**
     * @return mixed
     */
    public function decode();

    public function decodeArray(): array;

    public function decodeBool(): bool;

    public function decodeInt(): int;

    public function decodeFloat(): float;

    public function decodeString(): string;

    public function getResponse(): ResponseInterface;

    public function setResponse(ResponseInterface $response): void;

    public function getEncoding(): string;

    public function setEncoding(string $encoding): void;
}
