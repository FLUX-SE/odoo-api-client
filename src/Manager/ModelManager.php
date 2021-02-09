<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
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
     * @throws ExceptionInterface
     */
    public function persist(BaseInterface $model, ?OptionsInterface $options = null): int
    {
        /** @var array $normalizedModel */
        $normalizedModel = $this->serializer->normalize($model);
        return $this->recordOperations->create($model::getOdooModelName(), $normalizedModel, $options);
    }

    /**
     * @throws ExceptionInterface
     */
    public function update(BaseInterface $model, ?OptionsInterface $options = null): bool
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
            $normalizedModel,
            $options
        );
    }

    /**
     * @throws ExceptionInterface
     */
    public function delete(BaseInterface $model, ?OptionsInterface $options = null): bool
    {
        if (null === $model->getId()) {
            throw new LogicException('The model id should not be null !');
        }

        if (false === $model->getId()) {
            throw new LogicException('The model id should not be false !');
        }

        return $this->recordOperations->unlink($model::getOdooModelName(), [$model->getId()], $options);
    }

    public function getRecordOperations(): RecordOperationsInterface
    {
        return $this->recordOperations;
    }

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}
