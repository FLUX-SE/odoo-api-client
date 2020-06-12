<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

trait ReadOptionsTrait
{
    /** @var string[] */
    private $fields = [];

    protected function getOptionsMap(): array
    {
        return [
            'fields' => 'getFields',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * {@inheritdoc}
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function addField(string $field): bool
    {
        if (false === $this->hasField($field)) {
            $this->fields[] = $field;

            return true;
        }

        return false;
    }

    public function removeField(string $field): bool
    {
        $index = array_search($field, $this->fields);
        if (false !== $index) {
            unset($this->fields[$index]);

            return true;
        }

        return false;
    }

    public function hasField(string $field): bool
    {
        return in_array($field, $this->fields);
    }
}
