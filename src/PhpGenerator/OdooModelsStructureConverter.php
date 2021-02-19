<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

use Exception;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\InspectionOperationsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\FieldsGetOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use FluxSE\OdooApiClient\PhpGenerator\ModelFixer\ModelFixerInterface;
use LogicException;
use Prometee\PhpClassGenerator\Builder\ClassBuilderInterface;
use Prometee\PhpClassGenerator\Helper\PhpReservedWordsHelperInterface;
use Prometee\PhpClassGenerator\Model\PhpDoc\PhpDocInterface;
use function Symfony\Component\String\u;

final class OdooModelsStructureConverter implements OdooModelsStructureConverterInterface
{
    /** @var RecordListOperationsInterface */
    private $recordListOperations;
    /** @var InspectionOperationsInterface */
    private $inspectionOperations;
    /** @var PhpReservedWordsHelperInterface */
    private $phpReservedWordsHelper;
    /** @var ModelFixerInterface[] */
    private $modelFixers;

    /** @var array */
    private $inheritedPropertiesCache = [];
    /** @var array<int, string> **/
    private $modelIdToModelName = [];
    /** @var array */
    private $fields_getCache = [];
    /** @var array<string, string> */
    private $modelNameToClass = [];

    /**
     * @param RecordListOperationsInterface $recordListOperations
     * @param InspectionOperationsInterface $inspectionOperations
     * @param PhpReservedWordsHelperInterface $phpReservedWordsHelper
     * @param ModelFixerInterface[] $modelFixers
     */
    public function __construct(
        RecordListOperationsInterface $recordListOperations,
        InspectionOperationsInterface $inspectionOperations,
        PhpReservedWordsHelperInterface $phpReservedWordsHelper,
        array $modelFixers = []
    ) {
        $this->recordListOperations = $recordListOperations;
        $this->inspectionOperations = $inspectionOperations;
        $this->phpReservedWordsHelper = $phpReservedWordsHelper;
        ksort($modelFixers);
        $this->modelFixers = $modelFixers;
    }

    public function convert(string $modelNamespace): array
    {
        $config = [];

        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setFields([
            'id',
            'model',
            'inherited_model_ids',
            'info',
        ]);

        $modelList = $this->recordListOperations->search_read(
            'ir.model',
            null,
            $searchReadOptions
        );

        $this->initConvert($modelList);

        foreach ($modelList as $model) {
            $config[] = $this->convertModel(
                $modelNamespace,
                $model,
                Base::class
            );
        }

        return $config;
    }

    private function buildClassNameFormModelName(string $modelName): string
    {
        $path = explode('.', $modelName);
        array_walk($path, function (string &$item) {
            $u = u($item)->camel()->title();
            $item = $u->toString();
            if ($this->phpReservedWordsHelper->check($item)) {
                $item .= '_';
            }
        });
        $builtClass = implode('\\', $path);

        $class = $builtClass;
        $i = 1;
        $modelNameToClassLowerCase = array_map('strtolower', $this->modelNameToClass);
        while (false !== array_search(strtolower($class), $modelNameToClassLowerCase)) {
            $class = $builtClass . ++$i;
        }

        return $class;
    }

    public function getClassNameFormModelName(string $modelName): string
    {
        if (isset($this->modelNameToClass[$modelName])) {
            return $this->modelNameToClass[$modelName];
        }

        throw new LogicException('The model name has not been found !');
    }

    /**
     * @param string $modelName
     *
     * @return int
     *
     * @throws Exception
     */
    private function getModelIdFromModelName(string $modelName): int
    {
        $modelId = array_search($modelName, $this->modelIdToModelName);
        if (false === $modelId) {
            throw new Exception(sprintf(
                'Unable to found the model id of the model named : "%s" !',
                $modelName
            ));
        }

        return $modelId;
    }

    private function fields_get(string $modelName): array
    {
        if (false === isset($this->fields_getCache[$modelName])) {
            $fieldGetOptions = new FieldsGetOptions();
            $fieldGetOptions->setAttributes([
                'type',
                'string',
                'help',
                'readonly',
                'relation',
                'relation_field',
                'required',
                'selection',
                'inherited_model_ids',
                'searchable',
                'sortable',
                // Not accessible... 'default',
            ]);

            $this->fields_getCache[$modelName] = $this->inspectionOperations->fields_get(
                $modelName,
                [],
                $fieldGetOptions
            );

            foreach ($this->modelFixers as $modelFixer) {
                $modelFixer->fix($modelName, $this->fields_getCache[$modelName]);
            }
        }

        return $this->fields_getCache[$modelName];
    }

    private function initConvert(array $search_read): void
    {
        // Store all model name indexed by there id
        foreach ($search_read as $item) {
            $this->modelIdToModelName[$item['id']] = $item['model'];
        }

        // Store properties cache of "base" model
        $fieldsInfo = $this->fields_get(self::BASE_MODEL_NAME);
        $this->addInheritedModelProperties(self::BASE_MODEL_NAME, $fieldsInfo);

        foreach ($search_read as $item) {
            // Store properties cache of all inherited models
            if (false === empty($item['inherited_model_ids'])) {
                foreach ($item['inherited_model_ids'] as $inheritedModelId) {
                    $inheritedModel = $this->modelIdToModelName[$inheritedModelId];
                    $fieldsInfo = $this->fields_get($inheritedModel);
                    $this->addInheritedModelProperties($inheritedModel, $fieldsInfo);
                }
            }

            // Avoid name collisions
            $modelName = $item['model'];
            $this->modelNameToClass[$modelName] = $this->buildClassNameFormModelName($modelName);
        }
    }

    private function addInheritedModelProperties(string $inheritedModel, array $fieldsInfo): void
    {
        $this->inheritedPropertiesCache[$inheritedModel] = array_keys($fieldsInfo);
    }

    private function convertModel(string $modelNamespace, array $item, string $baseModelClass): array
    {
        $modelName = $item['model'];
        $className = $this->getClassNameFormModelName($modelName);
        $classType = ClassBuilderInterface::CLASS_TYPE_FINAL;
        $extends = $baseModelClass;
        $implements = [];
        $constants = [];
        $methods = [
            [
                'scope' => 'public',
                'name' => 'getOdooModelName',
                'return_types' => ['string'],
                'body' => [
                    sprintf('return \'%s\';', $modelName),
                ],
                'static' => true,
            ]
        ];

        foreach ($item['inherited_model_ids'] as $inheritedModelId) {
            $inheritedModel = $this->modelIdToModelName[$inheritedModelId];
            $extends = $modelNamespace . '\\' . $this->getClassNameFormModelName($inheritedModel);
            break; // one and only extends allowed
        }

        $fieldsInfo = $this->fields_get($modelName);

        $properties = $this->convertModelProperties($fieldsInfo, $modelNamespace, $item);

        if ($item['abstract'] ?? false) {
            $classType = ClassBuilderInterface::CLASS_TYPE_ABSTRACT;
        }

        if (isset($this->inheritedPropertiesCache[$modelName])) {
            $classType = ClassBuilderInterface::CLASS_TYPE_CLASS;
        }

        if ($modelName === self::BASE_MODEL_NAME) {
            $extends = null;
            $implements[] = BaseInterface::class;
        }

        $info = trim($item['info'], '"');
        $info = trim($info);

        return  [
            'class' => $className,
            'type' => $classType,
            'extends' => $extends,
            'implements' => $implements,
            'description' => [
                PhpDocInterface::TYPE_DESCRIPTION => [
                    sprintf('Odoo model : %s', $modelName),
                    '---',
                    sprintf('Name : %s', $item['model']),
                    '---',
                    'Info :',
                    $info,
                ]
            ],
            'constants' => $constants,
            'properties' => $properties,
            'methods' => $methods,
        ];
    }

    private function convertModelProperties(array $fieldsInfo, string $modelNamespace, array $item): array
    {
        $properties = [];
        foreach ($fieldsInfo as $fieldName => $fieldInfo) {
            $types = OdooModelsStructureConverterHelper::transformTypes($fieldInfo);
            $description = $this->buildModelPropertyDescription($fieldInfo, $modelNamespace, $types);

            if ($item['model'] === 'base' && $fieldName === 'id') {
                $types[] = 'false';
            }

            $inheritedFieldMetadata = $this->getInheritedFieldMetadata($item, $fieldName);
            $inheritedFieldInfo = $inheritedFieldMetadata['info'];
            $inheritedFieldPosition = $inheritedFieldMetadata['position'];
            $inheritedTypes = [];
            $inheritedRequired = false;
            if (null !== $inheritedFieldInfo) {
                $inheritedTypes = OdooModelsStructureConverterHelper::transformTypes($inheritedFieldInfo);
                $inheritedRequired = false === in_array('null', $inheritedTypes);
                $inheritedRequired = $inheritedRequired && ($inheritedFieldInfo['required'] ?? false);
                $inheritedRequired = $inheritedRequired && !($inheritedFieldInfo['default'] ?? null);
            }

            $properties[] = [
                'name' => $fieldName,
                'types' => $types,
                'default' => $fieldInfo['default'] ?? null,
                'description' => $description,
                'inherited' => null !== $inheritedFieldInfo,
                'inherited_position' => $inheritedFieldPosition,
                'inherited_required' => $inheritedRequired,
            ];
        }

        return $properties;
    }

    private function buildModelPropertyDescription(
        array $fieldInfo,
        string $baseModelNamespace,
        array $types
    ): array {
        $description = [
            $fieldInfo['string'],
        ];
        if (!empty($fieldInfo['help'] ?? '')) {
            $description[] = '---';
            $description[] = $fieldInfo['help'];
        }

        if ($fieldInfo['type'] === 'selection') {
            $description[] = '---';
            $description[] = 'Selection :';
            $description = array_merge(
                $description,
                OdooModelsStructureConverterHelper::prettyGetSelection($fieldInfo['selection'])
            );
        }

        if (
            true === in_array(OdooRelation::class, $types)
            || true === in_array(OdooRelation::class . '[]', $types)
        ) {
            $description[] = '---';
            $relationField = isset($fieldInfo['relation_field'])
                ? sprintf(' -> %s', $fieldInfo['relation_field'])
                : null
            ;
            $description[] = sprintf('Relation : %s (%s%s)', $fieldInfo['type'], $fieldInfo['relation'], $relationField);
            $description[] = sprintf('@see \\%s\\%s', $baseModelNamespace, $this->getClassNameFormModelName($fieldInfo['relation']));
        }

        $description[] = '---';
        $searchable = $fieldInfo['searchable'] ?? false;
        $description[] = sprintf('Searchable : %s', $searchable ? 'yes' : 'no');
        $sortable = $fieldInfo['sortable'] ?? false;
        $description[] = sprintf('Sortable : %s', $sortable ? 'yes' : 'no');

        return $description;
    }

    private function getInheritedFieldMetadata(array $currentItem, string $fieldName): array
    {
        $modelName = $currentItem['model'];

        $metadata = [
            'position' => null,
            'info' => null,
        ];

        if ($modelName === self::BASE_MODEL_NAME) {
            return $metadata;
        }

        $inheritedModelIds = $currentItem['inherited_model_ids'];

        // Add "base" model id because all models inherit from it
        $inheritedModelIds[] = $this->getModelIdFromModelName(self::BASE_MODEL_NAME);

        foreach ($inheritedModelIds as $inheritedModelId) {
            $inheritedModel = $this->modelIdToModelName[$inheritedModelId];
            $properties = $this->inheritedPropertiesCache[$inheritedModel];
            if (false === in_array($fieldName, $properties)) {
                continue;
            }

            $modelInfo = $this->fields_get($inheritedModel);
            $metadata['position'] = array_search($fieldName, array_keys($modelInfo));
            $metadata['info'] = $modelInfo[$fieldName];
            break;
        }

        return $metadata;
    }
}
