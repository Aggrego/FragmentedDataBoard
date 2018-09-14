<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board\Events;

use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;
use Aggrego\ShardDataBoard\Board\Shard\FinalItem;

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
