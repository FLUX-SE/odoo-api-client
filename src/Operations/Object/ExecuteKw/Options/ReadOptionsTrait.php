<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

use Webmozart\Assert\Assert;

trait ReadOptionsTrait
{
    public function __construct()
    {
        $this->setFields([]);
    }

    public function getFields(): array
    {
        /** @var string[] $fields */
        $fields = $this->getOption(ReadOptionsInterface::FIELD_NAME_FIELDS);

        Assert::allString($fields, sprintf(
            'The field values should be an array of strings, "%s" found ! : %s',
            '%s',
            print_r($fields, true)
        ));

        return $fields;
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
