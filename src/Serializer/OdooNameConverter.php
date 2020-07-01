<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Serializer;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

final class OdooNameConverter extends CamelCaseToSnakeCaseNameConverter
{
    /**
     * {@inheritdoc}
     */
    public function denormalize(string $propertyName)
    {
        if ($propertyName === '__last_update') {
            return 'LastUpdate';
        }

        return parent::denormalize($propertyName);
    }
    /**
     * {@inheritdoc}
     */
    public function normalize(string $propertyName)
    {
        if ($propertyName === 'lastUpdate') {
            return '__last_update';
        }

        return parent::normalize($propertyName);
    }
}
