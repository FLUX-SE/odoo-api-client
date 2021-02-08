<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\Builder;

use Prometee\PhpClassGenerator\Builder\ClassBuilder as BaseClassBuilder;
use Prometee\PhpClassGenerator\Model\Method\GetterSetterInterface;
use Prometee\PhpClassGenerator\Model\Property\PropertyInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class SerializableClassBuilder extends BaseClassBuilder
{
    public function buildGetterSetter(PropertyInterface $property): GetterSetterInterface
    {
        $getterSetter = parent::buildGetterSetter($property);

        $getterMethod = $getterSetter->getGetterMethod();

        $serializedName = sprintf('\%s("%s")', SerializedName::class, $property->getName());
        $getterMethod->getPhpDoc()->addLine('', $serializedName);

        return $getterSetter;
    }
}
