<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

interface CriterionInterface
{
    /** @var string */
    public const LOGIC_AND = '&';
    /** @var string */
    public const LOGIC_NOT = '!';
    /** @var string */
    public const LOGIC_OR = '|';

    /**
     * is equal to any of the items from value, value should be a list of items
     */
    public const OPERATOR_IN = 'in';
    /**
     * case insensitive like
     */
    public const OPERATOR_ILIKE = 'ilike';
    /**
     * case insensitive not like
     */
    public const OPERATOR_NOT_ILIKE = 'not ilike';
    /**
     * is a parent (ascendant) of a value record (value can be either one item or a list of items).
     *
     * Takes the semantics of the model into account (i.e following the relationship field named by _parent_name).
     */
    public const OPERATOR_PARENT_OF = 'parent_of';
    /**
     * doesn’t match against the %value% pattern
     */
    public const OPERATOR_NOT_LIKE = 'not like';
    /**
     * matches field_name against the value pattern. An underscore _ in the pattern stands for (matches)
     * any single character; a percent sign % matches any string of zero or more characters.
     */
    public const OPERATOR_EQUAL_LIKE = '=like';
    /**
     * matches field_name against the %value% pattern. Similar to =like but wraps value with ‘%’ before matching
     */
    public const OPERATOR_LIKE = 'like';
    /**
     * not equals to
     */
    public const OPERATOR_NOT_EQUAL = '!=';
    /**
     * less than or equal to
     */
    public const OPERATOR_LESS_THAN_EQUAL = '<=';
    /**
     * less than
     */
    public const OPERATOR_LESS_THAN = '<';
    /**
     * unset or equals to (returns true if value is either None or False, otherwise behaves like =)
     */
    public const OPERATOR_UNSET_EQUAL = '=?';
    /**
     * equals to
     */
    public const OPERATOR_EQUAL = '=';
    /**
     * case insensitive =like
     */
    public const OPERATOR_EQUAL_ILIKE = '=ilike';
    /**
     * is a child (descendant) of a value record (value can be either one item or a list of items).
     *
     * Takes the semantics of the model into account (i.e following the relationship field named by _parent_name).
     */
    public const OPERATOR_CHILD_OF = 'child_of';
    /**
     * greater than
     */
    public const OPERATOR_GREATER_THAN = '>';
    /**
     * is unequal to all of the items from value
     */
    public const OPERATOR_NOT_IN = 'not in';
    /**
     * greater than or equal to
     */
    public const OPERATOR_GREATER_THAN_EQUAL = '>=';

    public function toArray(): array;

    public static function and(CriterionInterface $c1, CriterionInterface $c2): CriterionInterface;
    public static function or(CriterionInterface $c1, CriterionInterface $c2): CriterionInterface;
    public static function not(CriterionInterface $c1): CriterionInterface;

    /**
     * @param array<int, string|int|float|bool> $value
     */
    public static function in(string $fieldName, array $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function ilike(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function not_like(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function less_than(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function not_equal(string $fieldName, $value): CriterionInterface;

    /**
     * @param array<int, string|int|float|bool> $value
     */
    public static function not_in(string $fieldName, array $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function parent_of(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function not_ilike(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function equal_like(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function child_of(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function less_than_equal(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function equal_ilike(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function greater_than_equal(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function greater_than(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function unset_equal(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function equal(string $fieldName, $value): CriterionInterface;

    /**
     * @param string|int|float|bool $value
     */
    public static function like(string $fieldName, $value): CriterionInterface;
}
