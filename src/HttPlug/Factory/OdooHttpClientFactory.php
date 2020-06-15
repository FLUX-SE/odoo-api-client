<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\HttPlug\Factory;

use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\HttPlug\Plugin\OdooApiErrorPlugin;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\ContentTypePlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpKernel\Log\Logger;

final class OdooHttpClientFactory implements OdooHttpClientFactoryInterface
{
    /** @var string */
    protected $baseHostUri;
    /** @var string */
    protected $basePath;
    /** @var XmlRpcSerializerHelperInterface */
    private $xmlRpcSerializerHelper;

    public function __construct(
        XmlRpcSerializerHelperInterface $xmlRpcSerializerHelper,
        string $baseHostUri,
        string $basePath = OdooApiRequestMakerInterface::BASE_PATH
    ) {
        $this->xmlRpcSerializerHelper = $xmlRpcSerializerHelper;
        $this->baseHostUri = rtrim($baseHostUri, '/');
        $this->basePath = trim($basePath, '/');
    }

    public function create(): ClientInterface
    {
        return new PluginClient(
            HttpClientDiscovery::find(),
            $this->setupPlugins()
        );
    }

    /**
     * @return Plugin[]
     */
    public function setupPlugins(): array
    {
        $plugins = [];

        $baseUriPlugin = $this->setupBaseUriPlugin();
        if (null !== $baseUriPlugin) {
            $plugins[] = $baseUriPlugin;
        }

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

    public function setupBaseUriPlugin(): ?Plugin
    {
        $uriFactory = Psr17FactoryDiscovery::findUrlFactory();
        $uri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $this->baseHostUri,
            $this->basePath
        ));

        return new BaseUriPlugin($uri);
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
            $this->xmlRpcSerializerHelper
        );
    }

    public function getXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface
    {
        return $this->xmlRpcSerializerHelper;
    }
}
