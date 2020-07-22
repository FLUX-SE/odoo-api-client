<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\SearchDomains;

final class Criterion implements CriterionInterface
{
    /** @var string[] */
    private $criterion = [];

    private function __construct(array $criterion)
    {
        $this->criterion = $criterion;
    }

    public function toArray(): array
    {
        return $this->criterion;
    }

    private static function build(string $fieldName, string $operator, $value): self
    {
        return new self([
            $fieldName,
            $operator,
            $value
        ]);
    }

    public static function child_of(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_CHILD_OF, $value);
    }

    public static function equal(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_EQUAL, $value);
    }

    public static function equal_ilike(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_EQUAL_ILIKE, $value);
    }

    public static function equal_like(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_EQUAL_LIKE, $value);
    }

    public static function greater_than(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_GREATER_THAN, $value);
    }

    public static function greater_than_equal(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_GREATER_THAN_EQUAL, $value);
    }

    public static function ilike(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_ILIKE, $value);
    }

    public static function in(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_IN, $value);
    }

    public static function less_than(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_LESS_THAN, $value);
    }

    public static function less_than_equal(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_LESS_THAN_EQUAL, $value);
    }

    public static function like(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_LIKE, $value);
    }

    public static function not_equal(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_NOT_EQUAL, $value);
    }

    public static function not_ilike(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_NOT_ILIKE, $value);
    }

    public static function not_in(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_NOT_IN, $value);
    }

    public static function not_like(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_NOT_LIKE, $value);
    }

    public static function parent_of(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_PARENT_OF, $value);
    }

    public static function unset_equal(string $fieldName, $value): CriterionInterface
    {
        return self::build($fieldName, self::OPERATOR_UNSET_EQUAL, $value);
    }
}