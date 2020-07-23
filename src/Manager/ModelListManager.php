<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperationsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains\SearchDomainsInterface;
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
     * @param string $class
     * @param int $id
     *
     * @return BaseInterface|null
     *
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
     * @param string $class
     * @param SearchDomainsInterface $searchDomains
     *
     * @return BaseInterface|null
     *
     * @throws ExceptionInterface
     */
    public function findOneBy(string $class, SearchDomainsInterface $searchDomains): ?BaseInterface
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
     * {@inheritDoc}
     *
     * @throws ExceptionInterface
     */
    public function findBy(
        string $class,
        SearchDomainsInterface $searchDomains,
        SearchReadOptionsInterface $searchReadOptions
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

    private function getModelNameFromClass(string $class): string
    {
        $modelName = constant(sprintf('%s::getOdooModelName', $class));

        if (null === $modelName) {
            throw new LogicException(sprintf(
                'The provided class should be an instance of "%s"',
                BaseInterface::class
            ));
        }

        return $modelName;
    }
}
