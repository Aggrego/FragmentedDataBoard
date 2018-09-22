<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Events;

use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;
use Aggrego\FragmentedDataBoard\Board\Shard\InitialItem;

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
