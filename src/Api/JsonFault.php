<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api;

final class JsonFault implements FaultInterface
{
    private string $message;

    public function __construct(
        private int $code,
        string $message,
        array $data
    ) {
        $this->message = sprintf(
            '%2$s - %3$s%1$s%4$s%1$s%5$s%1$s%1$sArguments: %6$s%1$s%1$sContext: %7$s%1$s',
            "\n",
            $message,
            $data['name'] ?? '',
            $data['debug'] ?? '',
            $data['message'] ?? '',
            json_encode($data['arguments'] ?? [], JSON_THROW_ON_ERROR),
            json_encode($data['context'] ?? [], JSON_THROW_ON_ERROR)
        );
    }

    public function getFaultString(): string
    {
        return $this->message;
    }

    public function getFaultCode(): int
    {
        return $this->code;
    }
}
