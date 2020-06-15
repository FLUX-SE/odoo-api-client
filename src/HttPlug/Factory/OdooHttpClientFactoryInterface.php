<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\HttPlug\Factory;

use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use Http\Client\Common\Plugin;
use Psr\Http\Client\ClientInterface;

interface OdooHttpClientFactoryInterface
{
    public function create(): ClientInterface;

    /**
     * @return Plugin[]
     */
    public function setupPlugins(): array;

    public function setupBaseUriPlugin(): ?Plugin;

    public function setupLoggerPlugin(): ?Plugin;

    public function setupErrorPlugin(): ?Plugin;

    public function setupContentTypePlugin(): ?Plugin;

    public function getXmlRpcSerializerHelper(): XmlRpcSerializerHelperInterface;
}
