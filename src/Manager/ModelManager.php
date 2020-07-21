<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

final class ModelManager implements ModelManagerInterface
{
    /** @var Serializer */
    private $serializer;
    /** @var RecordOperationsInterface */
    private $recordOperations;

    public function __construct(
        Serializer $serializer,
        RecordOperationsInterface $recordOperations
    ) {
        $this->serializer = $serializer;
        $this->recordOperations = $recordOperations;
    }

    /**
     * @param BaseInterface $model
     *
     * @return int
     * @throws ExceptionInterface
     */
    public function persist(BaseInterface $model): int
    {
        $normalizedModel = $this->serializer->normalize($model);
        return $this->recordOperations->create($model::getOdooModelName(), [$normalizedModel]);
    }
}