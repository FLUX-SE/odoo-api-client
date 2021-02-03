<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\PhpGenerator;

use Exception;
use Prometee\PhpClassGenerator\Builder\ClassBuilderInterface;

final class OdooPhpClassesGenerator implements OdooPhpClassesGeneratorInterface
{
    /** @var string */
    private $basePath;
    /** @var array */
    private $classesConfig;
    /** @var string */
    private $baseNamespace;
    /** @var ClassBuilderInterface */
    private $classBuilder;

    public function __construct(
        string $basePath,
        string $baseNamespace,
        array $classesConfig,
        ClassBuilderInterface $classBuilder
    ) {
        $this->basePath = $basePath;
        $this->baseNamespace = $baseNamespace;
        $this->classesConfig = $classesConfig;
        $this->classBuilder = $classBuilder;
    }

    /**
     * @param string|null $indent
     * @param string|null $eol
     *
     * @return bool
     * @throws Exception
     */
    public function generate(
        ?string $indent = null,
        ?string $eol = null
    ): bool {
        $indent = $indent ?? $this->classBuilder->getIndent();
        $eol = $eol ?? $this->classBuilder->getEol();
        $this->classBuilder->setIndent($indent);
        $this->classBuilder->setEol($eol);

        foreach ($this->classesConfig as $config) {
            $path = explode('\\', $config['class']);
            $className = (string) array_pop($path);
            $classNamespace = (string) implode('\\', $path);
            $classNamespace = $this->baseNamespace . '\\' . $classNamespace;
            $classNamespace = rtrim($classNamespace, '\\');

            $classPath = implode('/', $path);
            $classFilePath = rtrim($this->basePath . '/' . $classPath, '/') . '/' . $className . '.php';

            $this->classBuilder->setClassType($config['type']);
            $this->classBuilder->setExtendClass($config['extends'] ?? null);
            $this->classBuilder->setImplements($config['implements'] ?? []);

            $constantsConfig = $config['constants'] ?? [];
            foreach ($constantsConfig as $constantConfig) {
                $description = $constantConfig['description'] ?? [];
                $description = implode($eol, $description);
                $constant = $this->classBuilder->createConstant(
                    $constantConfig['name'],
                    $constantConfig['types'] ?? [],
                    $constantConfig['default'] ?? null,
                    $description
                );

                $constant->setReadable($constantConfig['readable'] ?? false);
                $constant->setWriteable($constantConfig['writable'] ?? false);
                $constant->setInherited($constantConfig['inherited'] ?? false);

                $this->classBuilder->addProperty($constant);
            }

            $propertiesConfig = $config['properties'] ?? [];
            foreach ($propertiesConfig as $propertyConfig) {
                $description = implode($eol, $propertyConfig['description']);
                $property = $this->classBuilder->createProperty(
                    $propertyConfig['name'],
                    $propertyConfig['types'],
                    $propertyConfig['default'],
                    $description
                );

                if ($config['type'] !== ClassBuilderInterface::CLASS_TYPE_FINAL) {
                    $property->setScope('protected');
                }

                $property->setReadable($propertyConfig['readable'] ?? true);
                $property->setWriteable($propertyConfig['writable'] ?? true);
                $property->setInherited($propertyConfig['inherited'] ?? false);
                $property->setInheritedPosition($propertyConfig['inherited_position'] ?? null);
                $property->setInheritedRequired($propertyConfig['inherited_required'] ?? false);

                $this->classBuilder->addProperty($property);
            }

            $methodsConfig = $config['methods'] ?? [];
            foreach ($methodsConfig as $methodConfig) {
                $method = $this->classBuilder->createMethod(
                    $methodConfig['scope'] ?? 'public',
                    $methodConfig['name'],
                    $methodConfig['return_types'] ?? [],
                    $methodConfig['static'] ?? false,
                );

                /** @var string[] $body */
                $body = $methodConfig['body'];
                $method->addMultipleLines(implode("\n", $body), "\n");
                $this->classBuilder->addMethod($method);
            }

            $classModel = $this->classBuilder->buildClass($classNamespace, $className);
            $classModel->getPhpDoc()->setLines($config['description'] ?? []);

            $classContent = $this->classBuilder->renderClass($classModel);
            $this->classBuilder->reset();

            if (null === $classContent) {
                continue;
            }

            $written = $this->writeClass($classContent, $classFilePath);

            if (false === $written) {
                throw new Exception(sprintf('Unable to write the file %s !', $classFilePath));
            }
        }

        return true;
    }

    public function writeClass(string $classContent, string $classFilePath): bool
    {
        $classPath = dirname($classFilePath);
        if (false === is_dir($classPath)) {
            mkdir($classPath, 0777, true);
        }

        return file_put_contents($classFilePath, $classContent) !== false;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    public function getClassesConfig(): array
    {
        return $this->classesConfig;
    }

    public function setClassesConfig(array $classesConfig): void
    {
        $this->classesConfig = $classesConfig;
    }

    public function getBaseNamespace(): string
    {
        return $this->baseNamespace;
    }

    public function setBaseNamespace(string $baseNamespace): void
    {
        $this->baseNamespace = $baseNamespace;
    }

    public function getClassBuilder(): ClassBuilderInterface
    {
        return $this->classBuilder;
    }

    public function setClassBuilder(ClassBuilderInterface $classBuilder): void
    {
        $this->classBuilder = $classBuilder;
    }
}
