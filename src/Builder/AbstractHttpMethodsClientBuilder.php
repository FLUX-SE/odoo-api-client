<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\ContentTypePlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Symfony\Component\HttpKernel\Log\Logger;

abstract class AbstractHttpMethodsClientBuilder
{
    /** @var string */
    protected $baseHostUri;
    /** @var string */
    protected $basePath;

    public function __construct(string $baseHostUri, string $basePath)
    {
        $this->baseHostUri = rtrim($baseHostUri, '/');
        $this->basePath = $basePath;
    }

    public function build(): HttpMethodsClientInterface
    {
        $requestFactory = MessageFactoryDiscovery::find();

        $pluginClient = new PluginClient(
            HttpClientDiscovery::find(),
            $this->buildPlugins()
        );

        return new HttpMethodsClient(
            $pluginClient,
            $requestFactory
        );
    }

    /**
     * @return Plugin[]
     */
    public function buildPlugins(): array
    {
        $plugins = [];

        $baseUriPlugin = $this->buildBaseUriPlugin();
        if (null !== $baseUriPlugin) {
            $plugins[] = $baseUriPlugin;
        }

        $loggerPlugin = $this->buildLoggerPlugin();
        if (null !== $loggerPlugin) {
            $plugins[] = $loggerPlugin;
        }

        $authenticationPlugin = $this->buildAuthenticationPlugin();
        if (null !== $authenticationPlugin) {
            $plugins[] = $authenticationPlugin;
        }

        $contentTypePlugin = $this->buildContentTypePlugin();
        if (null !== $contentTypePlugin) {
            $plugins[] = $contentTypePlugin;
        }

        $errorPlugin = $this->buildErrorPlugin();
        if (null !== $errorPlugin) {
            $plugins[] = $errorPlugin;
        }

        return $plugins;
    }

    abstract public function buildAuthenticationPlugin(): ?Plugin;

    public function buildBaseUriPlugin(): ?Plugin
    {
        $uriFactory = Psr17FactoryDiscovery::findUrlFactory();
        $uri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $this->baseHostUri,
            $this->basePath
        ));

        return new BaseUriPlugin($uri);
    }

    public function buildContentTypePlugin(): ?Plugin
    {
        return new ContentTypePlugin();
    }

    public function buildLoggerPlugin(): ?Plugin
    {
        $logger = new Logger();

        return new LoggerPlugin($logger);
    }

    public function buildErrorPlugin(): ?Plugin
    {
        return new ErrorPlugin();
    }
}
