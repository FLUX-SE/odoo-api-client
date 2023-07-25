<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Api;

use FluxSE\OdooApiClient\Api\OdooApiRequestMaker;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use PHPUnit\Framework\TestCase;

class OdooApiRequestMakerTest extends TestCase
{
    /** @var OdooApiRequestMaker */
    private $odooXmlRpcApiRequestMaker;

    /** @var OdooApiRequestMaker */
    private $odooJsonRpcApiRequestMaker;

    /** @var RpcSerializerHelperInterface */
    private $xmlRpcSerializerHelper;

    /** @var RpcSerializerHelperInterface */
    private $jsonRpcSerializerHelper;

    /**
     *
     */
    protected function setUp(): void
    {
        $odooXmlApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST'], OdooApiRequestMakerInterface::BASE_XMLRPC_PATH);
        $this->xmlRpcSerializerHelper = $odooXmlApiClientBuilder->buildRpcSerializerHelper();
        $this->odooXmlRpcApiRequestMaker = $odooXmlApiClientBuilder->buildApiRequestMaker();

        $odooJsonApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);
        $this->jsonRpcSerializerHelper = $odooJsonApiClientBuilder->buildRpcSerializerHelper();
        $this->odooJsonRpcApiRequestMaker = $odooJsonApiClientBuilder->buildApiRequestMaker();
    }

    public function testXmlRpcRequest(): void
    {
        $requestBody = new RequestBody('about');
        $body = $this->xmlRpcSerializerHelper->serializeRequestBody($requestBody);
        $response = $this->odooXmlRpcApiRequestMaker->request('/common', $body);

        $this->assertSame(200, $response->getStatusCode());
    }

    public function testJsonRpcRequest(): void
    {
        $requestBody = new RequestBody('call');
        $requestBody->setJsonParams('common', 'about', []);
        $body = $this->jsonRpcSerializerHelper->serializeRequestBody($requestBody);
        $response = $this->odooJsonRpcApiRequestMaker->request('', $body);

        $this->assertSame(200, $response->getStatusCode());
    }
}
