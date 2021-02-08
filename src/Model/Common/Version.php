<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Common;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class Version
{
    /**
     * @var string
     *
     * @SerializedName("server_version")
     */
    private $server_version;

    /**
     * @var array
     *
     * @SerializedName("server_version_info")
     */
    private $server_version_info;

    /**
     * @var string
     *
     * @SerializedName("server_serie")
     */
    private $server_serie;

    /**
     * @var int
     *
     * @SerializedName("protocol_version")
     */
    private $protocol_version;

    public function __construct(
        string $server_version,
        array $server_version_info,
        string $server_serie,
        int $protocol_version
    ) {
        $this->server_version = $server_version;
        $this->server_version_info = $server_version_info;
        $this->server_serie = $server_serie;
        $this->protocol_version = $protocol_version;
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
