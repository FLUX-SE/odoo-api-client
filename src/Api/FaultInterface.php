<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

interface FaultInterface
{
    public function getFaultString(): string;

    public function getFaultCode(): int;
}
