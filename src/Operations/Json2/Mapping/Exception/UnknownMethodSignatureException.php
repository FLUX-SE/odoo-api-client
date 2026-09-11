<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception;

final class UnknownMethodSignatureException extends MappingException
{
    public static function forCall(string $model, string $method): self
    {
        return new self(sprintf('No JSON-2 signature is registered for "%s/%s".', $model, $method));
    }
}
