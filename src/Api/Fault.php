<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class Fault implements FaultInterface
{
    public function __construct(private int $faultCode, private string $faultString)
    {
    }

    public function getFaultCode(): int
    {
        return $this->faultCode;
    }

    public function getFaultString(): string
    {
        return $this->faultString;
    }
}
