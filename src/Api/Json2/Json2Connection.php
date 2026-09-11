<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2;

use Psr\Http\Message\RequestInterface;

final class Json2Connection
{
    private string $baseUri;

    public function __construct(
        string $baseUri,
        private readonly string $apiKey,
        private readonly ?string $database = null,
    ) {
        $this->baseUri = $this->validateBaseUri($baseUri);
        $this->assertHeaderValue($apiKey, 'API key');

        if (null !== $database) {
            $this->assertHeaderValue($database, 'database');
        }
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function getDatabase(): ?string
    {
        return $this->database;
    }

    public function getEndpointUri(string $model, string $method): string
    {
        if (
            1 !== preg_match('/\A[A-Za-z_][A-Za-z0-9_.]*\z/D', $model)
            || str_contains($model, '..')
        ) {
            throw new \InvalidArgumentException('The JSON-2 model must be a safe path segment.');
        }

        if (1 !== preg_match('/\A[A-Za-z_][A-Za-z0-9_]*\z/D', $method)) {
            throw new \InvalidArgumentException('The JSON-2 method must be a safe path segment.');
        }

        return sprintf('%s/json/2/%s/%s', $this->baseUri, $model, $method);
    }

    public function applyToRequest(RequestInterface $request): RequestInterface
    {
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->apiKey);

        if (null !== $this->database) {
            $request = $request->withHeader('X-Odoo-Database', $this->database);
        }

        return $request;
    }

    public function withApiKey(string $apiKey): self
    {
        return new self($this->baseUri, $apiKey, $this->database);
    }

    public function withBaseUri(string $baseUri): self
    {
        return new self($baseUri, $this->apiKey, $this->database);
    }

    public function withDatabase(?string $database): self
    {
        return new self($this->baseUri, $this->apiKey, $database);
    }

    public function __toString(): string
    {
        return $this->baseUri;
    }

    private function validateBaseUri(string $baseUri): string
    {
        if (
            '' === $baseUri
            || $baseUri !== trim($baseUri)
            || 1 === preg_match('/[\x00-\x20\x7F\\\\]/', $baseUri)
        ) {
            throw new \InvalidArgumentException('The JSON-2 base URI is invalid.');
        }

        $parts = parse_url($baseUri);
        if (
            false === $parts
            || false === isset($parts['scheme'], $parts['host'])
            || false === in_array(strtolower($parts['scheme']), ['http', 'https'], true)
            || '' === $parts['host']
            || isset($parts['user'])
            || isset($parts['pass'])
            || isset($parts['query'])
            || isset($parts['fragment'])
        ) {
            throw new \InvalidArgumentException('The JSON-2 base URI must be an HTTP(S) origin without userinfo, query or fragment.');
        }

        $path = $parts['path'] ?? '';
        $decodedPath = rawurldecode($path);
        if (
            1 === preg_match('/%(?:2f|5c)/i', $path)
            || str_contains($decodedPath, '\\')
            || 1 === preg_match('/[\x00-\x1F\x7F]/', $decodedPath)
            || 1 === preg_match('#(?:\A|/)\.\.?(?:/|\z)#', $decodedPath)
        ) {
            throw new \InvalidArgumentException('The JSON-2 reverse proxy prefix is invalid.');
        }

        return rtrim($baseUri, '/');
    }

    private function assertHeaderValue(string $value, string $name): void
    {
        if ('' === $value || $value !== trim($value) || 1 === preg_match('/[\x00-\x20\x7F]/', $value)) {
            throw new \InvalidArgumentException(sprintf('The JSON-2 %s is invalid.', $name));
        }
    }
}
