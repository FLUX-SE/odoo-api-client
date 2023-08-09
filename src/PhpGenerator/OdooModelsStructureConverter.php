<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

use Exception;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Object\AbstractBase;
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
    /** @var iterable<ModelFixerInterface> */
    private iterable $modelFixers;

    private array $inheritedPropertiesCache = [];
    /** @var array<int, string> **/
    private array $modelIdToModelName = [];
    private array $fields_getCache = [];
    /** @var array<string, string> */
    private array $modelNameToClass = [];

    /**
     * @param iterable<ModelFixerInterface> $modelFixers
     */
    public function __construct(
        private RecordListOperationsInterface $recordListOperations,
        private InspectionOperationsInterface $inspectionOperations,
        private PhpReservedWordsHelperInterface $phpReservedWordsHelper,
        iterable $modelFixers = [],
    ) {
        $this->modelFixers = $modelFixers;
    }

    public function convert(string $modelNamespace): array
    {
        $config = [];

        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setFields([
            'id',
            'name',
            'transient',
            'modules',
            'model',
            'inherited_model_ids',
            'state',
            'info',
        ]);

        $modelList = $this->recordListOperations->search_read(
            'ir.model',
            null,
            $searchReadOptions
        );

        $this->initConvert($modelList);

        $baseModelClass = $this->getClassNameFormModelName(self::BASE_MODEL_NAME);
        foreach ($modelList as $model) {
            $config[] = $this->convertModel(
                $modelNamespace,
                $model,
                $modelNamespace . '\\' . $baseModelClass
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
        while (in_array(strtolower($class), $modelNameToClassLowerCase, true)) {
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
     * @throws Exception
     */
    private function getModelIdFromModelName(string $modelName): int
    {
        $modelId = array_search($modelName, $this->modelIdToModelName, true);
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

            if ($modelName === 'payment.link.wizard') {
                $fieldGetOptions->removeAttribute('selection');
            }

            $this->fields_getCache[$modelName] = $this->inspectionOperations->fields_get(
                $modelName,
                [],
                $fieldGetOptions
            );

            foreach ($this->modelFixers as $modelFixer) {
                if ($modelFixer->supports($modelName, $this->fields_getCache[$modelName])) {
                    $modelFixer->fix($modelName, $this->fields_getCache[$modelName]);
                }
            }
        }

        return $this->fields_getCache[$modelName];
    }

    private function initConvert(array $search_read): void
    {
        // Store all model name indexed by there id
        /** @var array $item */
        foreach ($search_read as $item) {
            /** @var int $itemId */
            $itemId = $item['id'];
            $this->modelIdToModelName[$itemId] = $item['model'];
        }

        // Store properties cache of "base" model
        $fieldsInfo = $this->fields_get(self::BASE_MODEL_NAME);
        $this->addInheritedModelProperties(self::BASE_MODEL_NAME, $fieldsInfo);

        foreach ($search_read as $item) {
            // Store properties cache of all inherited models
            foreach ($item['inherited_model_ids'] ?? [] as $inheritedModelId) {
                $inheritedModel = $this->modelIdToModelName[$inheritedModelId];
                $fieldsInfo = $this->fields_get($inheritedModel);
                $this->addInheritedModelProperties($inheritedModel, $fieldsInfo);
            }

            // Avoid name collisions
            /** @var string $modelName */
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

        if ($item['abstract'] ?? false) {
            $classType = ClassBuilderInterface::CLASS_TYPE_ABSTRACT;
        }

        if (isset($this->inheritedPropertiesCache[$modelName])) {
            $classType = ClassBuilderInterface::CLASS_TYPE_CLASS;
        }

        if ($modelName === self::BASE_MODEL_NAME) {
            $extends = AbstractBase::class;
            $implements[] = BaseInterface::class;
        }

        $info = OdooModelsStructureConverterHelper::sanitizeComment($item['info']);

        $fieldsInfo = $this->fields_get($modelName);
        $properties = $this->convertModelProperties($fieldsInfo, $modelNamespace, $item);

        return [
            'class' => $className,
            'type' => $classType,
            'extends' => $extends,
            'implements' => $implements,
            'phpdoc' => [
                PhpDocInterface::TYPE_DESCRIPTION => [
                    sprintf('Odoo model : %s', $modelName),
                    '---',
                    '',
                    sprintf('Name : %s (%s)', $item['name'], $item['model']),
                    sprintf('Transient model : %s', $item['transient'] ? 'yes' : 'no'),
                    sprintf('Modules : %s', $item['modules']),
                    '---',
                    '',
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
            $scope = null;

            $inheritedFieldMetadata = $this->getInheritedFieldMetadata($item, $fieldName);
            $inheritedFieldInfo = $inheritedFieldMetadata['info'];
            $inheritedFieldPosition = $inheritedFieldMetadata['position'];
            $inheritedRequired = false;
            if (null !== $inheritedFieldInfo) {
                // Sometimes inherited types are not the same as the one declared on the current model
                // To avoid error we choose to override types with the parent ones
                $types = OdooModelsStructureConverterHelper::transformTypes($inheritedFieldInfo);
                $inheritedRequired = false === in_array('null', $types);
                $inheritedRequired = $inheritedRequired && ($inheritedFieldInfo['required'] ?? false);
                $inheritedRequired = $inheritedRequired && !($inheritedFieldInfo['default'] ?? null);
                $scope = 'protected';
            }

            if ($fieldName === 'id') {
                $types[] = 'false';
            }

            $properties[] = [
                'scope' => $scope,
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
            OdooModelsStructureConverterHelper::sanitizeComment($fieldInfo['string'] ?? ''),
        ];
        $help = $fieldInfo['help'] ?? '';
        if (!empty($help)) {
            $description[] = '---';
            $description[] = '';
            $description[] = OdooModelsStructureConverterHelper::sanitizeComment($fieldInfo['help'] ?? '');
        }

        if (($fieldInfo['type'] ?? '') === 'selection') {
            $description[] = '---';
            $description[] = '';
            $description[] = 'Selection :';
            $description = array_merge(
                $description,
                OdooModelsStructureConverterHelper::prettySelection($fieldInfo['selection'] ?? [])
            );
        }

        if (
            true === in_array(OdooRelation::class, $types)
            || true === in_array(OdooRelation::class . '[]', $types)
        ) {
            $description[] = '---';
            $description[] = '';
            $relationField = isset($fieldInfo['relation_field'])
                ? sprintf(' -> %s', $fieldInfo['relation_field'])
                : null
            ;
            $description[] = sprintf('Relation : %s (%s%s)', $fieldInfo['type'], $fieldInfo['relation'], $relationField);
            $description[] = sprintf('@see \\%s\\%s', $baseModelNamespace, $this->getClassNameFormModelName($fieldInfo['relation']));
        }

        $description[] = '---';
        $description[] = '';
        $searchable = $fieldInfo['searchable'] ?? false;
        $description[] = sprintf('Searchable : %s', $searchable ? 'yes' : 'no');
        $sortable = $fieldInfo['sortable'] ?? false;
        $description[] = sprintf('Sortable : %s', $sortable ? 'yes' : 'no');

        return $description;
    }

    private function getInheritedFieldMetadata(array $item, string $fieldName): array
    {
        $inheritedModelIds = $item['inherited_model_ids'] ?? [];

        // Add "base" model id because all models inherit from it
        $inheritedModelIds[] = $this->getModelIdFromModelName(self::BASE_MODEL_NAME);

        foreach ($inheritedModelIds as $inheritedModelId) {
            $inheritedModel = $this->modelIdToModelName[$inheritedModelId];
            $inheritedProperties = $this->inheritedPropertiesCache[$inheritedModel];
            if (false === in_array($fieldName, $inheritedProperties, true)) {
                continue;
            }

            $inheritedModelInfo = $this->fields_get($inheritedModel);

            return [
                'position' => array_search($fieldName, array_keys($inheritedModelInfo), true),
                'info' => $inheritedModelInfo[$fieldName],
            ];
        }

        return [
            'position' => null,
            'info' => null,
        ];
    }
}
