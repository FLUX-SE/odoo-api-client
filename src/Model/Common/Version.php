<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Common;

final class Version
{
    /** @var string */
    private $serverVersion;
    /** @var array */
    private $serverVersionInfo;
    /** @var string */
    private $serverSerie;
    /** @var int */
    private $protocolVersion;

    public function __construct(
        string $serverVersion,
        array $serverVersionInfo,
        string $serverSerie,
        int $protocolVersion
    ) {
        $this->serverVersion = $serverVersion;
        $this->serverVersionInfo = $serverVersionInfo;
        $this->serverSerie = $serverSerie;
        $this->protocolVersion = $protocolVersion;
    }

    public function getServerVersion(): string
    {
        return $this->serverVersion;
    }

    public function getServerVersionInfo(): array
    {
        return $this->serverVersionInfo;
    }

    public function getServerSerie(): string
    {
        return $this->serverSerie;
    }

    public function getProtocolVersion(): int
    {
        return $this->protocolVersion;
    }
}