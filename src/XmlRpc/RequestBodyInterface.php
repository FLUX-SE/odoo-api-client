<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\XmlRpc;

interface RequestBodyInterface
{
    public function encode(): string;

    public function getEncoding(): string;

    public function setEncoding(string $encoding): void;

    public function getMethod(): string;

    public function setMethod(string $method): void;

    /**
     * @param array $params
     */
    public function setParams(array $params): void;

    /**
     * @return array
     */
    public function getParams(): array;
}
