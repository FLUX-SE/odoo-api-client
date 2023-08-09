<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Common;

final class Version
{
    public function __construct(
        private string $server_version,
        private array $server_version_info,
        private string $server_serie,
        private int $protocol_version,
    ) {
    }

    public function getServerVersion(): string
    {
        return $this->server_version;
    }

    public function getServerVersionInfo(): array
    {
        return $this->server_version_info;
    }

    public function getServerSerie(): string
    {
        return $this->server_serie;
    }

    public function getProtocolVersion(): int
    {
        return $this->protocol_version;
    }
}
