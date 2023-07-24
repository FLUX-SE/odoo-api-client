<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Manager;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordOperationsInterface;
use FluxSE\OdooApiClient\Serializer\OdooNormalizer;
use LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ModelManager implements ModelManagerInterface
{
    private NormalizerInterface $normalizer;

    private RecordOperationsInterface $recordOperations;

    public function __construct(
        NormalizerInterface $normalizer,
        RecordOperationsInterface $recordOperations
    ) {
        $this->normalizer = $normalizer;
        $this->recordOperations = $recordOperations;
    }

    public function persist(BaseInterface $model, ?OptionsInterface $options = null): int
    {
        /** @var array $normalizedModel */
        $normalizedModel = $this->normalizer->normalize($model);
        return $this->recordOperations->create($model::getOdooModelName(), $normalizedModel, $options);
    }

    public function update(BaseInterface $model, ?OptionsInterface $options = null): bool
    {
        $id = $model->getId();
        if (null === $id) {
            throw new LogicException('The model id should not be null !');
        }

        if (false === $id) {
            throw new LogicException('The model id should not be false !');
        }

        $normalizedModel = (array) $this->normalizer->normalize($model, null, [
            OdooNormalizer::NORMALIZE_FOR_UPDATE => true,
        ]);
        return $this->recordOperations->write(
            $model::getOdooModelName(),
            [$id],
            $normalizedModel,
            $options
        );
    }

    public function delete(BaseInterface $model, ?OptionsInterface $options = null): bool
    {
        $id = $model->getId();
        if (null === $id) {
            throw new LogicException('The model id should not be null !');
        }

        if (false === $id) {
            throw new LogicException('The model id should not be false !');
        }

        return $this->recordOperations->unlink($model::getOdooModelName(), [$id], $options);
    }

    public function getRecordOperations(): RecordOperationsInterface
    {
        return $this->recordOperations;
    }

    public function getNormalizer(): NormalizerInterface
    {
        return $this->normalizer;
    }
}
