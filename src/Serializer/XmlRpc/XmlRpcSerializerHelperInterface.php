<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer\XmlRpc;

use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;

interface XmlRpcSerializerHelperInterface extends RpcSerializerHelperInterface
{
    public function getEncoding(): string;

    public function setEncoding(string $encoding): void;
}
