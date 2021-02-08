<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

use LogicException;

trait ReadOptionsTrait
{
    abstract public function addOption(string $name, $option): void;

    abstract public function getOption(string $name);

    public function __construct()
    {
        $this->setFields([]);
    }

    public function getFields(): array
    {
        $fields = $this->getOption(ReadOptionsInterface::FIELD_NAME_FIELDS);

        if (is_array($fields)) {
            return $fields;
        }

        throw new LogicException(sprintf(
            'The fields should be an array "%s" retrieved !',
            gettype($fields)
        ));
    }

    public function setFields(array $fields): void
    {
        $this->addOption(ReadOptionsInterface::FIELD_NAME_FIELDS, $fields);
    }

    public function addField(string $field): bool
    {
        if (false === $this->hasField($field)) {
            $fields = $this->getFields();
            $fields[] = $field;
            $this->setFields($fields);

            return true;
        }

        return false;
    }

    public function removeField(string $field): bool
    {
        $fields = $this->getFields();
        $index = array_search($field, $fields);
        if (false !== $index) {
            unset($fields[$index]);
            $this->setFields($fields);

            return true;
        }

        return false;
    }

    public function hasField(string $field): bool
    {
        return in_array($field, $this->getFields());
    }
}
