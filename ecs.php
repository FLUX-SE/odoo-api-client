<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withSets([
        __DIR__ . '/vendor/symplify/easy-coding-standard/config/set/psr12.php'
    ])
    ->withParallel()
    ->withPaths([
        'src',
        'tests',
    ])
    ->withSkip([
        NoTrailingWhitespaceInCommentFixer::class => [
            'tests/TestModel',
        ],
    ])
    ;
