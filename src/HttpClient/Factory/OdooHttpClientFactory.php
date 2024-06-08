<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\HttpClient\Factory;

use FluxSE\OdooApiClient\HttpClient\Plugin\OdooApiErrorPlugin;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\ContentTypePlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpKernel\Log\Logger;

final class OdooHttpClientFactory implements OdooHttpClientFactoryInterface
{
    public function __construct(private RpcSerializerHelperInterface $rpcSerializerHelper)
    {
    }

    public function create(): ClientInterface
    {
        return new PluginClient(
            Psr18ClientDiscovery::find(),
            $this->buildPlugins()
        );
    }

    /**
     * @return Plugin[]
     */
    public function buildPlugins(): array
    {
        $plugins = [];

        $loggerPlugin = $this->setupLoggerPlugin();
        if (null !== $loggerPlugin) {
            $plugins[] = $loggerPlugin;
        }

        $contentTypePlugin = $this->setupContentTypePlugin();
        if (null !== $contentTypePlugin) {
            $plugins[] = $contentTypePlugin;
        }

        $errorPlugin = $this->setupErrorPlugin();
        if (null !== $errorPlugin) {
            $plugins[] = $errorPlugin;
        }

        return $plugins;
    }

    public function setupContentTypePlugin(): ?Plugin
    {
        return new ContentTypePlugin();
    }

    public function setupLoggerPlugin(): ?Plugin
    {
        $logger = new Logger();

        return new LoggerPlugin($logger);
    }

    public function setupErrorPlugin(): ?Plugin
    {
        $errorPlugin = new ErrorPlugin();

        return new OdooApiErrorPlugin(
            $errorPlugin,
            $this->rpcSerializerHelper
        );
    }

    public function getRpcSerializerHelper(): RpcSerializerHelperInterface
    {
        return $this->rpcSerializerHelper;
    }
}
