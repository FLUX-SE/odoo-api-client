<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Factory;

use FluxSE\OdooApiClient\Api\RequestBodyInterface;

final class RequestBodyFactory implements RequestBodyFactoryInterface
{
    public function __construct(private string $className)
    {
    }

    public function create(string $method): RequestBodyInterface
    {
        /** @var RequestBodyInterface $requestBody */
        $requestBody = new $this->className($method);

        return $requestBody;
    }
}
