<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\UnknownMethodSignatureException;
use FluxSE\OdooApiClient\Serializer\Json2\Json2Dictionary;

final class CallMapper implements CallMapperInterface
{
    public function __construct(private readonly MethodSignatureRegistryInterface $registry)
    {
    }

    public function map(
        string $model,
        string $method,
        array $arguments = [],
        array $options = [],
    ): MappedCall {
        $this->assertPositionalList($arguments);
        $this->assertNamedOptions($options);
        /** @var list<mixed> $arguments */
        /** @var array<string, mixed> $options */

        try {
            $signature = $this->registry->resolve($model, $method);
        } catch (UnknownMethodSignatureException $exception) {
            if ([] !== $arguments) {
                throw new InvalidCallMappingException(sprintf(
                    'Positional arguments are not supported for unregistered JSON-2 call "%s/%s".',
                    $model,
                    $method,
                ), previous: $exception);
            }

            return new MappedCall($model, $method, $options);
        }

        $parameters = $this->mapPositionals($signature, $arguments);
        $options = $this->normaliseSignatureOptions($signature, $options);

        foreach ($options as $name => $value) {
            if (!in_array($name, $signature->getAllowedParameters(), true)) {
                throw new InvalidCallMappingException(sprintf(
                    'Parameter "%s" is not permitted for JSON-2 call "%s/%s".',
                    $name,
                    $model,
                    $method,
                ));
            }

            if (array_key_exists($name, $parameters)) {
                throw new InvalidCallMappingException(sprintf(
                    'Parameter "%s" was provided both positionally and by name for "%s/%s".',
                    $name,
                    $model,
                    $method,
                ));
            }

            $parameters[$name] = $value;
        }

        foreach ($signature->getRequiredParameters() as $requiredParameter) {
            if (!array_key_exists($requiredParameter, $parameters)) {
                throw new InvalidCallMappingException(sprintf(
                    'Required parameter "%s" is missing for JSON-2 call "%s/%s".',
                    $requiredParameter,
                    $model,
                    $method,
                ));
            }
        }

        $returnRule = $signature->getReturnRule();
        if (ReturnRule::CREATED_IDS === $signature->getReturnRule() && array_key_exists('vals_list', $parameters)) {
            $wasProvidedPositionally = array_key_exists(0, $arguments);
            [$parameters['vals_list'], $returnRule] = $this->normaliseCreateValues(
                $parameters['vals_list'],
                $wasProvidedPositionally,
            );
        }

        if (MethodScope::RECORDSET === $signature->getScope() && array_key_exists('ids', $parameters)) {
            $parameters['ids'] = $this->normaliseRecordsetIds($parameters['ids'], $model, $method);
        }

        if ('write' === $signature->getMethod() && $signature->isGeneric() && [] === ($parameters['vals'] ?? null)) {
            $parameters['vals'] = new Json2Dictionary([]);
        }

        return new MappedCall($model, $method, $parameters, $returnRule, $signature);
    }

    /**
     * @param mixed[] $arguments
     * @return array<string, mixed>
     */
    private function mapPositionals(MethodSignature $signature, array $arguments): array
    {
        $names = $signature->getPositionalParameters();
        if (count($arguments) > count($names)) {
            throw new InvalidCallMappingException(sprintf(
                'JSON-2 call "%s" accepts at most %d positional argument(s); %d given.',
                $signature->getMethod(),
                count($names),
                count($arguments),
            ));
        }

        $parameters = [];
        foreach ($arguments as $position => $value) {
            $parameters[$names[$position]] = $value;
        }

        return $parameters;
    }

    /**
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    private function normaliseSignatureOptions(MethodSignature $signature, array $options): array
    {
        if ('search_count' !== $signature->getMethod() || !$signature->isGeneric()) {
            return $options;
        }

        if (array_key_exists('offset', $options)) {
            if (0 !== $options['offset']) {
                throw new InvalidCallMappingException(
                    'Parameter "offset" is unsupported by Odoo 19 search_count unless it is the neutral value 0.',
                );
            }

            unset($options['offset']);
        }

        if (array_key_exists('order', $options)) {
            if (null !== $options['order']) {
                throw new InvalidCallMappingException(
                    'Parameter "order" is unsupported by Odoo 19 search_count unless it is the neutral value null.',
                );
            }

            unset($options['order']);
        }

        return $options;
    }

    /** @return array{mixed, ReturnRule} */
    private function normaliseCreateValues(mixed $values, bool $wasProvidedPositionally): array
    {
        if (!is_array($values)) {
            throw new InvalidCallMappingException('The create "vals_list" parameter must be an array.');
        }

        if ($wasProvidedPositionally && ([] === $values || !array_is_list($values))) {
            $values = [] === $values ? new Json2Dictionary([]) : $values;

            return [[$values], ReturnRule::SINGLE_CREATED_ID];
        }

        foreach ($values as $index => $value) {
            if (!is_array($value)) {
                throw new InvalidCallMappingException(
                    'A multiple create call must contain only dictionaries of field values.',
                );
            }

            if ([] === $value) {
                $values[$index] = new Json2Dictionary([]);
            }
        }

        return [$values, ReturnRule::CREATED_IDS];
    }

    /** @return list<int> */
    private function normaliseRecordsetIds(mixed $ids, string $model, string $method): array
    {
        if (is_int($ids)) {
            return [$ids];
        }

        if (!is_array($ids) || !array_is_list($ids)) {
            throw new InvalidCallMappingException(sprintf(
                'The reserved "ids" parameter for "%s/%s" must be an integer or a list of integers.',
                $model,
                $method,
            ));
        }

        $normalisedIds = [];
        foreach ($ids as $id) {
            if (!is_int($id)) {
                throw new InvalidCallMappingException(sprintf(
                    'The reserved "ids" parameter for "%s/%s" must contain only integers.',
                    $model,
                    $method,
                ));
            }

            $normalisedIds[] = $id;
        }

        return $normalisedIds;
    }

    /** @param mixed[] $arguments */
    private function assertPositionalList(array $arguments): void
    {
        if (!array_is_list($arguments)) {
            throw new InvalidCallMappingException(
                'Positional arguments must be represented by a zero-based list; use options for named parameters.',
            );
        }
    }

    /** @param mixed[] $options */
    private function assertNamedOptions(array $options): void
    {
        foreach (array_keys($options) as $name) {
            if (!is_string($name) || '' === $name) {
                throw new InvalidCallMappingException('JSON-2 named parameter names must be non-empty strings.');
            }
        }
    }
}
