<?php

use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ECSConfig): void {
    $ECSConfig->import('vendor/symplify/easy-coding-standard/config/set/psr12.php');

    $services = $ECSConfig->services();

    $services->set(BlankLineAfterOpeningTagFixer::class);
    $services->set(NoSuperfluousPhpdocTagsFixer::class)
        ->call('configure', [[
            'allow_mixed' => true,
            'remove_inheritdoc' => true,
        ]]);
};
