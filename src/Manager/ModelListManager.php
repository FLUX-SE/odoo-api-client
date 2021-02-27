<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use LogicException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

final class ModelListManager implements ModelListManagerInterface
{
    /** @var Serializer */
    private $serializer;
    /** @var RecordListOperationsInterface */
    private $recordListOperations;

    public function __construct(
        Serializer $serializer,
        RecordListOperationsInterface $recordListOperations
    ) {
        $this->serializer = $serializer;
        $this->recordListOperations = $recordListOperations;
    }

    /**
     * @throws ExceptionInterface
     */
    public function find(string $class, int $id): ?BaseInterface
    {
        $modelName = $this->getModelNameFromClass($class);

        $results = $this->recordListOperations->read($modelName, [$id]);

        if (count($results) === 0) {
            return null;
        }

        /** @var BaseInterface $denormalizedModel */
        $denormalizedModel = $this->serializer->denormalize($results[0], $class);
        return $denormalizedModel;
    }

    /**
     * @throws ExceptionInterface
     */
    public function findOneBy(string $class, ?SearchDomainsInterface $searchDomains = null): ?BaseInterface
    {
        $searchReadOptions = new SearchReadOptions();
        $searchReadOptions->setLimit(1);

        $results = $this->findBy($class, $searchDomains, $searchReadOptions);

        if (count($results) === 0) {
            return null;
        }

        return $results[0];
    }

    /**
     * @throws ExceptionInterface
     */
    public function findBy(
        string $class,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array {
        $modelName = $this->getModelNameFromClass($class);

        $results = $this->recordListOperations->search_read(
            $modelName,
            $searchDomains,
            $searchReadOptions
        );

        /** @var BaseInterface[] $denormalizedModels */
        $denormalizedModels = $this->serializer->denormalize($results, sprintf('%s[]', $class));

        return $denormalizedModels;
    }

    public function count(string $class, ?SearchDomainsInterface $searchDomains = null): int
    {
        $modelName = $this->getModelNameFromClass($class);
        return $this->recordListOperations->search_count(
            $modelName,
            $searchDomains
        );
    }

    private function getModelNameFromClass(string $class): string
    {
        $callable = [$class, 'getOdooModelName'];
        if (false === is_callable($callable)) {
            throw new LogicException(sprintf(
                'The provided class should be a class implementing "%s"',
                BaseInterface::class
            ));
        }

        return call_user_func($callable);
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
