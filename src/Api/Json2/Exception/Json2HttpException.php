<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2\Exception;

use Psr\Http\Message\ResponseInterface;

final class Json2HttpException extends Json2Exception
{
    /**
     * Keeping server-controlled values outside the exception object prevents common
     * exception dumps from exposing a reflected credential or response body.
     *
     * @var \WeakMap<self, array{response: ResponseInterface, errorName: string|null}>|null
     */
    private static ?\WeakMap $details = null;

    public function __construct(ResponseInterface $response, ?string $errorName = null)
    {
        parent::__construct(sprintf('The JSON-2 request failed with HTTP status %d.', $response->getStatusCode()));

        self::$details ??= new \WeakMap();
        self::$details[$this] = [
            'response' => $response,
            'errorName' => $errorName,
        ];
    }

    public function getStatusCode(): int
    {
        return $this->getResponse()->getStatusCode();
    }

    public function getErrorName(): ?string
    {
        return $this->getDetails()['errorName'];
    }

    public function getResponse(): ResponseInterface
    {
        return $this->getDetails()['response'];
    }

    /** @return array{response: ResponseInterface, errorName: string|null} */
    private function getDetails(): array
    {
        if (null === self::$details || false === isset(self::$details[$this])) {
            throw new \LogicException('JSON-2 HTTP exception details are unavailable.');
        }

        return self::$details[$this];
    }
}
