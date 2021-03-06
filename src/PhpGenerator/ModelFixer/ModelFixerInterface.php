<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

interface ModelFixerInterface
{
    public function supports(string $modelName, array $structure): bool;

    public function fix(string $modelName, array &$structure): void;
}
