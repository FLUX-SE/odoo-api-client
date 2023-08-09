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
        $phpTypes[] = match ($odooType) {
            'integer', 'many2one_reference' => 'int',
            'boolean' => 'bool',
            'char', 'html', 'text', 'selection' => 'string',
            'date', 'datetime' => DateTimeInterface::class,
            'float', 'monetary' => 'float',
            'many2one' => OdooRelation::class,
            'many2many', 'one2many' => OdooRelation::class . '[]',
            default => 'mixed',
        };

        $required = (bool) ($fieldInfo['required'] ?? false);
        if (false === $required) {
            $phpTypes[] = 'null';
        }

        return $phpTypes;
    }

    public static function sanitizeComment(string $comment): string
    {
        $comment = trim($comment, '"');
        $comment = trim($comment);

        $lines = explode("\n", $comment);

        foreach ($lines as &$line) {
            if ('' === trim($line)) {
                $line = '';
            }
            $line = preg_replace('#([\s]{4,})#', '    ', rtrim($line));
        }

        return implode("\n", $lines);
    }

    public static function prettySelection(array $selection, int $deep = 0): array
    {
        $lines = [];
        $line = '';
        foreach ($selection as $i => $item) {
            if (is_array($item)) {
                $lines = array_merge($lines, self::prettySelection($item, $deep + 1));
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
