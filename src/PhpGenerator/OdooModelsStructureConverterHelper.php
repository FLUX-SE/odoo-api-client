<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;

final class OdooModelsStructureConverterHelper
{
    /**
     * @param array<string, string> $fieldInfo
     *
     * @return array<int, string>
     */
    public static function transformTypes(array $fieldInfo): array
    {
        $phpTypes = [];

        $odooType = $fieldInfo['type'] ?? null;
        switch ($odooType) {
            case 'integer':
            case 'many2one_reference':
                $phpTypes[] = 'int';
                break;
            case 'boolean':
                $phpTypes[] = 'bool';
                break;
            case 'char':
            case 'html':
            case 'text':
            case 'selection':
                $phpTypes[] = 'string';
                break;
            case 'date':
            case 'datetime':
                $phpTypes[] = DateTimeInterface::class;
                break;
            case 'float':
            case 'monetary':
                $phpTypes[] = 'float';
                break;
            case 'many2one':
                $phpTypes[] = OdooRelation::class;
                break;
            case 'many2many':
            case 'one2many':
                $phpTypes[] = OdooRelation::class . '[]';
                break;
            case 'binary':
            default:
                $phpTypes[] = 'mixed';
                break;
        }

        $required = (bool) ($fieldInfo['required'] ?? false);
        if (false === $required) {
            $phpTypes[] = 'null';
        }

        return $phpTypes;
    }

    public static function prettyGetSelection(array $selection, int $deep = 0): array
    {
        $lines = [];
        $line = '';
        foreach ($selection as $i => $item) {
            if (is_array($item)) {
                $lines = array_merge($lines, self::prettyGetSelection($item, $deep + 1));
                continue;
            }

            if ($i !== 0) {
                $line .= ' (' . $item . ')';
                continue;
            }

            $line = str_repeat('  ', $deep) . '-> ' . $item;
        }

        if (false === empty($line)) {
            $lines[] = $line;
        }

        return $lines;
    }
}
