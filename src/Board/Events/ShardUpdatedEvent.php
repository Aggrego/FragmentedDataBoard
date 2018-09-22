<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Events;

use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;
use Aggrego\FragmentedDataBoard\Board\Shard\FinalItem;

class ShardUpdatedEvent extends Event
{
    public function __construct(Uuid $uuid, FinalItem $board)
    {
        parent::__construct(
            [
                'uuid' => $uuid->getValue(),
                'shard_uuid' => $board->getUuid()->getValue(),
                'profile' => $board->getProfile()->__toString(),
                'data' => $board->getData()->getValue()
            ]
        );
    }
}
