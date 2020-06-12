<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApiInterface;
use Flux\OdooApiClient\XmlRpc\RequestBody;
use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;

abstract class AbstractOperations implements OperationsInterface
{
    /** @var OdooApiInterface */
    protected $api;

    /**
     * @param OdooApiInterface $api
     */
    public function __construct(OdooApiInterface $api)
    {
        $this->api = $api;
    }

    public function request(string $method, array $params = []): ResponseBodyInterface
    {
        $requestBody = new RequestBody($method, $params);

        return $this->api->request(
            $this->getEndpointPath(),
            $requestBody
        );
    }

    public function getApi(): OdooApiInterface
    {
        return $this->api;
    }
}
