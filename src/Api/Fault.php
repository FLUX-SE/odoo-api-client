<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class Fault implements FaultInterface
{
    /** @var int */
    private $faultCode = -1;
    /** @var string */
    private $faultString = '';

    /**
     */
    public function setFaultCode(int $faultCode): void
    {
        $this->faultCode = $faultCode;
    }

    /**
     */
    public function setFaultString(string $faultString): void
    {
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
