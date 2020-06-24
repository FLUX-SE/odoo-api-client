<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Command;

use DateTimeInterface;
use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Flux\OdooApiClient\PhpGenerator\OdooPhpClassesGeneratorInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Prometee\PhpClassGenerator\Builder\ClassBuilderInterface;
use Prometee\PhpClassGenerator\Helper\PhpReservedWordsHelperInterface;
use Prometee\PhpClassGenerator\Model\PhpDoc\PhpDocInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Symfony\Component\String\u;

final class GeneratorCommand extends Command
{
    /** @var OdooPhpClassesGeneratorInterface */
    private $odooPhpClassesGenerator;
    /** @var RecordListOperationsInterface */
    private $recordListOperations;
    /** @var InspectionOperationsInterface */
    private $inspectionOperations;
    /** @var PhpReservedWordsHelperInterface */
    private $phpReservedWordsHelper;

    private $inheritedPropertiesCache = [];
    private $inheritedModelsCache = [];

    public function __construct(
        OdooPhpClassesGeneratorInterface $odooPhpClassesGenerator,
        RecordListOperationsInterface $recordListOperations,
        InspectionOperationsInterface $inspectionOperations,
        PhpReservedWordsHelperInterface $phpReservedWordsHelper,
        string $name = null
    ) {
        $this->odooPhpClassesGenerator = $odooPhpClassesGenerator;
        $this->recordListOperations = $recordListOperations;
        $this->inspectionOperations = $inspectionOperations;
        $this->phpReservedWordsHelper = $phpReservedWordsHelper;
        parent::__construct($name);
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->addArgument('baseUrl', InputArgument::REQUIRED, 'Your Odoo base URL (ex: https://myinstance.odoo.com.')
            ->addArgument('database', InputArgument::REQUIRED, 'Your Odoo database name.')
            ->addArgument('username', InputArgument::REQUIRED, 'Your Odoo account username.')
            ->addArgument('password', InputArgument::REQUIRED, 'Your Odoo account password')
            ->addArgument('basePath', InputArgument::OPTIONAL, 'The path where classes will be generated', dirname(__DIR__))
            ->addArgument('baseNamespace', InputArgument::OPTIONAL, 'The base namespace of the generated classes', 'Flux\\OdooApiClient');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->reconfigureServices($input);

        $modelsConfig = [];
        $managersConfig = [];
        $baseNamespace = $input->getArgument('baseNamespace');
        $basePath = $input->getArgument('basePath');
        $modelNamespace = $baseNamespace.'\\Model\\Object';
        $managerNamespace = $baseNamespace.'\\Manager\\Object';
        $modelBasePath = $basePath.'/Model/Object';
        $managerBasePath = $basePath.'/Manager/Object';
        $baseModelClass = $modelNamespace.'\\Base';

        $fieldGetOptions = new FieldsGetOptions();
        $fieldGetOptions->addAttribute('type');
        $fieldGetOptions->addAttribute('string');
        $fieldGetOptions->addAttribute('readonly');
        $fieldGetOptions->addAttribute('relation');
        $fieldGetOptions->addAttribute('required');
        $fieldGetOptions->addAttribute('selection');
        $fieldGetOptions->addAttribute('inherited_model_ids');

        $search_read = $this->recordListOperations->search_read('ir.model');

        foreach ($search_read as $item) {
            $this->inheritedModelsCache[$item['id']] = $item['model'];
        }
        $fieldsInfos = $this->inspectionOperations->fields_get(
            'base',
            [],
            $fieldGetOptions
        );
        $this->inheritedPropertiesCache['base'] = array_keys($fieldsInfos);
        foreach ($search_read as $item) {
            if (count($item['inherited_model_ids']) === 1) {
                $inheritedModelId = $item['inherited_model_ids'][0];
                $inheritedModel = $this->inheritedModelsCache[$inheritedModelId];
                $fieldsInfos = $this->inspectionOperations->fields_get(
                    $inheritedModel,
                    [],
                    $fieldGetOptions
                );
                $this->inheritedPropertiesCache[$inheritedModel] = array_keys($fieldsInfos);
            }
        }

        foreach ($search_read as $item) {
            $modelName = $item['model'];
            $className = $this->buildClassName($modelName);
            $classType = ClassBuilderInterface::CLASS_TYPE_FINAL;
            $extends = $baseModelClass;

            foreach ($item['inherited_model_ids'] as $inheritedModelId) {
                $inheritedModel = $this->inheritedModelsCache[$inheritedModelId];
                $extends = $modelNamespace.'\\'.$this->buildClassName($inheritedModel);
            }

            $properties = [];

            $fieldsInfos = $this->inspectionOperations->fields_get(
                $modelName,
                [],
                $fieldGetOptions
            );

            foreach ($fieldsInfos as $fieldName => $fieldInfo) {
                $readonly = $fieldInfo['readonly'] ?? false;
                $types = $this->transformTypes($fieldInfo, $modelNamespace);
                $properties[$fieldName] = [
                    'types' => $types,
                    'default' => null,
                    'description' => $fieldInfo['string'],
                    'readable' => false !== $readonly,
                    'writable' => false === $readonly,
                    'inherited' => $this->isInheritedField($item, $fieldName)
                ];
                /*if (in_array('mixed', $types)) {
                    dump($modelName . ' --> ' . $fieldName, $item, $fieldInfo);
                }*/
            }

            if ($item['abstract'] ?? false) {
                $classType = ClassBuilderInterface::CLASS_TYPE_ABSTRACT;
            }

            if (isset($this->inheritedPropertiesCache[$modelName])) {
                $classType = ClassBuilderInterface::CLASS_TYPE_CLASS;
            }

            if ($modelName === 'base') {
                $extends = null;
            }

            $info = trim($item['info'], '"');
            $info = trim($info);
            $modelsConfig[$className] = [
                'type' => $classType,
                'extends' => $extends,
                'description' => [
                    PhpDocInterface::TYPE_DESCRIPTION => [
                        sprintf('Odoo model : %s', $modelName),
                        sprintf('Name : %s', $item['model']),
                        '',
                        $info,
                    ]
                ],
                'properties' => $properties,
            ];
        }

        $this->odooPhpClassesGenerator->setBaseNamespace($modelNamespace);
        $this->odooPhpClassesGenerator->setBasePath($modelBasePath);
        $this->odooPhpClassesGenerator->setClassesConfig($modelsConfig);
        $this->odooPhpClassesGenerator->generate();

        $this->odooPhpClassesGenerator->setBaseNamespace($managerNamespace);
        $this->odooPhpClassesGenerator->setBasePath($managerBasePath);
        $this->odooPhpClassesGenerator->setClassesConfig($managersConfig);
        // $this->odooPhpClassesGenerator->getClassBuilder()->setExtendClass('');
        // $this->odooPhpClassesGenerator->generate();

        return Command::SUCCESS;
    }

    /**
     * @param InputInterface $input
     */
    private function reconfigureServices(InputInterface $input): void
    {
        $baseUrl = $input->getArgument('baseUrl');
        $database = $input->getArgument('database');
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        $objectOperations = $this->recordListOperations->getObjectOperations();
        $odooApiRequestMaker = $objectOperations->getApiRequestMaker();
        $uriFactory = Psr17FactoryDiscovery::findUrlFactory();
        $baseUri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $baseUrl,
            OdooApiRequestMakerInterface::BASE_PATH
        ));
        $odooApiRequestMaker->setBaseUri($baseUri);
        $objectOperations->setDatabase($database);
        $objectOperations->setUsername($username);
        $objectOperations->setPassword($password);

        $basePath = $input->getArgument('basePath');
        $baseNamespace = $input->getArgument('baseNamespace');

        $this->odooPhpClassesGenerator->setBasePath($basePath);
        $this->odooPhpClassesGenerator->setBaseNamespace($baseNamespace);
    }

    /**
     * @param array<string, string> $fieldInfo
     * @param string $baseNamespace
     *
     * @return array<int, string>
     */
    private function transformTypes(array $fieldInfo, string $baseNamespace): array
    {
        $phpTypes = [];

        $required = $fieldInfo['required'] ?? false;
        if (true === $required) {
            $phpTypes[] = 'null';
        }

        $odooType = $fieldInfo['type'] ?? null;
        switch ($odooType) {
            case 'binary':
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
            case 'selection':
                $phpTypes[] = 'array';
                break;
            case 'many2one':
            case 'many2many':
            case 'one2many':
                $phpTypes[] = $baseNamespace.'\\'.$this->buildClassName($fieldInfo['relation']);
                break;
            default:
                $phpTypes[] = 'mixed';
                break;
        }

        return $phpTypes;
    }

    private function buildClassName(string $modelName): string
    {
        $path = explode('.', $modelName);
        array_walk($path, function (string &$item) {
            $u = u($item)->camel()->title();
            $item = $u->toString();
            if ($this->phpReservedWordsHelper->check($item)) {
                $item .= '_';
            }
        });
        return implode('\\', $path);
    }

    private function isInheritedField(array $currentItem, string $fieldName): bool
    {
        $modelName = $currentItem['model'];
        if ($modelName === 'base') {
            return false;
        }

        $inheritedModelIds = $currentItem['inherited_model_ids'];
        $inheritedModelIds[] = array_search('base', $this->inheritedModelsCache);
        foreach ($inheritedModelIds as $inheritedModelId) {
            $inheritedModel = $this->inheritedModelsCache[$inheritedModelId];
            $properties = $this->inheritedPropertiesCache[$inheritedModel];
            if (in_array($fieldName, $properties)) {
                return true;
            }
        }

        return false;
    }
}