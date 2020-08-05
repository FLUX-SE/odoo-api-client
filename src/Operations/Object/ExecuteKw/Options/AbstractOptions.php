<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

abstract class AbstractOptions implements OptionsInterface
{
    /** @var array */
    private $options = [];

    public function toArray(): array
    {
        return $this->getOptions();
    }

    public function addOption(string $name, $option): void
    {
        $this->options[$name] = $option;
    }

    public function removeOption(string $name): void
    {
        if (isset($this->options[$name])) {
            unset($this->options[$name]);
        }
    }

    public function getOption(string $name)
    {
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }

        return null;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}
