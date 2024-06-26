<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\HttpClient\Factory;

use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Http\Client\Common\Plugin;
use Psr\Http\Client\ClientInterface;

interface OdooHttpClientFactoryInterface
{
    public function create(): ClientInterface;

    /**
     * @return Plugin[]
     */
    public function buildPlugins(): array;

    public function setupLoggerPlugin(): ?Plugin;

    public function setupErrorPlugin(): ?Plugin;

    public function setupContentTypePlugin(): ?Plugin;

    public function getRpcSerializerHelper(): RpcSerializerHelperInterface;
}
