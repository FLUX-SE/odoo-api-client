<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api;

interface FaultInterface
{
    public function getFaultString(): string;

    public function setFaultString(string $faultString): void;

    public function getFaultCode(): int;

    public function setFaultCode(int $faultCode): void;
}
