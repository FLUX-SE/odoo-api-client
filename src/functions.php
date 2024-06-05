<?php

declare(strict_types=1);

function is_false(mixed $value): bool
{
    return is_bool($value) && false === (bool) $value;
}
function is_mixed(mixed $value): bool
{
    return true;
}
