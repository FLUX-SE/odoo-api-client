<?php

namespace Tests\Flux\OdooApiClient\Api;

use Flux\OdooApiClient\Api\OdooApiRequestMaker;
use Flux\OdooApiClient\Api\RequestBody;
use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
use Flux\OdooApiClient\Serializer\XmlRpcSerializerHelperInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

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
