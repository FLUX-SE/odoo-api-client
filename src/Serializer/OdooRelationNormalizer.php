<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Flux\OdooApiClient\Model\BaseInterface;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * @property Serializer $serializer
 */
final class OdooRelationNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function supportsNormalization($data, string $format = null): bool
    {
        return $data instanceof OdooRelation;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        if ($object instanceof OdooRelation) {
            return $this->buildOdooRelation($object, $format, $context);
        }

        throw new NotNormalizableValueException(sprintf(
            'The object should be an instance of "%s" !',
            OdooRelation::class
        ));
    }

    /**
     * @param OdooRelation $object
     *
     * @param string|null $format
     * @param array $context
     *
     * @return int|array|null|false
     *
     * @throws ExceptionInterface
     */
    private function buildOdooRelation(OdooRelation $object, ?string $format = null, array $context = [])
    {
        if (null === $object->getCommand()) {
            return $object->getId();
        }

        $secondParam = $this->buildSecondParam($object);
        $thirdParam = $this->buildThirdParam($object);

        if ($thirdParam instanceof BaseInterface) {
            $childContext = (array) $context;
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
        ])) {
            return 0;
        } else {
            return $object->getCommandId();
        }
    }

    /**
     * @param OdooRelation $object
     * @return null|BaseInterface|int[]|int $data
     */
    private function buildThirdParam(OdooRelation $object)
    {
        if (in_array($object->getCommand(), [
            OdooRelation::COMMAND_ADD,
            OdooRelation::COMMAND_UPDATE
        ])) {
            return $object->getEmbedModel();
        }

        if ($object->getCommand() === OdooRelation::COMMAND_REPLACE_ALL) {
            return $object->getReplaceIds();
        }

        return 0;
    }
}
