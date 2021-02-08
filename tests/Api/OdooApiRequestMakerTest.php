<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Api;

use FluxSE\OdooApiClient\Api\OdooApiRequestMaker;
use FluxSE\OdooApiClient\Api\RequestBody;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;

class OdooApiRequestMakerTest extends TestCase
{
    /** @var OdooApiRequestMaker */
    private $odooApiRequestMaker;
    /** @var XmlRpcSerializerHelperInterface */
    private $xmlRpcSerializerHelper;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);
        $this->xmlRpcSerializerHelper = $odooApiClientBuilder->buildXmlRpcSerializerHelper();
        $this->odooApiRequestMaker = $odooApiClientBuilder->buildApiRequestMaker();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function testRequest()
    {
        $requestBody = new RequestBody('about');
        $body = $this->xmlRpcSerializerHelper->serializeRequestBody($requestBody);
        $response = $this->odooApiRequestMaker->request('/common', $body);

        $this->assertSame(200, $response->getStatusCode());
    }
}
