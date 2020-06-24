<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\PhpGenerator;

use Exception;
use Prometee\PhpClassGenerator\Builder\ClassBuilderInterface;
use Prometee\PhpClassGenerator\Model\Attribute\PropertyInterface;
use stdClass;

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

        foreach ($this->classesConfig as $className => $config) {

            $path = explode('\\', $className);
            $className = array_pop($path);
            $classNamespace = implode('\\', $path);
            $classNamespace = $this->baseNamespace . '\\' . $classNamespace;
            $classNamespace = rtrim($classNamespace, '\\');

            $classPath = implode('/', $path);
            $classFilePath = rtrim($this->basePath . '/' . $classPath, '/') . '/' . $className . '.php';

            $this->classBuilder->setClassType($config['type']);
            $this->classBuilder->setExtendClass($config['extends']);
            $this->classBuilder->getClassModel()->getPhpDoc()->setLines($config['description']);

            foreach ($config['properties'] as $propertyName => $propertyConfig) {
                $property = $this->classBuilder->createProperty(
                    $propertyName,
                    $propertyConfig['types'],
                    $propertyConfig['default'],
                    $propertyConfig['description']
                );

                if ($config['type'] !== ClassBuilderInterface::CLASS_TYPE_FINAL) {
                    $property->setScope('protected');
                }

                $property->setReadable($propertyConfig['readable']);
                $property->setWriteable($propertyConfig['writable']);
                $property->setInherited($propertyConfig['inherited']);

                $this->classBuilder->addProperty($property);
            }

            $classContent = $this->classBuilder->build($classNamespace, $className);

            $written = $this->writeClass($classContent, $classFilePath);

            if (false === $written) {
                throw new Exception(sprintf('Unable to write the file %s !', $classFilePath));
            }
        }

        return true;
    }

    public function writeClass(string $classContent, string $classFilePath): bool
    {
        if (null === $classContent) {
            return false;
        }

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