<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

abstract class AbstractOptions implements OptionsInterface
{
    abstract protected function getOptionsMap(): array;

    public function toArray(): array
    {
        $options = [];
        foreach ($this->getOptionsMap() as $name => $getter) {
            $options[$name] = $this->$getter();
        }

        return $options;
    }
}
