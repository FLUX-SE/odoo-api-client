<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Api;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Serializer\RpcSerializerHelperInterface;
use PHPUnit\Framework\TestCase;

class OdooApiRequestMakerTest extends TestCase
{
    private OdooApiRequestMakerInterface $odooXmlRpcApiRequestMaker;

    private OdooApiRequestMakerInterface $odooJsonRpcApiRequestMaker;

    private RpcSerializerHelperInterface $xmlRpcSerializerHelper;

    private RpcSerializerHelperInterface $jsonRpcSerializerHelper;

    protected function setUp(): void
    {
        /** @var string $baseHostname */
        $baseHostname = $_ENV['ODOO_API_HOST'] ?? '';
        $odooXmlApiClientBuilder = new OdooApiClientBuilder($baseHostname, OdooApiRequestMakerInterface::BASE_XMLRPC_PATH);
        $this->xmlRpcSerializerHelper = $odooXmlApiClientBuilder->buildRpcSerializerHelper();
        $this->odooXmlRpcApiRequestMaker = $odooXmlApiClientBuilder->buildApiRequestMaker();

        $odooJsonApiClientBuilder = new OdooApiClientBuilder($baseHostname);
        $this->jsonRpcSerializerHelper = $odooJsonApiClientBuilder->buildRpcSerializerHelper();
        $this->odooJsonRpcApiRequestMaker = $odooJsonApiClientBuilder->buildApiRequestMaker();
    }

    public function testXmlRpcRequest(): void
    {
        $requestBody = new RequestBody('about');
        $body = $this->xmlRpcSerializerHelper->serializeRequestBody($requestBody);
        $response = $this->odooXmlRpcApiRequestMaker->request('/common', $body);

        self::assertSame(200, $response->getStatusCode());
    }

    public function testJsonRpcRequest(): void
    {
        $requestBody = new RequestBody('call');
        $requestBody->setJsonParams('common', 'about', []);
        $body = $this->jsonRpcSerializerHelper->serializeRequestBody($requestBody);
        $response = $this->odooJsonRpcApiRequestMaker->request('', $body);

        self::assertSame(200, $response->getStatusCode());
    }
}
