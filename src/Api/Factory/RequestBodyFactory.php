<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Api\Factory;

use Flux\OdooApiClient\Api\RequestBodyInterface;

final class RequestBodyFactory implements RequestBodyFactoryInterface
{
    /** @var string */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function create(string $method): RequestBodyInterface
    {
        return new $this->className($method);
    }
}