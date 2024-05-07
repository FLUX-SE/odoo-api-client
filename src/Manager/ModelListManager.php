<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use Symfony\Component\Serializer\Serializer;

final class ModelListManager implements ModelListManagerInterface
{
    public function __construct(
        private Serializer $serializer,
        private RecordListOperationsInterface $recordListOperations,
        private ModelFieldsProviderInterface $modelFieldsProvider,
    ) {
    }

    public function find(
        string $className,
        int $id,
        ?ReadOptionsInterface $readOptions = null
    ): ?BaseInterface {
        $results = $this->findByIds($className, [$id], $readOptions);

        if (count($results) === 0) {
            return null;
        }

        return $results[0];
    }

    public function findByIds(
        string $className,
        array $ids,
        ?ReadOptionsInterface $readOptions = null
    ): array {
        $readOptions = $readOptions ?? new ReadOptions();

        $this->processReadOptions($className, $readOptions, [
            'class' => __CLASS__,
            'method' => __METHOD__,
        ]);

        $modelName = $this->getModelNameFromClass($className);

        $results = $this->recordListOperations->read($modelName, $ids, $readOptions);

        return $this->serializer->denormalize($results, sprintf('%s[]', $className));
    }

    public function findOneBy(
        string $className,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): ?BaseInterface {
        $searchReadOptions = $searchReadOptions ?? new SearchReadOptions();
        $searchReadOptions->setLimit(1);

        $results = $this->findBy($className, $searchDomains, $searchReadOptions);

        if (count($results) === 0) {
            return null;
        }

        return $results[0];
    }

    public function findBy(
        string $className,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array {
        $modelName = $this->getModelNameFromClass($className);

        $searchReadOptions = $searchReadOptions ?? new SearchReadOptions();

        $this->processReadOptions($className, $searchReadOptions, [
            'class' => __CLASS__,
            'method' => __METHOD__,
        ]);

        $results = $this->recordListOperations->search_read(
            $modelName,
            $searchDomains,
            $searchReadOptions
        );

        return $this->serializer->denormalize($results, sprintf('%s[]', $className));
    }

    public function count(string $className, ?SearchDomainsInterface $searchDomains = null): int
    {
        $modelName = $this->getModelNameFromClass($className);
        return $this->recordListOperations->search_count(
            $modelName,
            $searchDomains
        );
    }

    /**
     * @param class-string<BaseInterface> $className
     */
    private function getModelNameFromClass(string $className): string
    {
        $callable = [$className, 'getOdooModelName'];
        return $callable();
    }

    public function getRecordListOperations(): RecordListOperationsInterface
    {
        return $this->recordListOperations;
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }

    /**
     * @template T of BaseInterface
     * @param class-string<T> $className
     */
    private function processReadOptions(
        string $className,
        ReadOptionsInterface $readOptions,
        array $context = []
    ): void {
        $readOptions->setFields($this->modelFieldsProvider->provide($className, $context + [
            ModelFieldsProviderInterface::FIELDS_CONTEXT => $readOptions->getFields(),
        ]));
    }
}
