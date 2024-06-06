<?php

declare(strict_types=1);

/**
 * Those functions are here to cover an issue on symfony/serializer
 *
 * @see https://github.com/symfony/symfony/issues/57334 for more details
 */

function is_false(mixed $value): bool
{
    return is_bool($value) && false === (bool) $value;
}
function is_mixed(mixed $value): bool
{
    return true;
}
