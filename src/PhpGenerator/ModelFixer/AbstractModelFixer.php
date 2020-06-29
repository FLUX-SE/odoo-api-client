<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\PhpGenerator\ModelFixer;

abstract class AbstractModelFixer implements ModelFixerInterface
{
    public function fix(string $modelName, array &$structure): void
    {
        if (false === $this->supports($modelName, $structure)) {
            return;
        }

        $this->doFix($modelName, $structure);
    }

    abstract protected function doFix(string $modelName, array &$structure): void;
}