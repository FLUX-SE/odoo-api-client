<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments;

use DateTimeInterface;

final class Criterion implements CriterionInterface
{
    /** @var string|null */
    private $fieldName;

    /** @var string|null */
    private $operator;

    /** @var string|int|float|bool|null */
    private $value;

    /** @var string|null */
    private $logic;

    /** @var CriterionInterface|null */
    private $c1;

    /** @var CriterionInterface|null */
    private $c2;

    private function __construct()
    {
        // Do not allow to create it manually
    }

    public function toArray(): array
    {
        if ($this->hasSubCriterion()) {
            $arr = [$this->logic];

            $arr = array_merge($arr, $this->c1->toArray());

            if (null !== $this->c2) {
                $arr = array_merge($arr, $this->c2->toArray());
            }

            return $arr;
        } else {
            return [
                [
                    $this->fieldName,
                    $this->operator,
                    $this->value,
                ]
            ];
        }
    }

    public function hasSubCriterion(): bool
    {
        if (null === $this->c1) {
            return false;
        }

        return true;
    }

    /**
     * @param string|int|float|bool $value
     */
    private static function build(string $fieldName, string $operator, $value): self
    {
        $c = new self();
        $c->fieldName = $fieldName;
        $c->operator = $operator;
        $c->value = $value instanceof DateTimeInterface
            ? $value->format(DateTimeInterface::ISO8601)
            : $value
        ;

        return $c;
    }

    private static function buildCriteria(
        CriterionInterface $c1,
        string $logic,
        ?CriterionInterface $c2 = null
    ): self {
        $c = new self();
        $c->logic = $logic;
        $c->c1 = $c1;
        $c->c2 = $c2;

        return $c;
    }

    public static function and(CriterionInterface $c1, CriterionInterface $c2): CriterionInterface
    {
        return self::buildCriteria($c1, self::LOGIC_AND, $c2);
    }

    public static function or(CriterionInterface $c1, CriterionInterface $c2): CriterionInterface
    {
        return self::buildCriteria($c1, self::LOGIC_OR, $c2);
    }

    public static function not(CriterionInterface $c1): CriterionInterface
    {
        return self::buildCriteria($c1, self::LOGIC_NOT);
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
