<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Serializer\Model;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\Object\AbstractBase;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Foo extends AbstractBase implements BaseInterface
{
    private ?DateTimeInterface $date = null;

    /** @var OdooRelation[]|null */
    private ?array $message_ids = null;

    private ?OdooRelation $externalId = null;

    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return OdooRelation[]|null
     */
    #[SerializedName("message_ids")]
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids, true);
    }

    public function addMessageIds(OdooRelation $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    public function removeMessageIds(OdooRelation $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids, true);
            unset($this->message_ids[$index]);
        }
    }

    public function setExternalId(?OdooRelation $externalId): void
    {
        $this->externalId = $externalId;
    }

    public function getExternalId(): ?OdooRelation
    {
        return $this->externalId;
    }

    public static function getOdooModelName(): string
    {
        return 'foo';
    }
}
