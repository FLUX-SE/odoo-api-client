<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

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
        if (null !== $object->getEmbedModel()) {
            $childContext = (array) $context;
            unset($childContext['cache_key']);
            return [
                $object->getId(),
                $object->getDisplayName(),
                $this->normalizer->normalize($object->getEmbedModel(), $format, $childContext),
            ];
        }

        return $object->getId();
    }
}
