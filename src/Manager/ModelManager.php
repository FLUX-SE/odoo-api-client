<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Manager;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use LogicException;
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

    public function delete(BaseInterface $model): bool
    {
        if (null === $model->getId()) {
            throw new LogicException('The model id should not be null !');
        }

        if (false === $model->getId()) {
            throw new LogicException('The model id should not be false !');
        }

        return $this->recordOperations->unlink($model::getOdooModelName(), [$model->getId()]);
    }

    /**
     * @param BaseInterface $model
     *
     * @return bool
     * @throws ExceptionInterface
     */
    public function update(BaseInterface $model): bool
    {
        if (null === $model->getId()) {
            throw new LogicException('The model id should not be null !');
        }

        if (false === $model->getId()) {
            throw new LogicException('The model id should not be false !');
        }

        $normalizedModel = (array) $this->serializer->normalize($model);
        return $this->recordOperations->write(
            $model::getOdooModelName(),
            [$model->getId()],
            $normalizedModel
        );
    }
}
