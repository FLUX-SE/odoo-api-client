<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Symfony\Component\Serializer\Serializer;

final class ModelListManager implements ModelListManagerInterface
{
    private Serializer $serializer;

    private RecordListOperationsInterface $recordListOperations;

    public function __construct(
        Serializer $serializer,
        RecordListOperationsInterface $recordListOperations
    ) {
        $this->serializer = $serializer;
        $this->recordListOperations = $recordListOperations;
    }

    public function find(string $className, int $id): ?BaseInterface
    {
        $modelName = $this->getModelNameFromClass($className);

        $results = $this->recordListOperations->read($modelName, [$id]);

        if (count($results) === 0) {
            return null;
        }

        return $this->serializer->denormalize($results[0], $className);
    }

    public function findOneBy(string $className, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface
    {
        $searchReadOptions = new SearchReadOptions();
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
}
