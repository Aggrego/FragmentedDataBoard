<?php

declare(strict_types = 1);

namespace Aggrego\FragmentedDataBoard\Board\Events;

use Aggrego\Domain\Board\Key;
use Aggrego\Domain\Profile\Profile;
use Aggrego\EventStore\Shared\Event\Model\Events\Event;
use Aggrego\EventStore\Uuid;

class BoardCreatedEvent extends Event
{
    public function __construct(Uuid $uuid, Key $key, Profile $profile, ?Uuid $parentUuid)
    {
        parent::__construct(
            [
                'uuid' => $uuid->getValue(),
                'key' => $key->getValue(),
                'profile' => $profile->__toString(),
                'parent_uuid' => $parentUuid ? $parentUuid->getValue() : null,
            ]
        );
    }
}
