<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Http\Client\Common\Exception\ClientErrorException;

/**
 * @experimental This class try to get default value of Selection type fields without any context
 */
final class SelectionTypeDefaultValueAdder implements ModelFixerInterface
{
    public function __construct(private RecordListOperationsInterface $recordListOperations)
    {
    }

    public function fix(string $modelName, array &$structure): void
    {
        try {
            $arguments = new Arguments();
            $arguments->addArgument(array_keys($structure));
            /** @var array $data */
            $data = $this->recordListOperations->execute_kw_action(
                $modelName,
                'default_get',
                $arguments
            );
        } catch (ClientErrorException $e) {
            $data = [];
        }

        foreach ($structure as $fieldName => &$fieldInfo) {
            $type = $fieldInfo['type'] ?? null;

            if ('selection' !== $type) {
                continue;
            }

            $default = $data[$fieldName] ?? null;
            if (null === $default) {
                continue;
            }

            if (false === $default) {
                continue;
            }

            $fieldInfo['default'] = sprintf('"%s"', $default);
        }
    }

    public function supports(string $modelName, array $structure): bool
    {
        return true;
    }
}
