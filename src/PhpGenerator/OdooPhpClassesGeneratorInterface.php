<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

use Prometee\PhpClassGenerator\Builder\ClassBuilderInterface;
use Prometee\PhpClassGenerator\PhpGeneratorInterface;

interface OdooPhpClassesGeneratorInterface extends PhpGeneratorInterface
{
    public function setClassBuilder(ClassBuilderInterface $classBuilder): void;

    public function setClassesConfig(array $classesConfig): void;

    public function setBaseNamespace(string $baseNamespace): void;

    public function getBasePath(): string;

    public function getClassesConfig(): array;

    public function setBasePath(string $basePath): void;

    public function getBaseNamespace(): string;

    public function getClassBuilder(): ClassBuilderInterface;
}
