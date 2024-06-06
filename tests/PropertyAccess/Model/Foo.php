<?php

namespace Tests\FluxSE\OdooApiClient\PropertyAccess\Model;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Object\AbstractBase;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Foo extends AbstractBase implements BaseInterface
{
    private ?string $activity_state = null;

    private ?OdooRelation $move_id = null;

    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    public function getMoveId(): ?OdooRelation
    {
        return $this->move_id;
    }

    public function setMoveId(?OdooRelation $move_id): void
    {
        $this->move_id = $move_id;
    }

    public static function getOdooModelName(): string
    {
        return 'foo';
    }
}
