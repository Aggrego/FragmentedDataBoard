<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board\Events;

use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;
use Aggrego\ShardDataBoard\Board\Shard\InitialItem;

class ShardAddedEvent extends Event
{
    public function __construct(Uuid $uuid, InitialItem $board)
    {
        parent::__construct(
            [
                'uuid' => $uuid->getValue(),
                'shard_uuid' => $board->getUuid()->getValue(),
                'key' => $board->getKey()->getValue(),
                'profile' => $board->getProfile()->__toString()
            ]
        );
    }
}
