<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

final class CompositeModelFixer implements ModelFixerInterface
{
    public function __construct(
        /** iterable<int, ModelFixerInterface> */
        private iterable $modelFixers,
    ) {
    }

    public function supports(string $modelName, array $structure): bool
    {
        return true;
    }

    public function fix(string $modelName, array &$structure): void
    {
        foreach ($this->modelFixers as $modelFixer) {
            if (false === $modelFixer->supports($modelName, $structure)) {
                continue;
            }

            $modelFixer->fix($modelName, $structure);
        }
    }
}
