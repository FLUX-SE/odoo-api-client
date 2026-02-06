<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Common;

final class Version
{
    /**
     * @param array{
     *     0: int,
     *     1: int,
     *     2: int,
     *     3: string,
     *     4: int,
     *     5: string,
     * } $server_version_info
     */
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

    /**
     * @return array{
     *      0: int,
     *      1: int,
     *      2: int,
     *      3: string,
     *      4: int,
     *      5: string,
     *  }
     */
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
