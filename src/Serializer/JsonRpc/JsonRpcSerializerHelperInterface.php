<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\JsonRpc;

use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;

interface JsonRpcSerializerHelperInterface extends RpcSerializerHelperInterface
{
    public function getVersion(): string;

    public function setVersion(string $version): void;

    public function getDecodeDepth(): int;

    public function setDecodeDepth(int $decodeDepth): void;
}
