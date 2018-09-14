<?php

declare(strict_types = 1);

namespace Aggrego\ShardDataBoard\Board\Events;

use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;

class UpdatedLastStepsShardEvent extends Event
{
    public function __construct(Uuid $uuid)
    {
        parent::__construct(['uuid' => $uuid->getValue()]);
    }
}
