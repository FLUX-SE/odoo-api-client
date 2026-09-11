<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2\Fixture;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Object\AbstractBase;

final class Json2TestModel extends AbstractBase implements BaseInterface
{
    public function __construct(private string $name = '')
    {
    }

    public static function getOdooModelName(): string
    {
        return 'x.test';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
