<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Builder;

use Flux\OdooApiClient\Api\OdooApiInterface;
use Flux\OdooApiClient\HttPlug\Plugin\OdooApiErrorPlugin;
use Http\Client\Common\Plugin;
use LogicException;

class OdooHttpMethodsClientBuilder extends AbstractHttpMethodsClientBuilder
{
    public function __construct(
        string $baseHostUri,
        string $basePath = OdooApiInterface::BASE_PATH
    ) {
        parent::__construct($baseHostUri, $basePath);
    }

    public function buildAuthenticationPlugin(): ?Plugin
    {
        return null;
    }

    public function buildErrorPlugin(): ?Plugin
    {
        $errorPlugin = parent::buildErrorPlugin();

        if (null === $errorPlugin) {
            return null;
        }

        return new OdooApiErrorPlugin($errorPlugin);
    }
}
