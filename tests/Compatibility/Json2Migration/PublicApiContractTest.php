<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Compatibility\Json2Migration;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;

final class PublicApiContractTest extends TestCase
{
    private const REFERENCE = '2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2';

    public function testHistoricalPublicAndProtectedApiMatchesReferenceSnapshot(): void
    {
        /** @var array{reference: string, interfaces: string[], symbols: array<string, string>} $fixture */
        $fixture = require __DIR__ . '/fixtures/public-api-reference.php';
        self::assertSame(self::REFERENCE, $fixture['reference']);
        self::assertCount(34, $fixture['interfaces']);
        foreach ($fixture['symbols'] as $symbol => $expected) {
            self::assertTrue(
                class_exists($symbol) || interface_exists($symbol) || trait_exists($symbol) || function_exists($symbol),
                sprintf('Historical symbol %s was removed.', $symbol),
            );
            self::assertSame($expected, self::signature($symbol), sprintf('Contract changed for %s.', $symbol));
        }
    }

    /** @return array{reference: string, interfaces: string[], symbols: array<string, string>} */
    public static function createSnapshot(): array
    {
        $src = dirname(__DIR__, 3) . '/src';
        $symbols = [];
        $interfaces = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($src));
        foreach ($iterator as $file) {
            if (!$file instanceof \SplFileInfo) {
                continue;
            }
            if (!$file->isFile() || 'php' !== $file->getExtension()) {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($src) + 1);
            if ('functions.php' === $relative) {
                foreach (['is_false', 'is_mixed'] as $function) {
                    $symbols[$function] = self::signature($function);
                }
                continue;
            }

            $symbol = 'FluxSE\\OdooApiClient\\' . str_replace(['/', '.php'], ['\\', ''], $relative);
            if (!class_exists($symbol) && !interface_exists($symbol) && !trait_exists($symbol)) {
                continue;
            }
            if (interface_exists($symbol)) {
                $interfaces[] = $symbol;
            }
            $symbols[$symbol] = self::signature($symbol);
        }

        sort($interfaces);
        ksort($symbols);

        return ['reference' => self::REFERENCE, 'interfaces' => $interfaces, 'symbols' => $symbols];
    }

    private static function signature(string $symbol): string
    {
        if (function_exists($symbol)) {
            return self::functionSignature(new ReflectionFunction($symbol));
        }

        /** @var class-string $symbol */
        $reflection = new ReflectionClass($symbol);
        // ReflectionClass::isReadOnly() is unavailable on supported PHP 8.1.
        // @phpstan-ignore-next-line function.alreadyNarrowedType
        $isReadOnly = method_exists($reflection, 'isReadOnly') && $reflection->isReadOnly();
        $parts = [sprintf(
            '%s %s%s%s%s',
            $reflection->isInterface() ? 'interface' : ($reflection->isTrait() ? 'trait' : 'class'),
            $reflection->isAbstract() ? 'abstract ' : '',
            $reflection->isFinal() ? 'final ' : '',
            $isReadOnly ? 'readonly ' : '',
            $reflection->getName(),
        )];
        $parent = $reflection->getParentClass();
        $parts[] = 'parent=' . (false === $parent ? '-' : $parent->getName());
        $parts[] = 'interfaces=' . implode(',', $reflection->getInterfaceNames());
        $parts[] = 'traits=' . implode(',', $reflection->getTraitNames());

        $constants = $reflection->getReflectionConstants();
        usort($constants, static fn ($left, $right): int => $left->getName() <=> $right->getName());
        foreach ($constants as $constant) {
            if ($constant->getDeclaringClass()->getName() !== $symbol || $constant->isPrivate()) {
                continue;
            }
            $parts[] = sprintf(
                'const %s%s%s=%s',
                $constant->isProtected() ? 'protected ' : 'public ',
                $constant->isFinal() ? 'final ' : '',
                $constant->getName(),
                serialize($constant->getValue()),
            );
        }
        $properties = $reflection->getProperties();
        usort($properties, static fn ($left, $right): int => $left->getName() <=> $right->getName());
        $defaultProperties = $reflection->getDefaultProperties();
        foreach ($properties as $property) {
            if ($property->getDeclaringClass()->getName() !== $symbol || $property->isPrivate()) {
                continue;
            }
            $parts[] = sprintf(
                'property %s%s%s$%s:%s%s',
                $property->isProtected() ? 'protected ' : 'public ',
                $property->isStatic() ? 'static ' : '',
                $property->isReadOnly() ? 'readonly ' : '',
                $property->getName(),
                self::type($property->getType()),
                array_key_exists($property->getName(), $defaultProperties)
                    ? '=' . serialize($defaultProperties[$property->getName()])
                    : '',
            );
        }
        $methods = $reflection->getMethods();
        usort($methods, static fn (ReflectionMethod $left, ReflectionMethod $right): int => $left->getName() <=> $right->getName());
        foreach ($methods as $method) {
            if ($method->getDeclaringClass()->getName() !== $symbol || $method->isPrivate()) {
                continue;
            }
            $parts[] = self::functionSignature($method);
        }

        return implode("\n", $parts);
    }

    private static function functionSignature(ReflectionFunctionAbstract $function): string
    {
        $parameters = array_map(static fn (ReflectionParameter $parameter): string => sprintf(
            '%s%s%s%s$%s%s',
            self::type($parameter->getType()),
            null === $parameter->getType() ? '' : ' ',
            $parameter->isPassedByReference() ? '&' : '',
            $parameter->isVariadic() ? '...' : '',
            $parameter->getName(),
            $parameter->isDefaultValueAvailable() ? '=' . serialize($parameter->getDefaultValue()) : '',
        ), $function->getParameters());

        return sprintf(
            '%s%s%s%s%s%s(%s):%s',
            $function instanceof ReflectionMethod && $function->isProtected() ? 'protected ' : 'public ',
            $function instanceof ReflectionMethod && $function->isAbstract() ? 'abstract ' : '',
            $function instanceof ReflectionMethod && $function->isFinal() ? 'final ' : '',
            $function instanceof ReflectionMethod && $function->isStatic() ? 'static ' : '',
            $function->getName(),
            $function->returnsReference() ? '&' : '',
            implode(',', $parameters),
            self::type($function->getReturnType()),
        );
    }

    private static function type(?ReflectionType $type): string
    {
        if (null === $type) {
            return '-';
        }
        if ($type instanceof ReflectionUnionType) {
            return implode('|', array_map(self::type(...), $type->getTypes()));
        }
        if ($type instanceof ReflectionIntersectionType) {
            return implode('&', array_map(self::type(...), $type->getTypes()));
        }
        if ($type instanceof ReflectionNamedType) {
            return ($type->allowsNull() && 'null' !== $type->getName() ? '?' : '') . $type->getName();
        }

        return (string) $type;
    }
}
