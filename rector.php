<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests/',
    ])
    ->withSkipPath(__DIR__ . '/tests/TestModel')
    ->withSets([
        SetList::TYPE_DECLARATION,
    ])
    ->withImportNames(removeUnusedImports: true)
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
        RemoveUnusedPromotedPropertyRector::class,
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
    ])
    ->withConfiguredRule(ClassPropertyAssignToConstructorPromotionRector::class, [
        ClassPropertyAssignToConstructorPromotionRector::INLINE_PUBLIC => true,
    ]);
