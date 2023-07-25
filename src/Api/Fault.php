<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class Fault implements FaultInterface
{
    private int $faultCode;
    private string $faultString;

    public function __construct(
        int $faultCode,
        string $faultString
    ) {
        $this->faultCode = $faultCode;
        $this->faultString = $faultString;
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
