<?php

use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import('vendor/symplify/easy-coding-standard/config/set/psr12.php');

    $services = $containerConfigurator->services();

    $services->set(BlankLineAfterOpeningTagFixer::class);
    $services->set(NoSuperfluousPhpdocTagsFixer::class)
        ->call('configure', [[
            'allow_mixed' => true,
            'remove_inheritdoc' => true,
        ]]);
};
