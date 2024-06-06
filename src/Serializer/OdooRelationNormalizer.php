<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Serializer;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class OdooRelationNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function getSupportedTypes(?string $format): array
    {
        return [OdooRelation::class => true];
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof OdooRelation;
    }

    public function normalize($object, $format = null, array $context = []): int|array|null|false
    {
        if ($object instanceof OdooRelation) {
            return $this->normalizeRelation($object, $format, $context);
        }

        throw new NotNormalizableValueException(sprintf(
            'The object should be an instance of "%s" !',
            OdooRelation::class
        ));
    }

    private function normalizeRelation(OdooRelation $object, ?string $format = null, array $context = []): int|array|null|false
    {
        if (null === $object->getCommand()) {
            return $object->getId();
        }

        $secondParam = $this->buildSecondParam($object);
        $thirdParam = $this->buildThirdParam($object);

        if ($thirdParam instanceof BaseInterface) {
            $childContext = $context;
            unset($childContext['cache_key']);
            $thirdParam = $this->normalizer->normalize($thirdParam, $format, $childContext);
        }

        return [
            $object->getCommand(),
            $secondParam,
            $thirdParam
        ];
    }

    private function buildSecondParam(OdooRelation $object): ?int
    {
        if (in_array($object->getCommand(), [
            OdooRelation::COMMAND_ADD,
            OdooRelation::COMMAND_REMOVE_ALL,
            OdooRelation::COMMAND_REPLACE_ALL,
        ], true)) {
            return 0;
        }

        return $object->getCommandId();
    }

    private function buildThirdParam(OdooRelation $object): null|array|BaseInterface|int
    {
        if (in_array($object->getCommand(), [
            OdooRelation::COMMAND_ADD,
            OdooRelation::COMMAND_UPDATE
        ], true)) {
            return $object->getEmbedModel();
        }

        if ($object->getCommand() === OdooRelation::COMMAND_REPLACE_ALL) {
            return $object->getReplaceIds();
        }

        return 0;
    }
}
