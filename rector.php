<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictSetUpRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();
    $rectorConfig->ruleWithConfiguration(ClassPropertyAssignToConstructorPromotionRector::class, [
        ClassPropertyAssignToConstructorPromotionRector::INLINE_PUBLIC => true,
    ]);
    $rectorConfig->rule(RestoreDefaultNullToNullableTypePropertyRector::class);
    $rectorConfig->rule(TypedPropertyFromStrictSetUpRector::class);

    $rectorConfig->ruleWithConfiguration(TypedPropertyFromAssignsRector::class, [
        TypedPropertyFromAssignsRector::INLINE_PUBLIC => true,
    ]);

    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);
};
