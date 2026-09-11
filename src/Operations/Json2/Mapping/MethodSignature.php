<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;

final class MethodSignature
{
    /** @var string[] */
    private array $positionalParameters;

    /** @var string[] */
    private array $allowedParameters;

    /** @var string[] */
    private array $requiredParameters;

    /**
     * A null model denotes a generic ORM signature.
     *
     * @param string[] $positionalParameters
     * @param string[] $allowedParameters
     * @param string[] $requiredParameters
     */
    public function __construct(
        private readonly ?string $model,
        private readonly string $method,
        private readonly MethodScope $scope,
        array $positionalParameters,
        array $allowedParameters,
        array $requiredParameters = [],
        private readonly ReturnRule $returnRule = ReturnRule::IDENTITY,
        private readonly string $provenance = 'Odoo 19.0',
    ) {
        $this->assertName($method, 'method');

        if (null !== $model) {
            $this->assertName($model, 'model');
        }

        $this->assertUniqueNames($positionalParameters, 'positional');
        $this->assertUniqueNames($allowedParameters, 'allowed');
        $this->assertUniqueNames($requiredParameters, 'required');

        foreach ($positionalParameters as $parameter) {
            if (!in_array($parameter, $allowedParameters, true)) {
                throw new InvalidCallMappingException(sprintf(
                    'Positional parameter "%s" is not permitted by the signature.',
                    $parameter,
                ));
            }
        }

        foreach ($requiredParameters as $parameter) {
            if (!in_array($parameter, $allowedParameters, true)) {
                throw new InvalidCallMappingException(sprintf(
                    'Required parameter "%s" is not permitted by the signature.',
                    $parameter,
                ));
            }
        }

        if (MethodScope::RECORDSET === $scope && !in_array('ids', $allowedParameters, true)) {
            throw new InvalidCallMappingException('A recordset signature must permit the reserved "ids" parameter.');
        }

        if (MethodScope::MODEL === $scope && in_array('ids', $allowedParameters, true)) {
            throw new InvalidCallMappingException('A model signature cannot permit the reserved "ids" parameter.');
        }

        $this->positionalParameters = array_values($positionalParameters);
        $this->allowedParameters = array_values($allowedParameters);
        $this->requiredParameters = array_values($requiredParameters);
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getScope(): MethodScope
    {
        return $this->scope;
    }

    /** @return string[] */
    public function getPositionalParameters(): array
    {
        return $this->positionalParameters;
    }

    /** @return string[] */
    public function getAllowedParameters(): array
    {
        return $this->allowedParameters;
    }

    /** @return string[] */
    public function getRequiredParameters(): array
    {
        return $this->requiredParameters;
    }

    public function getReturnRule(): ReturnRule
    {
        return $this->returnRule;
    }

    public function getProvenance(): string
    {
        return $this->provenance;
    }

    public function isGeneric(): bool
    {
        return null === $this->model;
    }

    private function assertName(string $name, string $kind): void
    {
        if ('' === $name) {
            throw new InvalidCallMappingException(sprintf('The signature %s name cannot be empty.', $kind));
        }
    }

    /** @param string[] $names */
    private function assertUniqueNames(array $names, string $kind): void
    {
        foreach ($names as $name) {
            if ('' === $name) {
                throw new InvalidCallMappingException(sprintf(
                    'Every %s parameter name must be a non-empty string.',
                    $kind,
                ));
            }
        }

        if (count($names) !== count(array_unique($names))) {
            throw new InvalidCallMappingException(sprintf('%s parameter names must be unique.', ucfirst($kind)));
        }
    }
}
