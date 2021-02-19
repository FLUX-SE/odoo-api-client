<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Http\Client\Common\Exception\ClientErrorException;

/**
 * @experimental This class try to get default value of Selection type fields without any context
 */
final class SelectionTypeDefaultValueAdder extends AbstractModelFixer implements ModelFixerInterface
{
    /** @var RecordListOperationsInterface */
    private $recordListOperations;

    public function __construct(RecordListOperationsInterface $recordListOperations)
    {
        $this->recordListOperations = $recordListOperations;
    }

    protected function doFix(string $modelName, array &$structure): void
    {
        try {
            $arguments = new Arguments();
            $arguments->addArgument(array_keys($structure));
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

            if (false === isset($data[$fieldName])) {
                continue;
            }

            if (null === $data[$fieldName]) {
                continue;
            }

            if (false === $data[$fieldName]) {
                continue;
            }

            $fieldInfo['default'] = $data[$fieldName];
            if (is_string($fieldInfo['default'])) {
                $fieldInfo['default'] = sprintf('"%s"', $fieldInfo['default']);
            }

            if (is_bool($fieldInfo['default'])) {
                $fieldInfo['default'] = $fieldInfo['default'] ? 'true' : 'false';
            }

            $fieldInfo['default'] = sprintf('%s', $fieldInfo['default']);
        }
    }

    public function supports(string $modelName, array $structure): bool
    {
        return true;
    }
}
